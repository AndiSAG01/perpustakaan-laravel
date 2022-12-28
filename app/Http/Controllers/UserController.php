<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'users' => User::get()
        ]);
    }

    public function store(UserRequest $request)
    {
        User::create([
            'noId'=> $request->noId,
            'name'=> $request->name,
            'password'=> bcrypt('password'),
            'email'=> $request->email,
            'birthday' => $request->birthday,
            'isAdmin' => $request->isAdmin,
            'gender' => $request->gender,
            'address' => $request->address,
            'telp' => $request->telp,
        ]);

        return redirect('user')->with('success', 'Tambah Data Sukses 😙');
    }

    public function show($id)
    {
        return view('user.show',
        [
            'user' => User::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('user.edit',
        [
            'user' => User::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'noId'=> $request->noId,
            'name'=> $request->name,
            'email'=> $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'address' => $request->address,
            'telp' => $request->telp,
            'isAdmin' => $request->isAdmin,

        ]);

        return redirect('user')->with('success', 'Update Data Berhasil 🤩');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('user')->with('success', 'Hapus Data Berhasil 🤐');
    }

    public function import() 
    {
        Excel::import(new UsersImport, request()->file('file'));
        
        return redirect('user')->with('success', 'Import User Success!');
    }
}
