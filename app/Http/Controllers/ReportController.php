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
        return view('report.users', [
            'users' => User::all()
        ]);
   }
    
   public function books()
   {
        return view('report.books', [
            'books' => Book::all()
        ]);
   }
   
   public function transactions()
   {
        return view('report.transactions', [
            'transactions' => Transaction::all()
        ]);
   }

   public function incomes()
   {
    return view('report.incomes', [
        'incomes' => Income::all()
    ]);
   }
    
}
