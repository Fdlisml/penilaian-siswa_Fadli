<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mengajar;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.index', [
            'guru' => Guru::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        try {
            $data_guru = $request->validate([
                'nip' => ['required', 'numeric'],
                'nama_guru' => ['required'],
                'jk' => ['required'],
                'alamat' => ['required'],
                'password' => ['required']
            ]);
            Guru::create($data_guru);
            return redirect('/guru/index')->with('success', 'Data Guru Berhasil di Tambah');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) { // Kode error untuk pelanggaran keterunikannya
                return redirect('/guru/index')->with('error', 'Nip yang dimasukkan sudah ada');
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', [
            'guru' => $guru
        ]);
    }

    public function update(Request $request, Guru $guru)
    {
        try {
            $data_guru = $request->validate([
                'nip' => ['required', 'numeric'],
                'nama_guru' => ['required'],
                'jk' => ['required'],
                'alamat' => ['required'],
                'password' => ['required']
            ]);
            $guru->update($data_guru);
            return redirect('/guru/index')->with('success', 'Data Guru Berhasil di Ubah');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) { // Kode error untuk pelanggaran keterunikannya
                return redirect('/guru/index')->with('error', 'Nip yang dimasukkan sudah ada');
            }
        }
    }

    public function destroy(Guru $guru)
    {
        $mengajar = Mengajar::where('guru_id', $guru->id)->first();

        if ($mengajar) {
            return back()->with('error', "$guru->nama_guru masih digunakan di menu mengajar");
        }

        $guru->delete();

        return back()->with('success', "Data Guru Berhasil di Hapus");
    }
}
