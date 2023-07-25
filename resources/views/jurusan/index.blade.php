@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA JURUSAN</h2>
            <a href="/jurusan/create" class="btn btn-primary">Tambah Data</a>
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
                        <th>NAMA JURUSAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($jurusan as $j)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $j->nama_jurusan }}</td>
                            <td>
                                <a href="/jurusan/edit/{{ $j->id }}" class="btn btn-warning">EDIT</a>
                                <a href="/jurusan/destroy/{{ $j->id }}" onclick="return confirm('Yakin Hapus?')"
                                    class="btn btn-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection