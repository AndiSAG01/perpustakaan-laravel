<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Book;
use App\Models\Late;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index', [
            'transaction' => Transaction::where('user_id', Auth()->user()->id)->get(),

        ]);
    }

    public function show()
    {
        return view('member.profile', [
            
        ]);
    }

    public function edit()
    {
        return view('member.update', [
            
        ]);    
    }

    public function update(request $request)
    {
        $request->validate([
            'noId' => 'required|integer|min:8|unique:users,noId',
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'password'=> 'min:5',
            'isAdmin' => 'required|integer',
            'birthday' => 'required',
            'gender'  => 'required|integer',
            'address' => 'required|min:5',
            'telp' => 'required|string',
        ]);
        $user = Auth::user();
        $user->update([
            'noId'=> $request->noId,
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'telp' => $request->telp,
            'isAdmin' => 0,
        ]);

        return view('member.profile')->with('success', 'Update Data Berhasil 🤩');
    }

    public function history()
    {
        return view('member.history', [
            'history' => Transaction::where('user_id', Auth()->user()->id)->get(),
            'day' => Carbon::now()->format('Y-m-d'),
            'books'=> Book::get(),
            'late'=> Late::where('id', 1)->first(),

        ]);
    }

    public function print()
    {
        return view('guest.result', [
            'user' => Auth::user()
        ]); 
    }
    public function borrow(Request $request)
    {
        $request->validate([
            'transactionCode' => '',
            'book_id' => 'required|integer',
            'submission' => 'required',
            'late_id' => 'required',
        ]);
        Transaction::create([
            'transactionCode' => 'TRX'.Str::random(5),
            'book_id'=> $request->book_id,
            'user_id'=> Auth::user()->id,
            'late_id'=> $request->late_id,
            'submission'=> $request->submission,
            'description' => 'Menunggu Konfirmasi',
            'status'=> 2,
        ]);

        return back()->with('success', 'Pengajuan Sukses, Silahkan tunggu konfirmasi dari administrator 😀');
    }
}
