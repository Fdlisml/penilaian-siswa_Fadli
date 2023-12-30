@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA SISWA</h2>
            <a href="/siswa/create" class="btn btn-primary">Tambah Data</a>
            @if (session('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
            <table class="table table-primary table-striped table-hover align-middle table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>NO</th>
                        <th>NIS</th>
                        <th>NAMA SISWA</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>KELAS</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($siswa as $s)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $s->nis }}</td>
                            <td>{{ $s->nama_siswa }}</td>
                            <td>{{ $s->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $s->alamat }}</td>
                            <td>{{ $s->kelas->nama_kelas }} {{ $s->kelas->nama_jurusan }} {{ $s->kelas->rombel }}</td>
                            <td>{{ $s->password }}</td>
                            <td>
                                <a href="/siswa/edit/{{ $s->id }}" class="btn btn-warning">EDIT</a>
                                <a href="/siswa/destroy/{{ $s->id }}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
