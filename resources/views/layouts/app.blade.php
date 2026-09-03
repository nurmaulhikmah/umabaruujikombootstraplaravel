<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMK Negeri 4 Bogor')</title>
    
    <!-- LINK BOOTSTRAP CSS (Pastikan baris ini ada!) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    <!-- LINK BOOTSTRAP JS (Pastikan baris ini ada di bawah sebelum </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>