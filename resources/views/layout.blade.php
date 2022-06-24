<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Projet</title>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center p-3 text-white bg-dark">
        <div>Projet Heroes</div>
        <div id="errorR" class="fw-bold text-danger"></div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="me-4">
                <a href="{{ url('/heroes') }}" class="text-sm text-white text-decoration-none me-2">heroes</a>
                <a href="{{ url('/genders') }}" class="text-sm text-white text-decoration-none me-2">genders</a>
                <a href="{{ url('/races') }}" class="text-sm text-white text-decoration-none me-2">races</a>
                <a href="{{ url('/skills') }}" class="text-sm text-white text-decoration-none me-2">skills</a>
                <a href="{{ url('/universes') }}" class="text-sm text-white text-decoration-none me-2">universes</a>
            </div>
            @if (Route::has('login'))
                <div class="hidden fixed">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-white text-decoration-none">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white text-decoration-none">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white text-decoration-none">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>
    <div class="container">
         @yield('content')
    </div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            document.getElementById('errorR').append('Vous devez être administrateur pour accéder à la page')
        }
 </script>
</body>
</html>
