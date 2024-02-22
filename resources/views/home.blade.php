@extends('base')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <div class="container">
    <h1 class="display-4">Bienvenue sur notre site</h1>
    <p class="lead">Vous pouvez consulter nos hotels et nos options</p>
</div>
</div>

<div class="container">
    <h2>Nos derniers hotels</h2>
    <div class="row">
        @foreach($properties as $property)
        <div class="col">
        @include('property.card')
        </div>
        @endforeach
    </div>
</div>

@endsection