<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szivacs napló</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('students.index') }}">Diákok</a></li>
                <li><a href="{{ route('grades.index') }}">Jegyek</a></li>
                <li><a href="{{ route('school_classes.index') }}">Osztályok</a></li>
                <li><a href="{{ route('subjects.index') }}">Tantárgyak</a></li>
                @if(auth()->check())
                <li>
                    <form class="logout" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit">Kijelentkezés ({{ auth()->user()->name }})</button>
                    </form>
                </li>
                @else
                <li><a href="{{ route('login') }}">Login</a></li>
                @endif

            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Demény Máté</p>
    </footer>

</body>

</html>