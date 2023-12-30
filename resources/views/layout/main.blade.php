<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penilaian Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="header">
        <img src="{{ asset('img/header.jpg') }}" height="40%" width="100%" alt="">
    </div>

    <div class="menu">
        <a href="/home">HOME</a>
        @if (session('role') == 'admin')
            <a href="/guru/index">GURU</a>
            <a href="/kelas/index">KELAS</a>
            <a href="/siswa/index">SISWA</a>
            <a href="/mapel/index">MAPEL</a>
            <a href="/mengajar/index">MENGAJAR</a>
        @else
            <a href="/nilai/index">NILAI</a>
        @endif
        <a href="/logout">LOGOUT</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <div class="footer">
        <center>
            <p>
                &copy; {{ date('Y') }} - LSP & UJIKOM
            </p>
        </center>
    </div>
</body>

</html>
