<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        
        return view('home',[
            'user' => User::count(),
            'category' => Category::count(),
            'book' => Book::count(),
            'transactions' => Transaction::count(),
        ]);
    }
}
