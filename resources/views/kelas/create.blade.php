@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA KELAS</h2>
        <form action="/kelas/store" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%"><input type="text" name="nama_kelas" id=""></td>
                </tr>
                <tr>
                    <td width="25%">JURUSAN</td>
                    <td width="25%">
                        <select name="nama_jurusan">
                            <option></option>
                            @foreach ($jurusan as $j)
                                <option value="{{ $j }}">{{ $j }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">ROMBEL</td>
                    <td width="25%"><input type="number" name="rombel" max="3" min="1" id=""></td>
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
