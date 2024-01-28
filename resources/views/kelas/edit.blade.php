@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Kelas</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                @foreach ($tingkat_kelas as $k)
                    <option value="{{ $k }}" @selected($kelas->kelas == $k)>
                        {{ $k }}
                    </option>
                @endforeach
            </select>

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}" @selected($kelas->jurusan == $j)>
                        {{ $j }}
                    </option>
                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" max="3" min="1" value="{{ $kelas->rombel }}" id="rombel">
            <button class="button-submit" type="submit">Ubah</button>
        </form>
    </div>
@endsection
