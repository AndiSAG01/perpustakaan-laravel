<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncomeRequest;
use App\Models\Book;
use App\Models\Income;
use App\Models\Late;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        return view('income.index', [
            'incomes' => Income::orderby('updated_at', 'desc')->get(),
            'transactions' => Transaction::get(),
            'users' => User::all(),
            'books' => Book::all(),        
            'lates' => Late::whereId(1)->first(), 
            'telat' => Transaction::Where('lateDay', '>', 0)->orderby('updated_at', 'desc')->get(),
 
        ]);
    }

    public function store(IncomeRequest $request)
    {
        Income::create([
            'transaction_id' => $request->transaction_id,
            'date' => $request->date,
            'description' => $request->description
        ]);

        Transaction::where('id', $request->transaction_id)->update([
            'status'=> true,
            'return'=> now(),
            'description' => 'Peminjaman selesai',
        ]);

        return redirect('income')->with('success', 'Tambah Data Sukses 😙');
    }

    public function edit($id)
    {
        return view('income.update', [
            'income' => Income::where('id', $id)->first(),
            'transactions' => Transaction::get(),
            'incomes' => Income::get(),
            'users' => User::all(),
            'books' => Book::all(),        
            'lates' => Late::all(),         
        ]);
    }

    public function update($id, IncomeRequest $request)
    {
        
        Income::where('id', $id)->update([
            'transaction_id' => $request->transaction_id,
            'date' => $request->date,
            'description' => $request->description
        ]);

        return redirect('income')->with('success', 'Update Data Berhasil 🤗');
    }

    public function destroy($id)
    {
        Income::where('id', $id)->delete();
        
        return redirect('income')->with('success', 'Hapus Data Berhasil 😎');
    }

    public function pay($id){
        return view('income.store',[
            'pay' => Transaction::whereId($id)->first(),
            'incomes' => Income::get(),
            'transactions' => Transaction::get(),
            'users' => User::all(),
            'books' => Book::all(),        
            'lates' => Late::all(),  
            ]);
    }

    // public function repay(Request $request){

    //     $tes = Income::create([
    //         'transaction_id' => $request->transaction_id,
    //         'date' => $request->date,
    //         'description' => $request->description
    //     ]);
    //     dd($tes);

    //     return redirect('transaction')->with('success', 'Denda pengembalian buku telah selesai 😎');
    // }
}
