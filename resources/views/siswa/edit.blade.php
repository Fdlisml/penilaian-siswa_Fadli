@extends('layout.main')
@section('content')
    <center>
        <br>
        <h2>EDIT DATA SISWA</h2>
        <form action="/siswa/update/{{ $siswa->id }}" method="post">
            @csrf
            <table class="table-data" width="50%">
                <tr>
                    <td width="25%">NIS</td>
                    <td width="25%"><input type="text" class="" name="nis" value="{{ $siswa->nis }}"></td>
                </tr>
                <tr>
                    <td width="25%">NAMA SISWA</td>
                    <td width="25%"><input type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}"></td>
                </tr>
                <tr>
                    <td width="25%">JENIS KELAMIN</td>
                    <td width="25%">
                        <input type="radio" name="jk" value="L" {{ $siswa->jk =='L' ? 'checked' : '' }}>Laki-laki
                        <input type="radio" name="jk" value="P" {{ $siswa->jk =='P' ? 'checked' : '' }}>Perempuan
                    </td>
                </tr>
                <tr>
                    <td width="25%">ALAMAT</td>
                    <td width="25%"><textarea name="alamat" id="" cols="30" rows="5">{{ $siswa->alamat }}</textarea></td>
                </tr>
                <tr>
                    <td width="25%">KELAS</td>
                    <td width="25%">
                        <select name="kelas_id" id="">
                            <option></option>
                            @foreach ($kelas as $k)
                                @if ($siswa->kelas_id == $k->id)
                                    <option value="{{ $k->id }}" selected>{{ $k->nama_kelas }} {{ $k->nama_jurusan }} {{ $k->rombel }}</option>
                                @else
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }} {{ $k->nama_jurusan }} {{ $k->rombel }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td width="25%">PASSWORD</td>
                    <td width="25%"><input type="password" name="password" value="{{ $siswa->password }}"></td>
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
