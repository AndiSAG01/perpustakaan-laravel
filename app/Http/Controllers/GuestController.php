<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use App\Models\Guest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index', [
            'user' => User::all(),
            'guest' => Guest::all(),
        ]);
    }

    public function store(GuestRequest $request)
    {
        Guest::create([
            'name' => $request->name,
            'from' => $request->from,
            'description' => $request->description,
            'date' => Carbon::now()->setTimezone('Asia/Jakarta')->format('l, d F Y, h:i:s A', 'Asia/Indonesia'),
        ]);

        return back()->with('success', 'Input data pengunjung berhasil, silahkan masuk!!🤗');
    }

    public function idcard()
    {
        return view('guest.search',[
            'user' => User::all(),
            'guest' => Guest::all(),
        ]);
    }

    public function search(Request $request)
    {
        return view('guest.result', [
            'user' => User::where('name', request('search'))->orWhere('noId', request('search'))->first()
        ]); 
    }
}
