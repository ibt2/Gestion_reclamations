@extends('layouts.app')
  
@section('title', '')
  
@section('contents')

<div class="d-flex align-items-center justify-content-between mt-3">
    @if (Auth::user()->role == 'admin') 
        <h1 class="mb-0">Liste des reclamations</h1>
    @endif   

    @can('isUser')
        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Ajouter une reclamation</a>
    @endcan
</div>

<hr />

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

<!-- Tableau pour les réclamations reçues -->
@if ($reclamationsRecues->isNotEmpty())
    <h2>Réclamations reçues :</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de création</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reclamationsRecues as $reclamation)
                <tr>
                    <td>{{ $reclamation->Nom }}</td>
                    <td>{{ $reclamation->description }}</td>
                    <td>{{ $reclamation->created_at }}</td>

                    <td>
                        @can('isAdmin')
                            <div class="btn-group mb-3" role="group" aria-label="Actions">
                                
                                <a href="{{ route('RDV.createrdv', $reclamation->id) }}" class="btn btn-primary mr-2">Donner un rendez vous</a>
                                <a href="{{ route('products.show', $reclamation->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye"></i> Détails
                                </a>
                            </div>
                        @endcan
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Aucune réclamation reçue</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endif

<!-- Tableau pour les réclamations émises -->
@if ($reclamationsEmises->isNotEmpty())
    <h2>Réclamations émises :</h2>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nom de l'étudiant</th>
                <th>Module et detail de reclamation</th>
                <th>Date de création</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reclamationsEmises as $reclamation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reclamation->Nom }}</td>
                    <td>{{ $reclamation->description }}</td>
                    <td>{{ $reclamation->created_at }}</td>

                    <td>
                        <div class="btn-group" role="group" aria-label="Actions">
                            <a href="{{ route('products.show', $reclamation->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-eye"></i> Détail
                            </a>
                            <a href="{{ route('products.edit', $reclamation->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('products.destroy', $reclamation->id) }}" method="POST" onsubmit="return confirm('Voulez-vous supprimer ce produit ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Aucune réclamation émise</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endif

@endsection
