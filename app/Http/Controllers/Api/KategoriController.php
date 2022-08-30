<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriResource;
use App\Models\Kategori;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get();

        return new KategoriResource(true, 'List Data Kategori', $kategori);
    }
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kategori'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        };

        //create post
        $kategori = Kategori::create([
            'kategori' => $request->kategori,
        ]);

        //return response
        return new KategoriResource(true, 'Data Post Berhasil Ditambahkan!', $kategori);
    }
    public function show(Kategori $kategori)
    {
        //return single post as a resource
        return new KategoriResource(true, 'Data Kategori Ditemukan!', $kategori);
    }
    public function update(Request $request, Kategori $kategori)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'kategori'     => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //update post without image
        $kategori->update([
            'kategori'   => $request->kategori,
        ]);
        

        //return response
        return new KategoriResource(true, 'Data Kategori Berhasil Diubah!', $kategori);
    }
    public function destroy(Kategori $kategori)
    {
        //delete post
        $kategori->delete();

        //return response
        return new KategoriResource(true, 'Data Kategori Berhasil Dihapus!', null);
    }
}
