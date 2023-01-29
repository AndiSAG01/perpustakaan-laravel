<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Income;
use App\Models\Transaction;
use App\Models\User;

class ReportController extends Controller
{
   public function users()
   {
        $title = 'Laporan Data User';
        return view('report.users', [
            'users' => User::all(),
            'title' => $title
        ]);
   }
    
   public function books()
   {
        $title = 'Laporan Data Buku';
        return view('report.books', [
            'books' => Book::all(),
            'title' => $title
        ]);
   }
   
   public function transactions()
   {
    $title = 'Laporan Data Transaksi';

        return view('report.transactions', [
            'transactions' => Transaction::all(),
            'title' => $title
        ]);
   }

   public function incomes()
   {
    $title = 'Laporan Data Denda';

    return view('report.incomes', [
        'incomes' => Income::all(),
        'title' => $title
    ]);
   }
    
}
