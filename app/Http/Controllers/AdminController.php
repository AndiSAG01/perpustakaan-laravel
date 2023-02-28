<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     // anggota dan guru
     public function index()
     {
        return view('admin.index', [
            'users' => User::whereStatus(2)->orderby('updated_at', 'desc')->get()
        ]);
     }
 
     public function print($id){
         return view('admin.idcard', [
             'user' => user::whereId($id)
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
                'status' => 2,
                'birthday' => $request->birthday,
                'isAdmin' => true,
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
                'status' => 2,
                'birthday' => $request->birthday,
                'isAdmin' => true,
                'gender' => $request->gender,
                'address' => $request->address,
                'telp' => $request->telp,
            ]);
        }
        

        return redirect('admin')->with('success', 'Tambah Data Sukses 😙');
    }

    public function show($id)
    {
        return view('admin.show',
        [
            'user' => User::where('id', $id)->first()
        ]);
    }

    public function edit($id)
    {
        return view('admin.edit',
        [
            'user' => User::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $result = cloudinary()->upload($photo->getRealPath(), ['folder' => 'user']);
            $url = $result->getSecurePath();
            $publicId = $result->getPublicId();

            if($request->publicId == true){
                Cloudinary()->destroy($request->publicId);
            }
            $user = User::find($id);
            $user->noId =  $request->noId;
            $user->name =  $request->name;
            $user->photo =  $url;
            $user->publicId  =  $publicId;
            $user->password =  bcrypt('password');
            $user->email_verified_at =  now();
            $user->remember_token  =  rand();
            $user->email =  $request->email;
            $user->status  =  2;
            $user->birthday  =  $request->birthday;
            $user->isAdmin  =  true;
            $user->gender  =  $request->gender;
            $user->address  =  $request->address;
            $user->telp  =  $request->telp;
            $user->save();
            

        }else{
            $user = User::find($id);
            $user->noId =  $request->noId;
            $user->name =  $request->name;
            // $user->photo =  $url;
            // $user->publicId  =  $publicId;
            $user->password =  bcrypt('password');
            $user->email_verified_at =  now();
            $user->remember_token  =  rand();
            $user->email =  $request->email;
            $user->status  =  2;
            $user->birthday  =  $request->birthday;
            $user->isAdmin  =  true;
            $user->gender  =  $request->gender;
            $user->address  =  $request->address;
            $user->telp  =  $request->telp;
            $user->save();
            
        }

        return redirect('admin')->with('success', 'Update Data Berhasil 🤩');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect('admin')->with('success', 'Hapus Data Berhasil 🤐');
    }
    
}
