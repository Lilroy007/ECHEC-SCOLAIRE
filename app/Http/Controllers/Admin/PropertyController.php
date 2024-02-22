<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property; 

class PropertyController extends Controller
{
    public function index()
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    public function create()
    {
        $property = new Property();
        $property->fill([
            'city' => 'ANGERS',
            'postal_code' => '49100',
            'available' => true,
        ]);
        
        return view('admin.properties.form', [
            'property' => $property, 
            'options' => Option::pluck('name', 'id'),
    ]);
    }

    public function store(PropertyFormRequest $request)
    {
       $property = Property::create($request->validated());
       $property->options()->sync($request->validated('options'));
       return to_route('admin.property.index')->with('success', 'Hotel ajouté avec succès');
    }

    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }
   

    public function update(PropertyFormRequest $request, Property $property)
    {
       $property->options()->sync($request->validated('options'));
        $property->update($request->validated());
        return to_route('admin.property.index')->with('success', 'Hotel modifié avec succès');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'Hotel supprimé avec succès');
    }

}
