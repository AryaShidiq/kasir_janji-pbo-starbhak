<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function indextransaksi()
    {
        $transaksi = transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }
}
