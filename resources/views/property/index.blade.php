@extends('base')

@section('title', 'Nos hotels')

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-2">
        <input type="number" placeholder="Prix minimum" name="price" class="form-control" value="{{ $input['price'] ?? '' }}">
    </form>

<div class="container">
    
    <div class="row">
        @foreach($properties as $property)
        <div class="col-3 mb-4">
            @include('property.card')
        </div>
        @endforeach
    </div>
    <div class="my-4">
    {{ $properties->links() }}
</div> 
</div>


@endsection