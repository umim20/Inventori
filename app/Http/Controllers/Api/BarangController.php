<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        return response()->json(Barang::all());
    }
}

