<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-udH3oZaPc8O8v25Dd55CZ5u0JPAkW5EnM/YhqO3O0ZB4hdBkD2BcxezDMtu1MYSw" crossorigin="anonymous">
    
    <title>@yield('title') | Hotels Antonio</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Hotel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
    @php
$route = request() ->route() ->getName();
    @endphp
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{ route('property.index') }}" class="nav-link {{ str_contains($route, 'property.') ? 'active' : '' }}">les Hotels</a>
            </li>
        </ul>
    </div>
    </div>
</nav>
      
    
    @yield('content')
   
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>