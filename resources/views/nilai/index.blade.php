@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA NILAI</h2>

            @if (session('role') == 'guru')
                <a href="/nilai/create" class="button-primary">TAMBAH DATA</a>
            @endif

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
                        <th>GURU MAPEL</th>
                        <th>NAMA SISWA</th>
                        <th>UH</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>NA</th>
                        @if (session('role') == 'guru')
                            <th>ACTION</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nilai as $each)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $each->mengajar->guru->nama_guru }}</td>
                            <td>{{ $each->siswa->nama_siswa }}</td>
                            <td>{{ $each->uh }}</td>
                            <td>{{ $each->uts }}</td>
                            <td>{{ $each->uas }}</td>
                            <td>{{ $each->na }}</td>
                            @if (session('role') == 'guru')
                                <td style="text-align: center">
                                    <a href="/nilai/edit/{{ $each->id }}" class="button-warning">EDIT</a>
                                    <a href="/nilai/destroy/{{ $each->id }}" onclick="return confirm('Yakin Hapus?')" class="button-danger">HAPUS</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
