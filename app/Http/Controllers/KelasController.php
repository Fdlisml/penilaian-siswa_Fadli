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
        $tingkat_kelas = ['10', '11', '12', '13'];
        return view('kelas.create', [
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan
        ]);
    }

    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required']
        ]);

        $kelas = Kelas::firstOrNew($data_kelas);

        if ($kelas->exists) {
            return back()->with('error', 'Data Kelas Yang Dimasukkan Sudah Ada');
        } else {
            $kelas->save();
            return redirect('/kelas/index')->with('success', 'Data Kelas Berhasil Ditambah');
        }
    }

    public function edit(Kelas $kelas)
    {
        $jurusan = ['DKV', 'BKP', 'DPIB', 'RPL', 'SIJA', 'TKJ', 'TP', 'TOI', 'TKR', 'TFLM'];
        $tingkat_kelas = ['10', '11', '12', '13'];
        return view('kelas.edit', [
            'kelas' => $kelas,
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required']
        ]);

        if ($request->kelas != $kelas->kelas || $request->jurusan != $kelas->jurusan || $request->rombel != $kelas->rombel) {
            $cek_kelas = Kelas::where('kelas', $request->kelas)->where('jurusan', $request->jurusan)->where('rombel', $request->rombel)->first();

            if ($cek_kelas) {
                return back()->with('error', 'Data Kelas Yang Dimasukkan Sudah Ada');
            }
        }
        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', 'Data Kelas Berhasil Diubah');
    }

    public function destroy(Kelas $kelas)
    {
        $siswa = Siswa::where('kelas_id', $kelas->id)->first();
        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();

        $kelas_dipakai = "$kelas->kelas $kelas->jurusan $kelas->rombel";

        if ($siswa) {
            return back()->with('error', "$kelas_dipakai Masih Digunakan di Menu Siswa");
        }

        if ($mengajar) {
            return back()->with('error', "$kelas_dipakai Masih Digunakan di Menu Mengajar");
        }

        $kelas->delete();

        return back()->with('success', "Data Kelas Berhasil Dihapus");
    }
}
