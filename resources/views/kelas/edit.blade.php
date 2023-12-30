@extends('layout.main')
@section('content')
    <center>
        <h2>EDIT DATA KELAS</h2>
        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <table width="50%">
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%"><input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" id=""></td>
                </tr>
                <tr>
                    <td width="25%">JURUSAN</td>
                    <td width="25%">
                        <select name="nama_jurusan">
                            <option></option>
                            @foreach ($jurusan as $j)
                                @if ($kelas->nama_jurusan == $j)
                                    <option value="{{ $j }}" selected>{{ $j }}</option>
                                @else
                                    <option value="{{ $j }}">{{ $j }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">ROMBEL</td>
                    <td width="25%"><input type="number" name="rombel" max="3" min="1" value="{{ $kelas->rombel }}" id=""></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><button class="button-primary" type="submit">UBAH</button></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
@endsection
