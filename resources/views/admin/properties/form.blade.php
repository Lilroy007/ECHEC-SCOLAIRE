@extends('admin.admin')

@section('title', $property ->exists ? 'Modifier un hotel' : 'Ajouter un hotel')

@section('content')

<h1>
    @yield('title') 
</h1>

<form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}" method="post">

@csrf
@method($property->exists ? 'PUT' : 'POST')

<div class="row">
  @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
    
    <div class="col row">
        
        @include('shared.input', ['class' =>'col', 'name' => 'price', 'label' => 'Prix', 'value' => $property->price])
    </div>
</div>

@include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])

<div class="row">
@include('shared.input', ['class' =>'col', 'name' => 'ville', 'value' => $property->city])
@include('shared.input', ['class' =>'col', 'name' => 'adress', 'label' => 'Adresse', 'value' => $property->adress])
@include('shared.input', ['class' =>'col', 'name' => 'postal_code', 'label' => 'Code postal', 'value' => $property->postal_code])
</div>
@include('shared.select', ['name' => 'options', 'label' => 'Options', 'value' => $property->options()->pluck('id'), 'multiple' => true])
@include('shared.checkbox', ['name' => 'available', 'label' => 'Disponible', 'value' => $property->available, 'options' => $options])

<div>
    <button class="btn btn-primary">
        @if($property->exists)
        Modifier
        @else
        Ajouter
        @endif
    </button>
</div>
</form>
@endsection