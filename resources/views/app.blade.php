<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>HTML Layout using Tables</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" style="margin-left: 2vw" href="/home">Laravel examen</a>
        <div class="d-flex flex-row">
        @guest
            <a class="navbar" style="margin-right: 2vw" href="/login">Inloggen</a>
            <a class="navbar" style="margin-right: 2vw" href="/register">Registeren</a>
        @endguest
        @auth

            <form method="POST" action="{{ route('logout') }}" class="flex-row d-flex">
                @csrf
                <a class="navbar" style="margin-right: 2vw" href="{{route('berichten.index')}}">Index</a>
                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Uitloggen') }}
                </x-responsive-nav-link>
            </form>
        @endauth
        </div>
    </nav>

@yield("content")

</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
