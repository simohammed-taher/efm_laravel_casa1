<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{





    public function index()
    {
        $villes = Ville::all();

        return view('villes.index', compact('villes'));
    }



    public function create()
    {
        return view('villes.create');
    }



    public function store(Request $request)
{
    $input = $request->all();
    Ville::create($input);
    return redirect('/habitant')->with('success', 'Cities created successfully');
}






    public function edit($id)
    {
        $villes = Ville::find($id);
        return view('villes.edit', compact('villes'));
    }






    public function update(Request $request, $id)
    {
        $villes = Ville::find($id);
        $input = $request->all();
        $villes->update($input);
        return redirect('/habitant')->with('success', 'Cities updated successfully');
    }






    public function destroy($id)
    {
        Ville::destroy($id);
        return redirect('/habitant')->with('success', 'Cities deleted successfully');
    }




}
