<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AviasiMutation;
use App\Models\AviasiPurchase;
use Validator;
use App\Models\AviasiStock;

class DataAvMutationController extends Controller
{
    public function index()
    {
        return view('superadmin.aviasi-mutation', [
            'data' => AviasiMutation::all()
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
            return redirect('/superadmin/mutasi/aviasi')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }


        if (\DB::table('aviasi_stocks')->where('name', $request->name)->count() > 0){
            if ($request->item_in == 0){
                $qty = \DB::table('aviasi_stocks')->where('name', $request->name)->value('quantity');
                if ((int)$qty-(int)$request->item_out){
                    return redirect('/superadmin/mutasi/aviasi')->with('error', 'Input data gagal, jumlah barang keluar tidak sesuai dengan stock.')
                    ->withErrors($validator)
                    ->withInput();
                }
                AviasiStock::where('name', $request->name)->first()?->update([
                    'quantity' => (int)$qty-(int)$request->item_out,
                ]);
            }else if ($request->item_out == 0){
                $qty = \DB::table('aviasi_stocks')->where('name', $request->name)->value('quantity');
                AviasiStock::where('name', $request->name)->first()?->update([
                    'quantity' => (int)$qty+(int)$request->item_in,
                ]);
            }else{
                $qty = \DB::table('aviasi_stocks')->where('name', $request->name)->value('quantity');
                AviasiStock::where('name', $request->name)->first()?->update([
                    'quantity' => (int)$qty+(int)$request->item_in-(int)$request->item_out,
                ]);
            }
            $last2 = \DB::table('aviasi_stocks')->latest('updated_at')->first();
        }else{
            AviasiStock::create([
                'name' => $request->name,
                'quantity' => $request->item_in,
            ]);
            $last2 = \DB::table('aviasi_stocks')->latest('created_at')->first();
        }

        $id2 = $last2->id;
        AviasiMutation::create([
            'date' => $request->date,
            'name' => $request->name,
            'description' => $request->description,
            'item_in' => $request->item_in,
            'item_out' => $request->item_out,
            'aviasi_stock_id' => $id2,
            'person_in_charge' => $request->pic,
        ]);
        return redirect('/superadmin/mutasi/aviasi')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, AviasiMutation $mutation){
        $rules = array(
            'date' => 'required',
           
            
            'item_in' => 'required',
            'item_out' => 'required',
        );
        $messages = array(
            'date.required' => 'Tanggal wajib diisi.',
           
            'item_in.required' => "Jumlah wajib diisi",
            'item_out.required' => 'Jumlah wajib diisi',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/superadmin/mutasi/aviasi')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        if ($mutation->aviasi_purchase_id != 0){
            AviasiPurchase::where('id', $mutation->aviasi_purchase_id)->update([
                'date' => $request->date,
                'name' => $request->name,
                'quantity' => $request->item_in,
                'person_in_charge' => $request->pic,

            ]);
        }

        AviasiMutation::where('id', $mutation->id)->update([
        'date' => $request->date,
        'name' => $request->name,
        'description' => $request->description,
        'item_in' => $request->item_in,
        'item_out' => $request->item_out,
        'person_in_charge' => $request->pic,
        ]);
        return redirect('/superadmin/mutasi/aviasi')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(AviasiMutation $mutation, Request $request){

        $qty = \DB::table('aviasi_stocks')->where('name', $mutation->name)->value('quantity');

        //jika 

        AviasiStock::where('name', $mutation->name)->first()?->update([
            'quantity' => (int)$qty-(int)$mutation->item_in+(int)$mutation->item_out,
            
        ]);

        AviasiMutation::destroy($mutation->id);
        
        if($mutation->aviasi_purchase_id != 0){
            AviasiPurchase::where('id', $mutation->aviasi_purchase_id)->delete();
        }

        
        return redirect('/superadmin/mutasi/aviasi')->with('success', 'Data berhasil dihapus');
    }
}
