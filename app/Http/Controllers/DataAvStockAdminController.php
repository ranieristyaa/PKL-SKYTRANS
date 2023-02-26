<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AviasiStock;
use Validator;
use App\Models\AviasiMutation;
use App\Models\AviasiPurchase;
use App\Models\AviasiRental;

class DataAvStockAdminController extends Controller
{
    public function index()
    {
        return view('admin.aviasi-stock', [
            'data' => AviasiStock::all()
        ]);
    }

    public function store(Request $request){
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        );
        $messages = array(
        
            'name.required' => 'Username wajib diisi.',
            'description.required' => 'Keterangan wajib diisi',
            'quantity.required' => "Jumlah wajib diisi",
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/admin/stock/aviasi')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        AviasiStock::create($request->all());
        return redirect('/admin/stock/aviasi')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, AviasiStock $stock){
        $rules = array(
            'name' => 'required',
            'quantity' => 'required',
        );
        $messages = array(
        
            'name.required' => 'Username wajib diisi.',
            'quantity.required' => "Jumlah wajib diisi",
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/admin/stock/aviasi')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        AviasiPurchase::where('aviasi_stock_id', $stock->id)->update([
            'name' => $request->name,
            
        ]);

        AviasiMutation::where('aviasi_stock_id', $stock->id)->update([
            'name' => $request->name,
            
        ]);

        AviasiStock::where('id', $stock->id)->first()?->update([
        'name' => $request->name,
        'description' => $request->description,
        'quantity' => $request->quantity,
        
        ]);
        return redirect('/admin/stock/aviasi')->with('success', 'Data berhasil ditambahkan');
    }

    public function destroy(AviasiStock $stock){
        AviasiMutation::where('aviasi_stock_id', $stock->id)->delete();
        AviasiPurchase::where('aviasi_stock_id', $stock->id)->delete();
        AviasiRental::where('aviasi_stock_id', $stock->id)->delete();

        AviasiStock::destroy($stock->id);
        return redirect('/admin/stock/aviasi')->with('success', 'Data berhasil dihapus');
    }
}
