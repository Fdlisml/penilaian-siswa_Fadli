@extends('layout.main')
@section('content')
    <center>
        <b>
            <h2>LIST DATA NILAI</h2>

            @if (session('role') == 'guru')
                <a href="/nilai/create" class="btn btn-primary">Tambah Data</a>
            @endif

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
                <tbody class="table-group-divider">
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
                                <td>
                                    <a href="/nilai/edit/{{ $each->id }}" class="btn btn-warning">EDIT</a>
                                    <a href="/nilai/destroy/{{ $each->id }}" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger">HAPUS</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </b>
    </center>
@endsection
