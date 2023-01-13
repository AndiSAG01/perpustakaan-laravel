<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index', [
            'transaction' => Transaction::where('user_id', Auth()->user()->id)->get()

        ]);
    }

    public function show()
    {
        return view('member.profile', [
            'transaction' => Transaction::where('user_id', Auth()->user()->id)->get()
        ]);
    }

    public function update(request $request)
    {
        Auth::user()->update([
            'noId'=> $request->noId,
            'name'=> $request->name,
            'email'=> $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'telp' => $request->telp,
            'isAdmin' => $request->isAdmin,
        ]);

        return redirect('user')->with('success', 'Update Data Berhasil 🤩');
    }
}
