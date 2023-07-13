@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Liste de villes</h1>
                <a href="{{ url('villes/create') }}" class="btn btn-primary">Ajouter une ville</a>
                <p>
                    @if (session('success'))
                        <h3 class="alert alert-success">{{ session('success') }}</h3>
                    @endif
                </p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ville</th>
                            <th>Nombre d'habitats</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($villes as $ville)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ville->ville }}</td>
                                <td>{{ $ville->nombre_habitats }}</td>
                                <td>
                                    <a href="{{ url('/villes/' . $ville->id . '/edit') }}" title="Edit ville">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="bi bi-pencil-square"></i> modifier
                                        </button>
                                    </a>
                                    <form action="{{ url('/villes/' . $ville->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                                            onclick="return confirm('Confirm delete?')">
                                            <i class="bi bi-trash"></i> supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Aucune ville disponible.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
