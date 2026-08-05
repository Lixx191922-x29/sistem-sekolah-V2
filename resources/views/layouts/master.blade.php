<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Sekolah' }}</title>
</head>
<body>

    <nav>
        <a href="{{ route('students.index') }}">Siswa</a> |
        <a href="{{ route('classes.index') }}">Kelas</a> |
        <a href="{{ route('majors.index') }}">Jurusan</a> |
        <a href="{{ route('teachers.index') }}">Guru</a>
    </nav>

    <hr>

    @yield('content')

</body>
</html>