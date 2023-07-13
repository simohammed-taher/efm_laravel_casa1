@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="bon-heading">Modifier habitant</h1>
        @if ($errors->any())
            <div class="alert alert-danger bon-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('habitant/' . $habitant->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group mb-3">
                <label for="cin" class="bon-label">CIN :</label>
                <input type="text" class="form-control bon-input" name="cin" id="cin"
                    value="{{ $habitant->cin }}">
            </div>
            <div class="form-group mb-3">
                <label for="nom" class="bon-label">Nom :</label>
                <input type="text" class="form-control bon-input" name="nom" id="nom"
                    value="{{ $habitant->nom }}">
            </div>
            <div class="form-group mb-3">
                <label for="prenom" class="bon-label">Prénom :</label>
                <input type="text" class="form-control bon-input" name="prenom" id="prenom"
                    value="{{ $habitant->prenom }}">
            </div>
            <div class="form-group mb-3">
                <label for="ville_id" class="bon-label">Ville :</label>
                <select name="ville_id" class="form-control bon-input mb-3">
                    <option value="">select ville</option>
                    @foreach ($villes as $ville)
                        <option value="{{ $ville->id }}" {{ $habitant->ville_id == $ville->id ? 'selected' : '' }}>
                            {{ $ville->ville }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="bon-label">Image:</strong>
                    <input type="file" name="image" class="form-control bon-input" placeholder="image">
                    <img src="/image/{{ $habitant->image }}" width="100px" class="bon-image">
                </div>
            </div><br><br>
            <button type="submit" class="btn btn-primary bon-button">Enregistrer</button>

        </form>

    </div>
@stop
