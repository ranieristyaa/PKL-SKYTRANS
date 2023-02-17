<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AviasiStock;
use App\Models\MigasStock;
use App\Models\AviasiMutation;
use App\Models\MigasMutation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function index() {
        $av = AviasiStock::select('id', 'name', 'description')->orderBy('created_at', 'desc');
        return view('superadmin.home', [
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
           'data5' => DB::table('activity_log')->orderBy('created_at', 'desc')->get()
        ]);
    }
}
