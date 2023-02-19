<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LogAktivitasAdminController extends Controller
{
    public function index(){
        $s = Auth::user()->id;
        return view('admin.log', [
        'data' => DB::table('activity_log')->where('causer_id', $s)->orderBy('created_at', 'desc')->get()]);
    }
}
