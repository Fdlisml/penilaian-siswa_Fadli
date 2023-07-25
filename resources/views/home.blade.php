@extends('layout.main')

@section('content')
    {{-- <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head> --}}

    {{-- @include('partials.carousel') --}}

    {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block carousel-control-transition:opacity 0.15s ease;"
                    style="transition: opacity 1100ms ease 6100ms;"
                    src="https://smkn1cibinong.sch.id/main/wp-content/uploads/2022/11/cropped-up-scaled-1.jpg" width="100%"
                    height="850px" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block" style="transition: opacity 1100ms ease 6100ms;"
                    src="https://smkn1cibinong.sch.id/main/wp-content/uploads/2022/08/hut-ri.jpeg" width="100%"
                    height="850px" alt="First slide">
            </div>
        </div>
    </div> --}}

    <center>
        <h1>Selamat Datang {{ session('role') }},
            @if (session('role') == 'guru')
                {{ session('nama_guru') }}
            @elseif (session('role') == 'siswa')
                {{ session('nama_siswa') }}
            @else
                {{ session('id_admin') }}
            @endif
        </h1>
    </center>
@endsection
