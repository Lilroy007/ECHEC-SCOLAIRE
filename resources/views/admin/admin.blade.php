<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-udH3oZaPc8O8v25Dd55CZ5u0JPAkW5EnM/YhqO3O0ZB4hdBkD2BcxezDMtu1MYSw" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <title>@yield('title') | Administration</title>
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
                <a href="{{ route('admin.property.index') }}" class="nav-link {{ str_contains($route, 'property.') ? 'active' : '' }}">Gérer les Hotels</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.option.index') }}" class="nav-link {{ str_contains($route, 'option.') ? 'active' : '' }}">Gérer les options</a>
            </li>
        </ul>
    </div>
    </div>
</nav>

    <div class="container mt-5">
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="my-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
        @endif
    
    @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]', {plugins: {remove_button: {title: 'Supprimer'}}})
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>