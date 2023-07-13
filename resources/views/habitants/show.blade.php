@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="bon-heading">Détails de l'habitant</h1>

        <table class="table table-bordered bon-table">
            <tr>
                <th class="bon-table-header">CIN :</th>
                <td>{{ $habitant->cin }}</td>
            </tr>
            <tr>
                <th class="bon-table-header">Nom :</th>
                <td>{{ $habitant->nom }}</td>
            </tr>
            <tr>
                <th class="bon-table-header">Prénom :</th>
                <td>{{ $habitant->prenom }}</td>
            </tr>
            <tr>
                <th class="bon-table-header">Ville :</th>
                <td>{{ $habitant->ville->ville }}</td>
            </tr>
            <tr>
                <th class="bon-table-header">Photo :</th>
                <td><img src="/image/{{ $habitant->image }}" width="200px" class="bon-image"></td>
            </tr>
        </table>
        <button type="button" class="btn btn-danger text-white"
            onclick="window.location.href='{{ url('/habitant') }}'">Annuler</button>
    </div>
@stop
