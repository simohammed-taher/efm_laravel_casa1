@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h2 class="bon-heading">Habitant Liste </h2>
            </div>
        </div>
        <a class=" btn btn-warning bon-button" href="{{ url('habitant/create') }}">Add Habitant</a> <br></br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success bon-alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered bon-table">
            <tr>
                <th>Image</th>
                <th>CIN</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
            @if ($message = session('success'))
                <script type="text/javascript">
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: '{{ $message }}'
                    })
                </script>
            @endif

            @foreach ($habitants as $habitant)
                <tr>
                    <td>
                        <img src="/image/{{ $habitant->image }}" width="100px" class="bon-image">
                    </td>
                    <td>{{ $habitant->cin }}</td>
                    <td>{{ $habitant->nom }}</td>
                    <td>{{ $habitant->prenom }}</td>
                    <td>{{ $habitant->ville->ville }}</td>
                    <td>
                        <form action="{{ url('habitant/' . $habitant->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info bon-button" href="{{ url('habitant/' . $habitant->id) }}">
                                <i class="bi bi-eye-fill"></i> Voir
                            </a>
                            <a class="btn btn-primary bon-button" href="{{ url('habitant/' . $habitant->id . '/edit') }}">
                                <i class="bi bi-pencil-fill"></i> Modifier
                            </a>
                            <button type="submit" class="btn btn-danger bon-button" onclick="confirmDelete()">
                                <i class="bi bi-trash-fill"></i> Supprimer
                            </button>

                            <script type="text/javascript">
                                function confirmDelete() {
                                    if (confirm("Êtes-vous sûr de vouloir supprimer ?")) {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Your file has been deleted.',
                                                    'success'
                                                )
                                            }
                                        })
                                    }
                                }
                            </script>
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>

        <div class="mt-3">
            {{ $habitants->links() }}
        </div>
    </div>
@stop
