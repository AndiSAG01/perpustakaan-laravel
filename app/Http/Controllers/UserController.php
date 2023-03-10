<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $student = User::where('status', 0)->get();
        $teacher = User::where('status', 1)->get();

        return view('user.index', [
            'student' => $student,
            'teacher' => $teacher,
        ]);
    }

    public function store(UserRequest $request)
    {
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $result = cloudinary()->upload($photo->getRealPath(), ['folder' => 'user']);
            $url = $result->getSecurePath();
            $publicId = $result->getPublicId();
            User::create([
                'noId'=> $request->noId,
                'name'=> $request->name,
                'photo'=> $url,
                'publicId' => $publicId,
                'password'=> bcrypt('password'),
                'email_verified_at'=> now(),
                'remember_token' => rand(),
                'email'=> $request->email,
                'status' => $request->status,
                'birthday' => $request->birthday,
                'isAdmin' => false,
                'gender' => $request->gender,
                'address' => $request->address,
                'telp' => $request->telp,
            ]);

        }else{
            User::create([
                'noId'=> $request->noId,
                'name'=> $request->name,
                'email_verified_at'=> now(),
                'remember_token' => rand(),
                'password'=> bcrypt('password'),
                'email'=> $request->email,
                'status' => $request->status,
                'birthday' => $request->birthday,
                'isAdmin' => false,
                'gender' => $request->gender,
                'address' => $request->address,
                'telp' => $request->telp,
            ]);
        }

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

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('image')) {            
            $image = $request->file('image');
            $result = cloudinary()->upload($image->getRealPath(), ['folder' => 'user']);
            $url = $result->getSecurePath();
            $publicId = $result->getPublicId();

            $user->image = $url;
            $user->publicId = $publicId;
            if($request->publicId == true){
                Cloudinary()->destroy($request->publicId);
            }
        }
        $user->noId = $request->noId;
        $user->name = $request->name;
        $user->password = bcrypt('password');
        $user->email_verified_at = now();
        $user->remember_token = rand();
        $user->email = $request->email;
        $user->status = $request->status;
        $user->birthday = $request->birthday;
        $user->isAdmin = false;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->telp = $request->telp;
        $user->save();

        return redirect('user')->with('success', 'Update Data Berhasil 🤩');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('user')->with('success', 'Hapus Data Berhasil 🤐');
    }
    
}
