@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA GURU</h2>
            <a href="/guru/create" class="button-primary">TAMBAH DATA</a>
            @if (session('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            @if (session('error'))
                <p class="text-danger">{{ session('error') }}</p>
            @endif
            <table class="table-data">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIP</th>
                        <th>NAMA GURU</th>
                        <th>JENIS KELAMIN</th>
                        <th>ALAMAT</th>
                        <th>PASSWORD</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $g)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $g->nip }}</td>
                            <td>{{ $g->nama_guru }}</td>
                            <td>{{ $g->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            <td>{{ $g->alamat }}</td>
                            <td>{{ $g->password }}</td>
                            <td style="text-align: center">
                                <a href="/guru/edit/{{ $g->id }}" class="button-warning">EDIT</a>
                                <a href="/guru/destroy/{{ $g->id }}" onclick="return confirm('Yakin Hapus?')"
                                    class="button-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
