<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){

        $menu = menu::all();
        return view('menu./menu', compact('menu'));
    }
    public function crtmenu()
    {
        return view('menu.create');
    }
    public function strmenu(Request $request)
    {
        menu::create($request->all());
        return redirect('/menu');
    }
    public function editmenu(Request $request,$id)
    {
        $menu = Menu::find($id);
        return view('menu.edit', compact('menu'));
    }
    public function updtmenu(Request $request,$id)
    {
        $menu = Menu::find($id);
        $menu->update($request->all());
        return redirect('/menu');
    }
    public function dltmenu($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('/menu');
    }


}
