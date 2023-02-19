<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
class LogAktivitasController extends Controller
{
    public function index(){
        $s = Auth::user()->id;
        return view('superadmin.log', [
        'data' => DB::table('activity_log')->where('causer_id', $s)->orderBy('created_at', 'desc')->get()]);
    }
}
