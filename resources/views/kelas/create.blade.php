@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Tambah Data Kelas</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/store" method="post">
            @csrf
            <label for="nama_kelas">Kelas</label>
            <input type="text" name="nama_kelas" id="nama_kelas"></td>

            <label>Jurusan</label>
            <select name="nama_jurusan">
                <option></option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}">{{ $j }}</option>
                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" max="3" min="1" id="rombel">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection
