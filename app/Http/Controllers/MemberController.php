<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Book;
use App\Models\Guest;
use App\Models\Income;
use App\Models\Late;
use App\Models\Transaction;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index()
    {
        $presensi = Guest::whereId(auth::user()->id)->count();
        $transaction = Transaction::whereId(auth::user()->id)->count();
        $late = Income::whereId(auth::user()->id)->count();
    
        $chart = (new LarapexChart)
            ->setDataset([$presensi, $transaction, $late])
            ->setLabels(['Presensi', 'Transaksi', 'Denda']);
    
        $guests = Guest::whereId(auth::user()->id)->get();
    
        $created_at = [];
        $mount = [];
        foreach ($guests as $guest) {
            $created_at[] = $guest->created_at->format('Y-m-d');
            $mount[] = $guest->created_at->format('M');
        }
    
        $chart2 = (new LarapexChart)
            ->setType('area')
            ->setXAxis($mount)
            ->setDataset([
                [
                    'name' => 'Pengunjung Perpustakaan',
                    'data' => $created_at,
                ],
            ]);
        return view('member.index', [
            'transaction' => Transaction::where('user_id', Auth()->user()->id)->get(),
            'chart' => $chart,
            'chart2' => $chart2,

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
