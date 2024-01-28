@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Guru</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="alert">{{ $error }}</p>
            @endforeach
        @endif

        <form action="/guru/update/{{ $guru->id }}" method="post">
            @csrf
            <label for="nip">Nip</label>
            <input type="text" name="nip" value="{{ $guru->nip }}" id="nip">

            <label for="nama_guru">Nama Guru</label>
            <input type="text" name="nama_guru" value="{{ $guru->nama_guru }}" id="nama_guru">

            <label>Jenis Kelamin</label>
            <input type="radio" name="jk" value="L" @checked($guru->jk == 'L')> Laki-laki
            <input type="radio" name="jk" value="P" @checked($guru->jk == 'P')> Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" rows="5" id="alamat">{{ $guru->alamat }}</textarea>

            <label for="password">Password</label>
            <input type="password" name="password" value="{{ $guru->password }}" id="password">

            <button class="button-submit" type="submit">UBAH</button>
        </form>
    </div>
@endsection
