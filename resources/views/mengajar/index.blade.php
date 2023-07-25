@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA MENGAJAR</h2>
            <a href="/mengajar/create" class="btn btn-primary">Tambah Data</a>
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
                        <th>GURU</th>
                        <th>MATA PELAJARAN</th>
                        <th>KELAS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($mengajar as $meng)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $meng->guru->nama_guru }}</td>
                            <td>{{ $meng->mapel->nama_mapel }}</td>
                            <td>{{ $meng->kelas->nama_kelas }}</td>
                            <td>
                                <a href="/mengajar/edit/{{ $meng->id }}" class="btn btn-warning">EDIT</a>
                                <a href="/mengajar/destroy/{{ $meng->id }}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection