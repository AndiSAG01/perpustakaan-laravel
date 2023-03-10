<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $total = Book::selectRaw('count(*) as jumlah, category_id')
        ->groupBy('category_id')
        ->with('category')
        ->get();

        $counts = [];
        $names = [];

        foreach ($total as $item) {
            $names[] = $item->category->name;
            $counts[] = $item->jumlah;
        }

        $chart = (new LarapexChart)
            ->setType('pie')
            ->setWidth(600)
            ->setLabels($names)
            ->setDataset($counts);


        return view('book.index', [
            'books' => Book::orderby('updated_at', 'desc')->get(),
            'categories' => Category::get(),
            'chart' => $chart,
            'source' => Source::get()

            
        ]);
    }

    public function store(BookRequest $request)
    {   
        // Ambil informasi kategori dari request
        $categoryId = $request->category_id;
        $category = Category::find($categoryId);

        // Ambil nomor terakhir yang digunakan untuk kategori ini
        $lastNo = Book::where('category_id', $categoryId)->max('id');

        // Jika belum ada buku untuk kategori ini, nomor terakhir diinisialisasi dengan 0
        $no = $lastNo === null ? 0 : $lastNo + 1;

        // Buat nomor barcode berdasarkan informasi kategori dan nomor urut
        $title = $request->title;
        $today = Carbon::today()->format('dmy');
        $barcode = substr($title, 0, 1). $no . '-' . $category->code . '-' . $today;

        // Simpan data buku ke database

        $book = new book;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $result = cloudinary()->upload($image->getRealPath(), ['folder' => 'book']);
            $url = $result->getSecurePath();
            $publicId = $result->getPublicId();
            $book->image = $url;
            $book->publicId = $publicId;
        }
        $book->barcode = $barcode;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->source_id = $request->source_id;
        $book->by = $request->by;
        $book->category_id = $request->category_id;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->publicationYear = $request->publicationYear;
        $book->stock = $request->stock;
        $book->save();
        
        return back()->with('success', 'Tambah Data Berhasil 😃');
    }

    public function show($id)
    {
        return view('book.show', [
            'book' => Book::where('id', $id)->first(),
            'categories' => Category::get(),
            'source' => Source::get()

        ]);
    }
    public function edit($id)
    {
        return view('book.edit', [
            'book' => Book::where('id', $id)->first(),
            'categories' => Category::get(),
        ]);
    }

    public function update(BookRequest $request, $id)
    {   
        $book = book::find($id);
        if ($request->hasFile('image')) {            
            $image = $request->file('image');
            $result = cloudinary()->upload($image->getRealPath(), ['folder' => 'book']);
            $url = $result->getSecurePath();
            $publicId = $result->getPublicId();

            $book->image = $url;
            $book->publicId = $publicId;
            if($request->publicId == true){
                Cloudinary()->destroy($request->publicId);
            }
        }
        $book->barcode = $request->barcode;
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->source_id = $request->source_id;
        $book->by = $request->by;
        $book->category_id = $request->category_id;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->publicationYear = $request->publicationYear;
        $book->stock = $request->stock;
        $book->save();

        
        return redirect('book')->with('success', 'Update Data Berhasil 🤩');

    }
    public function destroy($id)
    {   
        $book = Book::find($id);
        if($book->publicId == true){

            $publicId = $book->publicId;
            Cloudinary()->destroy($publicId);
        }
        $book->delete();

        return redirect('book')->with('success', 'Hapus Data Berhasil 😎');
    }
    
}
