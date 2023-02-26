<?php

namespace App\Http\Controllers;

use App\Models\AviasiMutation;
use Illuminate\Http\Request;
use App\Models\AviasiPurchase;
use Validator;
use App\Models\AviasiStock;

class DataAvPurchaseController extends Controller
{
    public function index()
    {
        return view('superadmin.aviasi-purchase', [
            'data' => AviasiPurchase::all(),
            'stock' => AviasiStock::all(),
        ]);
    }

    public function store(Request $request){
        $rules = array(
            'date' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            
            'price' => 'required',
        );
        $messages = array(
            'date.required' => 'Tanggal wajib diisi.',
            'name.required' => 'Username wajib diisi.',
            'quantity.required' => "Jumlah wajib diisi",
            'price.required' => 'Harga wajib diisi',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/superadmin/pembelian/aviasi')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        
        if (\DB::table('aviasi_stocks')->where('name', $request->name)->count() > 0){
            $qty = \DB::table('aviasi_stocks')->where('name', $request->name)->value('quantity');
            AviasiStock::where('name', $request->name)->first()?->update([
                'quantity' => (int)$qty+(int)$request->quantity,
            ]);
            $last2 = \DB::table('aviasi_stocks')->latest('updated_at')->first();
        }else{
            AviasiStock::create([
                'name' => $request->name,
                'quantity' => $request->quantity,
            ]);
            $last2 = \DB::table('aviasi_stocks')->latest('created_at')->first();
        }
        
        $id2 = $last2->id;
        AviasiPurchase::create([
            'date' => $request->date,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price_per_item' => $request->price,
            'price' => $request->price,
            'aviasi_stock_id' => $id2,
            'person_in_charge' => $request->pic,
        ]);

        $last = \DB::table('aviasi_purchases')->latest('id')->first();
        $id = $last->id;
       
        AviasiMutation::create([
            'date' => $request->date,
            'name' => $request->name,
            'item_in' => $request->quantity,
            'item_out' => 0,
            'aviasi_purchase_id' => $id,
            'aviasi_stock_id' => $id2,
            'person_in_charge' => $request->pic,
        ]);
        
        return redirect('/superadmin/pembelian/aviasi')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, AviasiPurchase $purchase){
        $rules = array(
            'date' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price_per_item' => 'required',
            'price' => 'required',
        );
        $messages = array(
            'date.required' => 'Tanggal wajib diisi.',
            'name.required' => 'Username wajib diisi.',
            'quantity.required' => "Jumlah wajib diisi",
            'price.required' => 'Harga wajib diisi',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/superadmin/pembelian/aviasi')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        $qty = \DB::table('aviasi_stocks')->where('id', $purchase->aviasi_stock_id)->value('quantity');
            AviasiStock::where('id', $purchase->aviasi_stock_id)->first()?->update([
                'quantity' => (int)$qty-(int)$request->old+(int)$request->quantity,
        ]);

        AviasiMutation::where('aviasi_purchase_id', $purchase->id)->update([
            'date' => $request->date,
            'name' => $request->name,
            'item_in' => $request->quantity,
            'item_out' => 0,
            'person_in_charge' => $request->pic,
        ]);

        AviasiPurchase::where('id', $purchase->id)->update([
        'date' => $request->date,
        'name' => $request->name,
        'quantity' => $request->quantity,
        'price_per_item' => $request->price,
        'price' => $request->price,
        'person_in_charge' => $request->pic,
        
        ]);
        return redirect('/superadmin/pembelian/aviasi')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(AviasiPurchase $purchase, Request $request){
       

        $qty = \DB::table('aviasi_stocks')->where('id', $purchase->aviasi_stock_id)->value('quantity');
        if ((int)$qty-(int)$purchase->quantity < 0 ){
            AviasiStock::where('name', $purchase->name)->first()?->update([
                'quantity' => 0,
                
            ]);
        }else{
            AviasiStock::where('id', $purchase->aviasi_stock_id)->first()?->update([
                'quantity' => (int)$qty-(int)$purchase->quantity,
                
            ]);
        }
        AviasiMutation::where('aviasi_purchase_id', $purchase->id)->delete();
        
       AviasiPurchase::destroy($purchase->id);

        return redirect('/superadmin/pembelian/aviasi')->with('success', 'Data berhasil dihapus');
    }

}
