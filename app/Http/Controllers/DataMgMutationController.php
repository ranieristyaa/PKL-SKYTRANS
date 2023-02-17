<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MigasMutation;
use App\Models\MigasStock;
use Validator;
use App\Models\MigasPurchase;

class DataMgMutationController extends Controller
{
    public function index()
    {
        return view('superadmin.migas-mutation', [
            'data' => MigasMutation::all()
        ]);
    }

    public function store(Request $request){
        $rules = array(
            'date' => 'required',
            'name' => 'required',
           
            'item_in' => 'required',
            'item_out' => 'required',
        );
        $messages = array(
            'date.required' => 'Tanggal wajib diisi.',
            'name.required' => 'Username wajib diisi.',
            'item_in.required' => "Jumlah wajib diisi",
            'item_out.required' => 'Jumlah wajib diisi',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/superadmin/mutasi/migas')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        if (\DB::table('migas_stocks')->where('name', $request->name)->count() > 0){
            if ($request->item_in == 0){
                $qty = \DB::table('migas_stocks')->where('name', $request->name)->value('quantity');
                if ((int)$qty-(int)$request->item_out){
                    return redirect('/superadmin/mutasi/migas')->with('error', 'Input data gagal, jumlah barang keluar tidak sesuai dengan stock.')
                    ->withErrors($validator)
                    ->withInput();
                }
                MigasStock::where('name', $request->name)->first()?->update([
                    'quantity' => (int)$qty-(int)$request->item_out,
                ]);
            }else if ($request->item_out == 0){
                $qty = \DB::table('migas_stocks')->where('name', $request->name)->value('quantity');
                MigasStock::where('name', $request->name)->update([
                    'quantity' => (int)$qty+(int)$request->item_in,
                ]);
            }else{
                $qty = \DB::table('migas_stocks')->where('name', $request->name)->value('quantity');
                MigasStock::where('name', $request->name)->first()?->update([
                    'quantity' => (int)$qty+(int)$request->item_in-(int)$request->item_out,
                ]);
            }
            $last2 = \DB::table('migas_stocks')->latest('updated_at')->first();
        }else{
            MigasStock::create([
                'name' => $request->name,
                'quantity' => $request->item_in,
                'price_per_item' => $request->price_per_item,
                'total_price' => $request->total_price,
            ]);
            $last2 = \DB::table('migas_stocks')->latest('created_at')->first();
        }

        $id2 = $last2->id;
        MigasMutation::create([
            'date' => $request->date,
            'name' => $request->name,
            'description' => $request->description,
            'item_in' => $request->item_in,
            'item_out' => $request->item_out,
            'migas_stock_id' => $id2,
            
        ]);
        return redirect('/superadmin/mutasi/migas')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, MigasMutation $mutation){
        $rules = array(
            'date' => 'required',
            'name' => 'required',
            'description' => 'required',
            'item_in' => 'required',
            'item_out' => 'required',
        );
        $messages = array(
            'date.required' => 'Tanggal wajib diisi.',
            'name.required' => 'Username wajib diisi.',
            'item_in.required' => "Jumlah wajib diisi",
            'item_out.required' => 'Jumlah wajib diisi',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/superadmin/mutasi/migas')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        if ($mutation->migas_purchase_id != 0){
            MigasPurchase::where('id', $mutation->migas_purchase_id)->update([
                'date' => $request->date,
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price_per_item' => $request->price_per_item,
                'total_price' => $request->total_price,

            ]);
        }

        MigasMutation::where('id', $mutation->id)->update([
        'date' => $request->date,
        'name' => $request->name,
        'description' => $request->description,
        'item_in' => $request->item_in,
        'item_out' => $request->item_out,
        
        ]);
        return redirect('/superadmin/mutasi/migas')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(MigasMutation $mutation){

        $qty = \DB::table('migas_stocks')->where('name', $mutation->name)->value('quantity');
        MigasStock::where('name', $mutation->name)->first()?->update([
            'quantity' => (int)$qty-(int)$mutation->item_in+(int)$mutation->item_out,
            
        ]);

        MigasMutation::destroy($mutation->id);
        if($mutation->migas_purchase_id != 0){
            MigasPurchase::where('id', $mutation->migas_purchase_id)->delete();
        }

        return redirect('/superadmin/mutasi/migas')->with('success', 'Data berhasil dihapus');
    }
}
