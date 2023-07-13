@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Ville</h1>
                <form action="{{ url('villes/' . $villes->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="ville">Ville:</label>
                        <input type="text" name="ville" id="ville" class="form-control" required
                            value="{{ $villes->ville }}">
                    </div>
                    <div class="form-group">
                        <label for="nombre_habitats">Nombre Habitats:</label>
                        <input type="number" name="nombre_habitats" id="nombre_habitats" class="form-control" required
                            value="{{ $villes->nombre_habitats }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Ville</button>
                    <button type="button" class="btn btn-danger text-white"
                        onclick="window.location.href='{{ url('/villes') }}'">List Villes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
