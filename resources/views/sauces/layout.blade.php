<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hot Takes</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
{{--            <div></div>--}}
            <a class="navbar-brand" href="{{route("sauces.index")}}">
                <img src="../../../storage/app/public/images/dark-flame-with-shadow-hi.png" alt="Flame icon" height="24">
                HOT TAKES
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{route("register")}}">Sign Up</a>
                    <a class="nav-link" href="{{route("login")}}">Log In</a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @yield('script')
    </body>
</html>

