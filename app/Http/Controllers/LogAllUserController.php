<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogAllUserController extends Controller
{
    public function index(){
        return view('superadmin.log-all', [
        'data' => DB::table('activity_log')->orderBy('created_at', 'desc')->get()]);
    }

}
