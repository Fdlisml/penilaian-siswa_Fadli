@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA KELAS</h2>
            <a href="/kelas/create" class="btn btn-primary">Tambah Data</a>
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
                        <th>KELAS</th>
                        <th>JURUSAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($kelas as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $k->nama_kelas }}</td>
                            <td>{{ $k->nama_jurusan }}</td>
                            <td>
                                <a href="/kelas/edit/{{ $k->id }}" class="btn btn-warning">EDIT</a>
                                <a href="/kelas/destroy/{{ $k->id }}" onclick="return confirm('Yakin Hapus?')"
                                    class="btn btn-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection