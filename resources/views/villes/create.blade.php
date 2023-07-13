@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create Ville</h1>
                <form action="{{ url('villes') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="ville">Ville:</label>
                        <input type="text" name="ville" id="ville" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_habitats">Nombre Habitats:</label>
                        <input type="number" name="nombre_habitats" id="nombre_habitats" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Ville</button>
                    <button type="button" class="btn btn-danger text-white"
                        onclick="window.location.href='{{ url('/villes') }}'">List Villes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
