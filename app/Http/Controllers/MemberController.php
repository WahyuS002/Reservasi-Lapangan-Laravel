<?php

namespace App\Http\Controllers;

use App\Models\member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function create(Request $request){
        $user = User::all();
        $nama_user = $request->get('name');
        return view('user.member.create', compact('user', 'nama_user'));
    }

    public function store(Request $request)
    {
        // Validasi data member
        $memberData = [
            'nama' => 'required',
            'JK' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'durasi' => 'required',
            'total_biaya' => 'required',
        ];
        
        // Validasi data member
        $validatedData = $request->validate($memberData);

        // Menyimpan data member ke dalam database
        member::create($validatedData + [
            'user_id' => auth()->id(),
            'status' => $request->filled('status') ? $request->input('status') : "Menunggu Verifikasi"
        ]);

        return redirect('/member');
    }
}