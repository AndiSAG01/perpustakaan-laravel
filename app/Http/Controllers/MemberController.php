<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('member.index');
    }

    public function profile(User $user)
    {
        return view('member.profile', [
            'user' => user::where('noId', $user)->first()
        ]);
    }
}
