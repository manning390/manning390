<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">

        <title>@yield('title', config('blog.title') . ' | ' . config('blog.location'))</title>
    </head>
    <body class="fade-in">
        @include('partial._nav')

        <main class="main">
            @yield('content')
        </main>

        @include('partial._footer')
        <a class="elevator" href="#header">
            @svg('chevron-top', 'accent')
        </a>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ mix('/js/app.js') }}" type="text/javascript" charset="utf-8"></script>

        @stack('scripts')
    </body>
</html>