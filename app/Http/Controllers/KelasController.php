<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Mengajar;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }

    public function create()
    {
        $jurusan = ['DKV', 'BKP', 'DPIB', 'RPL', 'SIJA', 'TKJ', 'TP', 'TOI', 'TKR', 'TFLM'];
        return view('kelas.create', [
            'jurusan' => $jurusan
        ]);
    }

    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'nama_kelas' => ['required'],
            'nama_jurusan' => ['required'],
            'rombel' => ['required']
        ]);

        $kelas = Kelas::firstOrNew($data_kelas);

        if ($kelas->exists) {
            return back()->with('error', 'Data Kelas Yang Dimasukkan Sudah Ada');
        } else {
            $kelas->save();
            return redirect('/kelas/index')->with('success', 'Data Kelas Berhasil di Tambah');
        }
    }

    public function edit(Kelas $kelas)
    {
        $jurusan = ['DKV', 'BKP', 'DPIB', 'RPL', 'SIJA', 'TKJ', 'TP', 'TOI', 'TKR', 'TFLM'];
        return view('kelas.edit', [
            'kelas' => $kelas,
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $data_kelas = $request->validate([
            'nama_kelas' => ['required'],
            'nama_jurusan' => ['required'],
            'rombel' => ['required']
        ]);

        if ($request->nama_kelas != $kelas->nama_kelas || $request->nama_jurusan != $kelas->nama_jurusan || $request->rombel != $kelas->rombel) {
            $cek_kelas = Kelas::where('nama_kelas', $request->nama_kelas)->where('nama_jurusan', $request->nama_jurusan)->where('rombel', $request->rombel)->first();

            if ($cek_kelas) {
                return back()->with('error', 'Data Kelas yang dimasukkan sudah ada');
            }
        } else {
            $kelas->update($data_kelas);
            return redirect('/kelas/index')->with('success', 'Data Kelas Berhasil di Ubah');
        }
    }

    public function destroy(Kelas $kelas)
    {
        $siswa = Siswa::where('kelas_id', $kelas->id)->first();
        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();

        $kelas_dipakai = "$kelas->nama_kelas $kelas->nama_jurusan $kelas->rombel";

        if ($siswa) {
            return back()->with('error', "$kelas_dipakai masih digunakan di menu Siswa");
        }

        if ($mengajar) {
            return back()->with('error', "$kelas_dipakai masih digunakan di menu Mengajar");
        }

        $kelas->delete();

        return back()->with('success', "Data Kelas Berhasil Di Hapus");
    }
}
