<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function indexpegawai()
    {
        $pegawai = pegawai::all();
        return view('pegawai.pegawai', compact('pegawai'));
    }
    public function crtpegawai()
    {
        return view('pegawai.create');
    }
    public function strpegawai(Request $request)
    {
        pegawai::create($request->all());
        return redirect('/pegawai');
    }
    public function editpegawai($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.edit', compact('pegawai'));
    }
    public function updtpegawai(Request $request,$id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->update($request->all());
        return redirect('/pegawai');
    }
    public function dltpegawai($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
        return redirect('/pegawai');
    }

}
