@extends('layouts.app')

@section('title', '')

@section('contents')

<div class="container">

    <div class="row">

        @include('conversations.users', ['users' => $users])

        <div class="col-md-9">

            <div class="card">

                <div class="card-header"> {{$user->name}} </div>

                <div class="card-body conversation">

                    @foreach($messages as $message)

                    <div class="row">

                        <div class="col-md-10">

                            <p>

                                <strong>{{ $message->content }}</strong>

                            </p>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>

            <h1 class="mb-0">Ajouter une réclamation</h1>

            <hr />

            <form action="" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="row mb-3">

                    <div class="col">

                        <input type="text" name="content" class="form-control" placeholder="Contenu du message">

                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Envoyer</button>

            </form>

        </div>

    </div>

</div>

@endsection
