<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        return view('home');
    }

    public function loginAdmin(Request $request)
    {
        $administratior = Administrator::where('kode_admin', $request->kode_admin)->first();

        if (!$administratior) {
            return back();
        }

        if ($administratior->password != $request->password) {
            return back();
        }

        session([
            'role' => 'admin',
            'id_admin' => $administratior->id_admin
        ]);

        return redirect('/home');
    }

    public function loginGuru(Request $request)
    {
        $guru = Guru::where('nip', $request->nip)->first();

        if (!$guru) {
            return back();
        }

        if ($guru->password != $request->password) {
            return back();
        }

        session([
            'role' => 'guru',
            'nama_guru' => $guru->nama_guru,
            'id' => $guru->id
        ]);

        return redirect('/home');
    }

    public function loginSiswa(Request $request)
    {
        $siswa = Siswa::where('nis', $request->nis)->first();

        if (!$siswa) {
            return back();
        }

        if ($siswa->password != $request->password) {
            return back();
        }

        session([
            'role' => 'siswa',
            'nama_siswa' => $siswa->nama_siswa,
            'id' => $siswa->id
        ]);

        return redirect('/home');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        return redirect('/');
    }
}
