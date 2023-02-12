<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $total = Book::selectRaw('count(*) as jumlah, category_id')
        ->groupBy('category_id')
        ->with('category')
        ->get();

        return view('book.index', [
            'books' => Book::all(),
            'categories' => Category::get(),
            'total' => $total
            
        ]);
    }

    public function store(BookRequest $request)
    {
        $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        $result = $uploadedFileUrl->getFileName();

        dd($result);
        Book::create([
            'image' => $image,
            'publicId' => $publicId,
            'title' => $request->title,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publicationYear' => $request->publicationYear,
            'stock' => $request->stock,
        ]);
        
        return back()->with('success', 'Tambah Data Berhasil 😃');
    }

    public function show($id)
    {
        return view('book.show', [
            'book' => Book::where('id', $id)->first(),
            'categories' => Category::get(),
        ]);
    }
    public function edit($id)
    {
        return view('book.edit', [
            'book' => Book::where('id', $id)->first(),
            'categories' => Category::get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        // $image = $request->file('image');
        // $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());
        Book::where('id', $id)->update([
            // 'image' => $request->image,
            'title' => $request->title,
            'isbn' => $request->isbn,
            'category_id' => $request->category_id,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publicationYear' => $request->publicationYear,
            'stock' => $request->stock,
        ]);
        // dd($book);
        return redirect('book')->with('success', 'Update Data Berhasil 🤩');

    }
    public function destroy($id)
    {           
        // CloudinaryStorage::delete($book->image);
        Book::where('id', $id)->delete();

        return redirect('book')->with('success', 'Hapus Data Berhasil 😎');
    }
    public function lend(){
        
    }
}
