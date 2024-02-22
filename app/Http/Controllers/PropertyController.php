<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(SearchPropertyRequest $request)
    {
        $query = Property::query();
        if ($request->has('price')) {
            $query->where('price', '<=', $request->input('price'));
        }
        $properties = Property::paginate(16);
        return view('properties.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated(),
        ]);
    }

    public function show(string $slug, Property $property)
    {
        return view('properties.show', ['property' => $property]);
    }
}
