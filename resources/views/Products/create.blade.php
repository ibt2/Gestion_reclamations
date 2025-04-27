@extends('layouts.app')

@section('contents')
    <h1 class="mb-0 text-center">Ajouter une réclamation</h1>
    <hr />
    <div class="d-flex justify-content-center">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" style="width: 50%;">
            @csrf
            <div class="row mb-3">
                <div class="col">
                    <input type="text" name="Nom" class="form-control" placeholder="Nom">
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col">
                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                </div>
            </div>
            <input type="hidden" name="from_id" value="{{ Auth::id() }}">

            <!-- Utilisateur connecté -->
            <div class="row mb-3">
                <div class="col">
                    <input type="text" id="recipient_name" class="form-control" placeholder="Nom du destinataire">
                    <input type="hidden" name="to_id" id="recipient_id">
                </div>
            </div>
            
            <!-- Autres champs à ajouter selon votre structure de données -->
            
            <div class="row">
            <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('recipient_name').addEventListener('input', function() {
            const name = this.value;

            if (name.length > 2) {
                fetch(`/get-recipient-id?name=${name}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.id) {
                            document.getElementById('recipient_id').value = data.id;
                        } else {
                            document.getElementById('recipient_id').value = '';
                        }
                    });
            } else {
                document.getElementById('recipient_id').value = '';
            }
        });
    </script>
@endsection
