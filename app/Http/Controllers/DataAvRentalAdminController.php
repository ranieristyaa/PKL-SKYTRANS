<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AviasiRental;
use App\Models\AviasiMutation;
use App\Models\AviasiStock;
use Validator;

class DataAvRentalAdminController extends Controller
{
    public function index()
    {
        return view('admin.aviasi-rental', [
            'data' => AviasiRental::all()
        ]);
    }

    public function store(Request $request){
        $rules = array(
            'date' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'time' => 'required',
            

        );
        $messages = array(
            'date.required' => 'Tanggal wajib diisi.',
            'name.required' => 'Username wajib diisi.',
            'quantity.required' => "Jumlah wajib diisi",
            'price.required' => 'Harga wajib diisi',
            'time.required' => 'Jangka waktu wajib diisi',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/admin/rental')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }
        $qty = \DB::table('aviasi_stocks')->where('name', $request->name)->value('quantity');
        AviasiStock::where('name', $request->name)->first()?->update([
            'quantity' => (int)$qty-(int)$request->quantity,
        ]);
        $last = \DB::table('aviasi_stocks')->latest('updated_at')->first();
        $id = $last->id;
        AviasiRental::create([
            'date' => $request->date,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'time' => $request->time,
            'aviasi_stock_id' => $id,
        ]);
        $last2 = \DB::table('aviasi_rentals')->latest('id')->first();
        AviasiMutation::create([
            'date' => $request->date,
            'name' => $request->name,
            'item_in' => 0,
            'item_out' => $request->quantity,
            'aviasi_stock_id' => $id,
            'aviasi_rental_id' => $last2->id,
            
        ]);
        return redirect('/admin/rental')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, AviasiRental $rental){
        $rules = array(
            'date' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'time' => 'required',
        );
        $messages = array(
            'date.required' => 'Tanggal wajib diisi.',
            'name.required' => 'Username wajib diisi.',
            'quantity.required' => "Jumlah wajib diisi",
            'price.required' => 'Harga wajib diisi',
            'time.required' => 'Jangka waktu wajib diisi',
        );
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()){
            return redirect('/admin/rental')->with('error', 'Input data gagal, mohon periksa kembali.')
            ->withErrors($validator)
            ->withInput();
        }

        AviasiRental::where('id', $rental->id)->update([
        'date' => $request->date,
        'name' => $request->name,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'time' => $request->time,
        
        ]);
        $qty = \DB::table('aviasi_stocks')->where('id', $rental->aviasi_stock_id)->value('quantity');
        AviasiStock::where('name', $request->name)->first()?->update([
            'quantity' => (int)$qty+(int)$request->old-(int)$request->quantity,
        ]);
        AviasiMutation::where('aviasi_rental_id', $rental->id)->update([
            'date' => $request->date,
            'name' => $request->name,
            'description' => $request->description,
            'item_in' => 0,
            'item_out' => $request->quantity,
            
            ]);
        return redirect('/admin/rental')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(AviasiRental $rental){
        $qty = \DB::table('aviasi_stocks')->where('id', $rental->aviasi_stock_id)->value('quantity');
        if ((int)$qty-(int)$rental->quantity < 0 ){
            AviasiStock::where('name', $rental->name)->first()?->update([
                'quantity' => 0,
                
            ]);
        }else{
            AviasiStock::where('id', $rental->aviasi_stock_id)->first()?->update([
                'quantity' => (int)$qty+(int)$rental->quantity,
                
            ]);
        }
        AviasiMutation::where('aviasi_rental_id', $rental->id)->delete();
        AviasiRental::destroy($rental->id);
        return redirect('/admin/rental')->with('success', 'Data berhasil dihapus');
    }
}
