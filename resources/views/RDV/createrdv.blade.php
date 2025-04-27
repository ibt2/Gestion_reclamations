@extends('layouts.app')
  
@section('title', '')
  
@section('contents')
<h1 class="mb-0">Donnez un rendez-vous</h1>
<hr />
@can('isAdmin')

    <form action="{{ route('RDV.store',$reclamation_id->id) }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
    <input type="hidden" name="reclamation_id" value="{{ $reclamation_id->id }}">

        <div class="col">
            <input type="date" name="date" class="form-control" placeholder="date">
        </div>
      
        <div class="col">
            <input type="text" name="lieu" class="form-control" placeholder="lieu">
        </div>
        <div class="col">
            <input type="text" name="durée" class="form-control" placeholder="durée">
        </div> 
        <div class="col">
            <input type="time" name="heure" class="form-control" placeholder="heure">
        </div>                                   
    </div>

    <div class="row">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endcan
@endsection