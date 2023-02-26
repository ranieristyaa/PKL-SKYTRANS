<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MigasPurchase;
use Validator;
use App\Models\MigasStock;
use App\Models\MigasMutation;

class DataMgPurchaseAdminController extends Controller
{
    public function index()
    {
        return view('admin.migas-purchase', [
            'data' => MigasPurchase::all()
        ]);
    }

    public function store(Request $request){
        $rules = array(
            'date' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price_per_item' => 'required|numeric|min:4',
            'total_price' => 'required|numeric|min:4' 
        );
        $messages = array(
        
            'name.required' => 'Username wajib diisi.',
            'date.required' => 'Tanggal wajib diisi',
            'quantity.required' => "Jumlah wajib diisi",
            'price_per_item.required' => "Harga satuan wajib diisi",
            'price_per_item.numeric' => "Harga satuan wajib diisi dengan angka",
            'price_per_item.min' => "Harga satuan minimal 1000",
            'total_price.required' => "Total harga wajib diisi",
            'total_price.numeric' => "Total harga wajib diisi dengan angka",
            'total_price.min' => "Total harga minimal 1000",
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/admin/pembelian/migas')->with('error', 'Input data gagal mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }


        
        if (\DB::table('migas_stocks')->where('name', $request->name)->count() > 0){
            $qty = \DB::table('migas_stocks')->where('name', $request->name)->value('quantity');
            MigasStock::where('name', $request->name)->first()?->update([
                'quantity' => (int)$qty+(int)$request->quantity,
            ]);
            $last2 = \DB::table('migas_stocks')->latest('updated_at')->first();
        }else{
            MigasStock::create([
                'name' => $request->name,
                'quantity' => $request->quantity,
                'price_per_item' => $request->price_per_item,
                'total_price' => $request->total_price,
            ]);
            $last2 = \DB::table('migas_stocks')->latest('created_at')->first();
        }

        $id2 = $last2->id;
        MigasPurchase::create([
            'date' => $request->date,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price_per_item' => $request->price_per_item,
            'total_price' => $request->total_price,
            'migas_stock_id' => $id2,
        ]);

        $last = \DB::table('migas_purchases')->latest('id')->first();
        $id = $last->id;
       
        MigasMutation::create([
            'date' => $request->date,
            'name' => $request->name,
            'item_in' => $request->quantity,
            'item_out' => 0,
            'migas_purchase_id' => $id,
            'migas_stock_id' => $id2,
        ]);
        return redirect('/admin/pembelian/migas')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, MigasPurchase $purchase){
        $rules = array(
            'date' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price_per_item' => 'required|numeric|min:4',
            'total_price' => 'required|numeric|min:4' 
        );
        $messages = array(
            'date.required' => 'Tanggal wajib diisi',
            'name.required' => 'Username wajib diisi.',
           
            'quantity.required' => "Jumlah wajib diisi",
            'price_per_item.required' => "Harga satuan wajib diisi",
            'price_per_item.numeric' => "Harga satuan wajib diisi dengan angka",
            'price_per_item.min' => "Harga satuan minimal 1000",
            'total_price.required' => "Total harga wajib diisi",
            'total_price.numeric' => "Total harga wajib diisi dengan angka",
            'total_price.min' => "Total harga minimal 1000",
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/admin/pembelian/migas')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        $qty = \DB::table('Migas_stocks')->where('id', $purchase->migas_stock_id)->value('quantity');
            MigasStock::where('id', $purchase->migas_stock_id)->first()?->update([
                'quantity' => (int)$qty-(int)$request->old+(int)$request->quantity,
        ]);

        MigasMutation::where('migas_purchase_id', $purchase->id)->update([
            'date' => $request->date,
            'name' => $request->name,
            'item_in' => $request->quantity,
            'item_out' => 0,
        ]);

        MigasPurchase::where('id', $purchase->id)->update([
        'date' => $request->date,
        'name' => $request->name,
        'quantity' => $request->quantity,
        'price_per_item' => $request->price_per_item,
        'total_price' => $request->total_price,
        
        ]);
        return redirect('/admin/pembelian/migas')->with('success', 'Data berhasil di update');
    }

    public function destroy(MigasPurchase $purchase, Request $request){
        $qty = \DB::table('migas_stocks')->where('id', $purchase->mgias_stock_id)->value('quantity');
        if ((int)$qty-(int)$purchase->quantity < 0 ){
            MigasStock::where('name', $purchase->name)->first()?->update([
                'quantity' => 0,
                
            ]);
        }else{
            MigasStock::where('id', $purchase->migas_stock_id)->first()?->update([
                'quantity' => (int)$qty-(int)$purchase->quantity,
                
            ]);
        }
        MigasMutation::where('migas_purchase_id', $purchase->id)->delete();
        
        MigasPurchase::destroy($purchase->id);

        return redirect('/admin/pembelian/migas')->with('success', 'Data berhasil dihapus');
    }
        
       
}
