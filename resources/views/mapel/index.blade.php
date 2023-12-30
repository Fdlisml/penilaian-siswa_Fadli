@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA MAPEL</h2>
            <a href="/mapel/create" class="button-primary">TAMBAH DATA</a>
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
                        <th>MATA PELAJARAN</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mapel as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->nama_mapel }}</td>
                            <td style="text-align: center">
                                <a href="/mapel/edit/{{ $m->id }}" class="button-warning">EDIT</a>
                                <a href="/mapel/destroy/{{ $m->id }}" onclick="return confirm('Yakin Hapus?')" class="button-danger">HAPUS</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
