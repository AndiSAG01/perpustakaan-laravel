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
            'entry' => Transaction::where('status', 0)->orderby('updated_at', 'desc')->get(),
            'return' => Transaction::where('status', 1)->orderby('updated_at', 'desc')->get(),
            'pending' => Transaction::where('status', 2)->orderby('updated_at', 'desc')->get(),
            'users' => User::all(),
            'books' => Book::all(),
            'day' => Carbon::now()->format('Y-m-d'),
            'late' => Late::first(),
            'now' => Carbon::now()->format('Y-m-d')
        ]);

    }
    
    public function store(TransactionRequest $request)
    {
        $late_id = late::first()->id;
        $return = $request->return;
        $formDate = Carbon::createFromDate($return);
        $now = Carbon::now();
        $lateday = $formDate->diffInDays($now);

        $status = User::whereid($request->user_id)->first()->status;
        $count = transaction::where([
            ['user_id', $request->user_id],
            ['status', false],
        ])->count();
        $maxtransaction = $status == 1 ? 5 : 2 ;


        if ( $count >= $maxtransaction ) {
            return back()->with('fail', 'Peminjaman melebihi batas yang telah ditentukan 😀');
        } else {
            if ($request->return > $now) {
                Transaction::create([
                'transactionCode' => 'TRX'.Str::random(5),
                'book_id'=> $request->book_id,
                'user_id'=> $request->user_id,
                'late_id'=> $late_id,
                'entry'=> $request->entry,
                'return'=> $request->return,
                'lateDay' => 0,
                'description' => 'Masih Dipinjam',
                'status'=> false,
                'book' => Book::find($request->book_id)->borrow(),
            ]);
            } else {
                Transaction::create([
                    'transactionCode' => 'TRX'.Str::random(5),
                    'book_id'=> $request->book_id,
                    'user_id'=> $request->user_id,
                    'late_id'=> $late_id,
                    'entry'=> $request->entry,
                    'return'=> $request->return,
                    'lateDay' => $lateday,
                    'description' => 'Total Denda Rp. ' . $lateday * $request->late_id,
                    'status'=> false,
                    'book' => Book::find($request->book_id)->borrow(),
                ]);
            }
            
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

    public function ended($id)
    {
        $transaction = transaction::findOrFail($id)->first()->book_id;
        Book::findOrFail($transaction)->lend();
        Transaction::where('id', $id)->update([
            'status'=> true,
            'return'=> now(),
            'description' => 'Peminjaman selesai',
        ]);
        return redirect('transaction')->with('success', 'Buku Berhasil Dikembalikan 🤩');
    }
    public function confirmation($id)
    {
        return view('transaction.confirmation', [
            'pending' => Transaction::where('id', $id)->first(),
            'day' => carbon::now()->format('Y-m-d')
        ]);
        
    }
    public function agree(Request $request, $id)
    {
        $request->validate([
                'late_id'=> 'required|integer',
                'entry'=> 'required|date',
                'return'=> 'required|date',
                'status'=> 'required',
        ]);

        $return = $request->return;
        $formDate = Carbon::createFromDate($return);
        $now = Carbon::now();
        $lateday = $formDate->diffInDays($now);
        $late_id = late::where('id', 1)->first()->body;
        $book_id = transaction::where('id', $id)->first()->book->id;

        if ($request->return > $now) {
            Transaction::where('id', $id)->update([
                'book_id'=> $book_id,
                'late_id'=> $request->late_id,
                'entry'=> $request->entry,
                'return'=> $request->return,
                'lateDay' => 0,
                'description' => 'Masih Dipinjam',
                'status'=> false,
            ]);
            Book::find($book_id)->borrow();
        } else {
            Transaction::where('id', $id)->update([
                'book_id'=> $book_id,
                'late_id'=> $request->late_id,
                'entry'=> $request->entry,
                'return'=> $request->return,
                'lateDay' => $lateday,
                'description' => 'Total Denda Rp. ' . $lateday * $late_id,
                'status'=> false,
            ]);
            Book::find($book_id)->borrow();
        }
        return redirect('transaction')->with('success', 'Tambah Data Berhasil 🤩');
    }

    public function reject($id){
        transaction::whereId($id)->update([
            'status' => 3,
            'description' => 'Ditolak'
        ]);
        return redirect('transaction')->with('success', 'Permintaan telah ditolak 😏');

    }
}
