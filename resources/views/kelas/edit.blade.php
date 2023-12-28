@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>EDIT DATA KELAS</h2>
        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%"><input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" id=""></td>
                </tr>
                <tr>
                    <td width="25%">JURUSAN</td>
                    <td width="25%">
                        <select name="jurusan_id">
                            <option></option>
                            @foreach ($jurusan as $j)
                                @if ($kelas->jurusan_id == $j->id)
                                    <option value="{{ $j->id }}" selected>{{ $j->nama_jurusan }}</option>
                                @else
                                    <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
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
