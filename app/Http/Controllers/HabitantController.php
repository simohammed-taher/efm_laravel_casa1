<?php

namespace App\Http\Controllers;

use App\Models\Habitant;
use App\Models\Ville;
use Illuminate\Http\Request;

class HabitantController extends Controller
{
    public function index()
    {
        $habitants = Habitant::all();
        $habitants = Habitant::paginate(3);
        return view('habitants.index', compact('habitants'));
    }








    public function create()
    {
        $villes = Ville::all();
        return view('habitants.create', compact('villes'));
    }






    public function store(Request $request)
    {
        $request->validate([
            'cin' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'ville_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $habitant = new Habitant();
        $habitant->cin = $request->cin;
        $habitant->nom = $request->nom;
        $habitant->prenom = $request->prenom;
        $habitant->ville_id = $request->ville_id;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $habitant->image = $profileImage;
        }

        $habitant->save();

        return redirect('/habitant')->with(
            'success',
            'Habitant ajouté avec succès'
        );
    }






    public function show($id)
    {
        $habitant = Habitant::find($id);
        return view('habitants.show', compact('habitant'));
    }









    public function edit($id)
    {
        $habitant = Habitant::find($id);
        $villes = Ville::all();
        return view('habitants.edit', compact('habitant', 'villes'));
    }








    public function update(Request $request, $id)
    {
        $request->validate([
            'cin' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'ville_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'

        ]);

        $habitant = Habitant::find($id);
        $habitant->cin = $request->cin;
        $habitant->nom = $request->nom;
        $habitant->prenom = $request->prenom;
        $habitant->ville_id = $request->ville_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $destinationPath = 'image/';
            $image->move($destinationPath, $profileImage);
            $habitant->image = $profileImage;
        }
        return $habitant->save()
            ? redirect('/habitant')->with('success', 'Habitant mis à jour avec succès')
            : redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour de l\'habitant.');
    }









    public function destroy($id)
    {

        Habitant::destroy($id);

        return redirect('/habitant')->with('success', 'Habitant supprimé avec succès');
    }

}
