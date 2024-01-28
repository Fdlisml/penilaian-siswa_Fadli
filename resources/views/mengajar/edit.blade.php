@extends('layout.main')
@section('content')
    <div class="container-form">
        <h2 align="center">Edit Data Mengajar</h2>

        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/mengajar/update/{{ $mengajar->id }}" method="post">
            @csrf
            <label for="guru_id">Guru</label>
            <select name="guru_id" id="guru_id">
                @foreach ($guru as $g)
                    <option value="{{ $g->id }}" @if ($mengajar->guru_id == $g->id) selected @endif>
                        {{ $g->nama_guru }}
                    </option>
                @endforeach
            </select>

            <label for="mapel_id">Mata Pelajaran</label>
            <select name="mapel_id" id="mapel_id">
                @foreach ($mapel as $m)
                    <option value="{{ $m->id }}" @if ($mengajar->mapel_id == $m->id) selected @endif>
                        {{ $m->nama_mapel }}
                    </option>
                @endforeach
            </select>

            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" @if ($mengajar->kelas_id == $k->id) selected @endif>
                        {{ $k->kelas }} {{ $k->jurusan }} {{ $k->rombel }}
                    </option>
                @endforeach
            </select>

            <button class="button-submit" type="submit">Ubah</button>
        </form>
    </div>
@endsection
