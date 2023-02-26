<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MigasStock;
use Validator;
use App\Models\MigasMutation;
use App\Models\MigasPurchase;


class DataMgStockAdminController extends Controller
{
    public function index()
    {
        return view('admin.migas-stock', [
            'data' => MigasStock::all()
        ]);
    }

    public function store(Request $request){
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price_per_item' => 'required|numeric|min:4',
            'total_price' => 'required|numeric|min:4' 
        );
        $messages = array(
        
            'name.required' => 'Username wajib diisi.',
            'description.required' => 'Keterangan wajib diisi',
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
            return redirect('/admin/stock/migas')->with('error', 'Input data gagal mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        if (MigasStock::where('name', $request->name)->count() > 0) {
            return redirect('/admin/stock/migas')->with('error', 'Input gagal, data barang sudah ada. Silahkan update jumlah.');
         }

        MigasStock::create($request->all());
        return redirect('/admin/stock/migas')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, MigasStock $stock){
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'price_per_item' => 'required|numeric|min:4',
            'total_price' => 'required|numeric|min:4' 
        );
        $messages = array(
        
            'name.required' => 'Username wajib diisi.',
            'description.required' => 'Keterangan wajib diisi',
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
            return redirect('/admin/stock/migas')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        MigasPurchase::where('migas_stock_id', $stock->id)->update([
            'name' => $request->name,
            
        ]);

        MigasMutation::where('migas_stock_id', $stock->id)->update([
            'name' => $request->name,
            
        ]);


        MigasStock::where('id', $stock->id)->first()?->update([
        'name' => $request->name,
        'description' => $request->description,
        'quantity' => $request->quantity,
        'price_per_item' => $request->price_per_item,
        'total_price' => $request->total_price,
        
        ]);
        return redirect('/admin/stock/migas')->with('success', 'Data berhasil di update');
    }

    public function destroy(MigasStock $stock){

        MigasMutation::where('migas_stock_id', $stock->id)->delete();
        MigasPurchase::where('migas_stock_id', $stock->id)->delete();
        MigasStock::destroy($stock->id);
        return redirect('/admin/stock/migas')->with('success', 'Data berhasil dihapus');
    }

}
