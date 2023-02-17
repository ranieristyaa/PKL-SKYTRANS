<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MigasStock;

class DataMgStockAdminController extends Controller
{
    public function index()
    {
        return view('admin.migas-stock', [
            'data' => MigasStock::all()
        ]);
    }
}
