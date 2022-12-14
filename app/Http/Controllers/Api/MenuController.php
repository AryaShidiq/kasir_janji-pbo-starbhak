<?php

namespace App\Http\Controllers\Api;

use App\Models\menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    public function index()
    {
        //get posts
        $menu = menu::latest()->get();

        //return collection of posts as a resource
        return new MenuResource(true, 'List Data Posts', $menu);
    }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [

            'namamenu'     => 'required',
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga'   => 'required',
            'kategori_id'   => 'required',
            'stock'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/posts', $foto->hashName());

        //create post
        $menu = menu::create([
            'namamenu'     => $request->namamenu,
            'foto'     => $foto->hashName(),
            'harga'   => $request->harga,
            'kategori_id'   => $request->kategori_id,
            'stock'   => $request->stock,
        ]);

        //return response
        return new MenuResource(true, 'Data Post Berhasil Ditambahkan!', $menu);
    }

    public function show(menu $menu)
    {
        //return single post as a resource
        $kategori = Kategori::all();
        return new MenuResource(true, 'Data Post Ditemukan!', $menu,$kategori);
    }

    public function update(Request $request, menu $menu)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'namamenu'     => 'required',
            'harga'   => 'required',
            'kategori_id'   => 'required',
            'stock'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('foto')) {

            //upload image
            $foto = $request->file('foto');
            $foto->storeAs('public/posts', $foto->hashName());

            //delete old image
            Storage::delete('public/posts/'.$menu->foto);

            //update post with new image
            $menu->update([
                'namamenu'     => $request->namamenu,
                'foto'     => $foto->hashName(),
                'harga'   => $request->harga,
                'kategori_id'   => $request->kategori_id,
                'stock'   => $request->stock,
            ]);

        } else {

            //update post without image
            $menu->update([
                'namamenu'     => $request->namamenu,
                'harga'   => $request->harga,
                'kategori_id'   => $request->kategori_id,
                'stock'   => $request->stock,
            ]);
        }

        //return response
        return new MenuResource(true, 'Data Post Berhasil Diubah!', $menu);
    }

    public function destroy(menu $menu)
    {
        // delete image
        Storage::delete('public/posts/'.$menu->foto);

        //delete post
        $menu->delete();

        //return response
        return new MenuResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
