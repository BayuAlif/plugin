<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Models\Aspirasi;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('home.login');
    }

    public function home()
    {
        $kategori = Kategori::all();


        return view('home.home', ['kategori' => $kategori]);
    }
    public function login(Request $request)
    {

 
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (auth()->guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        } else {
            return back()->withErrors([
                'message' => 'Username or password is incorrect.',
            ]);
        }
    }




    public function sendForm(Request $request)
    {

        $validatedData = $request->validate([
            'nis' => 'required|exists:siswa,nis',
            'id_kategori' => 'required|exists:kategori,id',
            'lokasi' => 'required|string',
            'foto' => 'required|image|max:2048', 
            'ket' => 'required|string',
        ]);


        $photopath = $request->file('foto')->store('public/img');
        $photoFileName = basename($photopath);


        $inputAspirasi = InputAspirasi::create([
            'nis' => $validatedData['nis'],
            'id_kategori' => $validatedData['id_kategori'],
            'lokasi' => $validatedData['lokasi'],
            'foto' => $photoFileName,
            'ket' => $validatedData['ket'],
        ]);

        $aspirasi = Aspirasi::create([
            'id_inputAspirasi' => $inputAspirasi->id,
        ]);

        // entah kenapa gak work
        // $aspirasi = new Aspirasi();
        // // dd($aspirasi);
        // $inputAspirasi->aspirasi()->save($aspirasi);


        return redirect()->back()->with('success', 'Laporan aspirasi berhasil disimpan.');
    }


    public function gallery(){
        $data = InputAspirasi::with(['siswa', 'aspirasi', 'kategori'])->get();

        return view('home.gallery', compact('data'));
        
    }
}
