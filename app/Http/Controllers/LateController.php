<?php

namespace App\Http\Controllers;

use App\Models\Late;
use Illuminate\Http\Request;

class LateController extends Controller
{
    public function index()
    {
        return view('transaction.index');
    }

    public function store(Request $request)
    {
        Late::create(['body' => $request->body]);
        return redirect('transaction');
        
    }
    public function update(Request $request, $id)
    {
        Late::where('id', 1)->update(['body' => $request->body]);
        return redirect('transaction');
    }
}
