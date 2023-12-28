@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA JURUSAN</h2>
        <form action="/jurusan/store" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">NAMA JURUSAN</td>
                    <td width="25%"><input type="text" name="nama_jurusan" id=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><button class="btn btn-primary" type="submit">SIMPAN</button></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection
