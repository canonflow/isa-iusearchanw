<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ISA</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <a class="btn btn-primary" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <p>
        {{ auth()->user()->username }}
    </p>
</body>
</html>
