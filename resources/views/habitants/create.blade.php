@extends('layouts.app')

@section('content')
    <h1>Ajouter un personnage</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('habitant/create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>

            <div class="form-group mb-3">
                <label for="cin">CIN :</label>
                <input type="text" class="form-control" name="cin" id="cin" value="{{ old('cin') }}">
            </div>

            <div class="form-group mb-3">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" name="nom" id="nom" value="{{ old('nom') }}">
            </div>

            <div class="form-group mb-3">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" name="prenom" id="prenom" value="{{ old('prenom') }}">
            </div>

            <div class="form-group mb-3">
                <label for="ville_id">Ville :</label>
                <select name="ville_id" class="form-control mb-3">
                    <option value="-1">select ville</option>
                    @foreach ($villes as $ville)
                        <option value="{{ $ville->id }}">{{ $ville->ville }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>

            <button type="button" class="btn btn-danger text-white"
                onclick="window.location.href='{{ url('/habitant') }}'">List Villes</button>
    </form>
@endsection
