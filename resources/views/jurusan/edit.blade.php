@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>EDIT DATA JURUSAN</h2>
        <form action="/jurusan/update/{{ $jurusan->id }}" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">Nama Jurusan</td>
                    <td width="25%"><input type="text" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><button class="btn btn-primary" type="submit">UBAH</button></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection
