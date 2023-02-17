<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AviasiMutation;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home', [
            'data1' => AviasiMutation::selectRaw('SUM(qty_in) as jumlah')
                    ->whereBetween('created_at', 
                    [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->get()
        ]);
    }
}
