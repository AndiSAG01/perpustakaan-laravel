<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::insert([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return back()->with('success', 'Tambah Data Sukses 😁');
    }

    public function edit($id)
    {
        return view('category.update', [
            'category' => Category::where('id', $id)->first(),
            'categories' => Category::all()
        ]);
    }

    public function update($id, CategoryRequest $request)
    {
        Category::where('id', $id)->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        return redirect('category')->with('success', 'Update Data Berhasil 🤗');
    }

    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        
        return redirect('category')->with('success', 'Hapus Data Berhasil 😎');
    }
}
