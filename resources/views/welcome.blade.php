<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Facebouk</title>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

        <style>

            html, body { background-color: #fff; color: #636b6f; font-family: 'Montserrat', sans-serif; font-weight: 200; height: 100vh; margin: 0; width: 100%; background: url(../img/bg.jpg)no-repeat; background-position: center; background: cover; background-size: 100%; color: white; }

            .full-height { height: 100vh; }

            .flex-center { align-items: center; display: flex; justify-content: center; }

            .position-ref { position: relative; }

            .top-right { position: absolute; right: 10px; top: 18px; }

            .content { text-align: center; }

            .title { font-size: 124px; }

            .links > a { color: #636b6f; padding: 0 25px; font-size: 13px; letter-spacing: .1rem; text-decoration: none; text-transform: uppercase; }

            .text-left { text-align: left!important; }

        </style>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color:white;">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color:white;">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color:white;">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title">
                    Facebouk
                </div>
                <h3 class="text-left">Discover the new social network</h3>
                <p class="text-left">Try it for free and share all your life and<br> give us your personal data for business purposes.</p>
            </div>
        </div>
    </body>
</html>
