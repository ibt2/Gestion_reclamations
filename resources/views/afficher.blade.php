@extends('layouts.app')

@section('title', '')

@section('contents')


@can('isUser')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Liste rendez-vous</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Ajouter une réclamation</a>
</div>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<hr />
@endcan

<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Lieu</th>
            <th>Durée</th>
            <th>heure de départ</th>
            <th>date de création</th>

            @can('isAdmin')
            <th>Action</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($rdvs as $r)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->date }}</td>
            <td>{{ $r->lieu }}</td>
            <td>{{ $r->durée }}</td>
            <td>{{ $r->heure}}</td>
            <td>{{ $r->created_at}}</td>

            @can('isAdmin')
            <td>
                <a href="{{ route('RDV.destroy', ['num' => $r->num]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $r->num }}').submit();">
                    Supprimer
                </a>

                <form id="delete-form-{{ $r->num }}" action="{{ route('RDV.destroy', ['num' => $r->num]) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
            @endcan
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
