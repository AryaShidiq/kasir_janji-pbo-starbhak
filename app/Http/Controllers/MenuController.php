<?php

namespace App\Http\Controllers;

use App\Models\menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){

        $data = menu::all();
        return view('menu./menu', compact('data'));
    }
}
