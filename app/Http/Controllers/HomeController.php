<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Guest;
use App\Models\Income;
use App\Models\Letter;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

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
        $late = Income::count();
        $chart = (new LarapexChart)
                   ->setDataset([$user, $book, $entry, $return, $late])
                   ->setLabels(['User', 'Buku', 'Peminjaman', 'Pengembalian', 'Denda']);

        // $guests = Guest::whereYear('created_at', Carbon::now()->year)->orderBy('created_at','asc')->distinct()->get();
        $guests = Guest::orderBy('created_at','asc')->distinct()->limit(10)->get();

        $created_at = [];
            foreach ($guests as $guest) {
                $created_at[] = $guest->date;
                $mount[] = $guest->created_at->format('M');
            }
            
            $chart2 = (new LarapexChart)->setType('area')
                ->setXAxis($mount)
                ->setDataset([
                    [
                        'name' => 'Pengunjung Perpustakaan',
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
