<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AviasiStock;
use Validator;

class DataAvStockController extends Controller
{
    public function index()
    {
        return view('superadmin.aviasi-stock', [
            'data' => AviasiStock::all()
        ]);
    }

    public function store(Request $request){
        $rules = array(
            'name' => 'required',
            
            'quantity' => 'required|numeric',
        );
        $messages = array(
        
            'name.required' => 'Username wajib diisi.',
            
            'quantity.required' => "Jumlah wajib diisi",
            'quantity.numeric' => "Jumlah wajib diisi dengan angka",
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/superadmin/stock/aviasi')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        if (AviasiStock::where('name', $request->name)->count() > 0) {
            return redirect('/superadmin/stock/aviasi')->with('error', 'Input gagal. Data barang "'.$request->name.'" sudah ada.');
         }

        AviasiStock::create($request->all());
        return redirect('/superadmin/stock/aviasi')->with('success', 'Data berhasil ditambahkan');
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
            return redirect('/superadmin/stock/aviasi')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        AviasiStock::where('id', $stock->id)->first()?->update([
        'name' => $request->name,
        'description' => $request->description,
        'quantity' => $request->quantity,
        
        ]);
        return redirect('/superadmin/stock/aviasi')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(AviasiStock $stock){
        AviasiStock::destroy($stock->id);
        return redirect('/superadmin/stock/aviasi')->with('success', 'Data berhasil dihapus');
    }
}
