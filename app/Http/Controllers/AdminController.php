<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AviasiMutation;
use Illuminate\Support\Carbon;
use App\Models\MigasStock;
use App\Models\MigasMutation;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function index() {
        return view('admin.home', [
            'data' => MigasStock::all(),
            'data1' => AviasiMutation::selectRaw('SUM(item_in) as jum_msk')
                        ->whereBetween('date', 
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->get(),
            'data2' => AviasiMutation::selectRaw('SUM(item_out) as jum_kel')
                        ->whereBetween('date', 
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->get(),
            'data3' => MigasMutation::selectRaw('SUM(item_in) as jm')
                        ->whereBetween('date', 
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->get(),
            'data4' => MigasMutation::selectRaw('SUM(item_out) as jk')
                        ->whereBetween('date', 
                        [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                        ->get(),
           'data5' => DB::table('activity_log')->where('causer_id', Auth::user()->id)->orderBy('created_at', 'desc')->get()
        ]);
    }
}
