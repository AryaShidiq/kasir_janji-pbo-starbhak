<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function indexhistory()
    {
        $history = History::all();
        return view('history.index', compact('history'));
    }
    public function crthistory()
    {
        return view('history.create');
    }
    public function strhistory(Request $request)
    {
        history::create($request->all());
        return redirect('/history');
    }
    public function edithistory($id)
    {
        $history = History::find($id);
        return view('history.edit', compact('history'));
    }
    public function updthistory(Request $request,$id)
    {
        $history = History::find($id);
        $history->update($request->all());
        return redirect('/history');
    }
    public function dlthistory($id)
    {
        $history = History::find($id);
        $history->delete();
        return redirect('/history');
    }
}
