<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option; 

class OptionController extends Controller
{
    public function index()
    {
        
        return view('admin.options.index', [
            'option' => Option::paginate(25)
        ]);
    }

    public function create()
    {
        $option = new Option();
       
        
        return view('admin.options.form', ['option' => new Option()
    ]);
    }

    public function store(OptionFormRequest $request)
    {
       $option = Option::create($request->validated());
       return to_route('admin.options.index')->with('success', 'Option ajouté avec succès');
    }

    public function edit(Option $option)
    {
        return view('admin.options.form', ['option' => $option]);
    }
   

    public function update(OptionFormRequest $request, Option $option)
    {
       
        $option->update($request->validated());
        return to_route('admin.options.index')->with('success', 'Option modifié avec succès');
    }

    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.options.index')->with('success', 'Option supprimé avec succès');
    }

}
