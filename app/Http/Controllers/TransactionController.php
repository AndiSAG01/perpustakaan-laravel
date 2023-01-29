<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Book;
use App\Models\Late;
use App\Models\transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.index', [
            'entry' => Transaction::where('status', 0)->get(),
            'return' => Transaction::where('status', 1)->get(),
            'pending' => Transaction::where('status', 2)->get(),
            'users' => User::all(),
            'books' => Book::all(),
            'day' => Carbon::now()->format('Y-m-d'),
            'late' => Late::first(),
            'now' => Carbon::now()->format('Y-m-d')
        ]);

    }
    
    public function store(TransactionRequest $request)
    {
        $return = $request->return;
        $formDate = Carbon::createFromDate($return);
        $now = Carbon::now();
        $lateday = $formDate->diffInDays($now);

        if ($request->return > $now) {
            Transaction::create([
                'transactionCode' => 'TRX'.Str::random(5),
                'book_id'=> $request->book_id,
                'user_id'=> $request->user_id,
                'late_id'=> $request->late_id,
                'entry'=> $request->entry,
                'return'=> $request->return,
                'lateDay' => '',
                'description' => 'Masih Dipinjam',
                'status'=> false,
                'book' => Book::find($request->book_id)->borrow(),
            ]);
        } else {
            Transaction::create([
                'transactionCode' => 'TRX'.Str::random(5),
                'book_id'=> $request->book_id,
                'user_id'=> $request->user_id,
                'late_id'=> $request->late_id,
                'entry'=> $request->entry,
                'return'=> $request->return,
                'lateDay' => $lateday,
                'description' => 'Total Denda Rp. ' . $lateday * $request->late_id,
                'status'=> false,
                'book' => Book::find($request->book_id)->borrow(),
            ]);
        }

        return back()->with('success', 'Tambah Data Sukses 😀');
    }

    public function show($id)
    {
        return view('transaction.show', [
            'transaction' => transaction::where('id', $id)->first(),
            'users' => User::get(),
            'books' => Book::get(),        
            'lates' => Late::get(),        
        ]);
    }
    public function edit($id)
    {
        return view('transaction.edit', [
            'transaction' => Transaction::where('id', $id)->first(),
            'users' => User::get(),
            'books' => Book::get(),        
            'lates' => Late::get(),   
        ]);
    }

    public function update(TransactionRequest $request, $id)
    {
        $return = $request->return;
        $formDate = Carbon::createFromDate($return);
        $now = Carbon::now();
        $lateday = $formDate->diffInDays($now);

        Transaction::where('id', $id)->update([
            'book_id'=> $request->book_id,
            'user_id'=> $request->user_id,
            'entry'=> $request->entry,
            'return'=> $request->return,
            'lateDay' => $lateday,
            'description' => $request->description,
            'status'=> $request->status,
        ]);
        return redirect('transaction')->with('success', 'Update Data Berhasil 🤩');

    }
    public function destroy($id)
    {           
        // CloudinaryStorage::delete($transaction->image);
        transaction::where('id', $id)->delete();

        return redirect('transaction')->with('success', 'Hapus Data Berhasil 😎');
    }

    public function ended(Request $request, $id)
    {
        $return = $request->return;
        $formDate = Carbon::createFromDate($return);
        $now = Carbon::now();
        $lateday = $formDate->diffInDays($now);

        Transaction::where('id', $id)->update([
            'book_id'=> $request->book_id,
            'user_id'=> $request->user_id,
            'entry'=> $request->entry,
            'return'=> $request->return,
            'lateDay' => $lateday,
            'description' => $request->description,
            'status'=> $request->status,
        ]);
        return redirect('transaction')->with('success', 'Update Data Berhasil 🤩');

    }
}
