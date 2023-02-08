<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Guest;
use App\Models\Late;
use App\Models\Letter;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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
        $user = User::count();
        $book = Book::count();
        $entry = transaction::where('status', 0)->count();
        $return = transaction::where('status', 1)->count();
        $late = Late::count();
        $chart = (new LarapexChart)
                   ->setDataset([$user, $book, $entry, $return, $late])
                   ->setLabels(['User', 'Buku', 'Peminjaman', 'Pengembalian', 'Denda']);

    $guests = Guest::orderBy('created_at','desc')->limit(12)->distinct()->get();

    $created_at = [];
       foreach ($guests as $guest) {
           $created_at[] = $guest->date;
           $mount[] = $guest->created_at->format('M');
       }
       
       $chart2 = (new LarapexChart)->setType('area')
           ->setXAxis($mount)
           ->setDataset([
               [
                   'name' => 'Active Users',
                   'data' => $created_at
               ]
           ]);
    
        $letter = Letter::orderBy('created_at', 'ASC')->limit(5)->get();
        
        return view('home',[
            'letters' => $letter,
            'chart' => $chart,
            'chart2' => $chart2,
        ]);
    }
}
