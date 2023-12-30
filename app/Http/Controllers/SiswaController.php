<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('siswa.index', [
            'siswa' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data_siswa = $request->validate([
                'nis' => ['required', 'numeric'],
                'nama_siswa' => ['required'],
                'jk' => ['required'],
                'alamat' => ['required'],
                'kelas_id' => ['required'],
                'password' => ['required']
            ]);
            Siswa::create($data_siswa);
            return redirect('/siswa/index')->with('success', "Data Siswa Berhasil di Tambah");
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) { // Kode error untuk pelanggaran keterunikannya
                return redirect('/siswa/index')->with('error', 'Nis yang dimasukkan sudah ada');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', [
            'siswa' => $siswa,
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        try {
            $data_siswa = $request->validate([
                'nis' => ['required', 'numeric'],
                'nama_siswa' => ['required'],
                'jk' => ['required'],
                'alamat' => ['required'],
                'kelas_id' => ['required'],
                'password' => ['required']
            ]);
            $siswa->update($data_siswa);
            return redirect('/siswa/index')->with('success', "Data Siswa Berhasil di Ubah");
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) { // Kode error untuk pelanggaran keterunikannya
                return redirect('/siswa/index')->with('error', 'Nis yang dimasukkan sudah ada');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $nilai = Nilai::where('siswa_id', $siswa->id)->first();

        if ($nilai) {
            return back()->with('error', "$siswa->nama_siswa masih digunakan di menu Nilai");
        }

        $siswa->delete();
        return back()->with('success', "Data Siswa Berhasil di Hapus");
    }
}
