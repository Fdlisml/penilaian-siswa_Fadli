@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Kelas</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
        
        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <tr>
                <label for="nama_kelas">Kelas</label>
                <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}" id="nama_kelas">

                <label>Jurusan</label>
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

                <label for="rombel">Rombel</label>
                <input type="number" name="rombel" max="3" min="1" value="{{ $kelas->rombel }}" id="rombel">
                <button class="button-submit" type="submit">Ubah</button>
        </form>
    </div>
@endsection
