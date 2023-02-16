<?php

namespace App\Http\Controllers;

use App\Http\Requests\LetterRequest;
use App\Models\Letter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function index(){
        return view('letter.index', [
            'letters' => Letter::orderby('updated_at', 'desc')->get(),
            'users' => User::get()
        ]);
    }

    public function store(LetterRequest $request)
    {
        $tes = Letter::create([
            'user_id' => $request->user_id,
            'class' => $request->class,
            'leaderName' => $request->leaderName,
            'position' => $request->position,
            'noId' => $request->noId,
            'date' => Carbon::now()->setTimezone('Asia/Jakarta')->format('l, d F Y', 'Asia/Indonesia'),

        ]);

        return redirect('letter')->with('success', 'Tambah Data Berhasil 😎');
    }

    public function print($id)
    {
        return view('letter.print', [
            'user' => letter::where('id', $id)->first()
        ]);
    }

    public function destroy($id)
    {
        Letter::where('id', $id)->delete();

        return redirect('letter')->with('success', 'Hapus data sukses 🤤');
    }
}
