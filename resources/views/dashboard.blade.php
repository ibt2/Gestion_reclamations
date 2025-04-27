@extends('layouts.app')

@section('contents')
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Claim-Student</title>
  <link rel="stylesheet" href="styles.css">

  <style>
    .container {
      
      padding: 20px;
    }

    .text-section h1 {
        font-size: 3rem; /* Adjust the font size as needed */
      color: #3b82f6;
      margin-bottom: 20px;
      font-weight: bold; /* Ensure the text is bold */
      text-shadow: 1px 1px 2px #3b82f6;
      border:#fff 1px solid #fff;
      text-align : center;
    }

    .button-section {
      margin-top: 40px;
      text-align: center;
    }

    .custom-button {
      background-color: #3b82f6;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      font-size: 1rem;
      cursor: pointer;
      transition: background-color 0.3s;
      width: 400px; /* Adjust the width as needed */
      height: 150px; 
    }

    .custom-button:hover {
      background-color: #6395e7;
    }

    .image-container {
      display: flex; /* Enable flexbox for centering */
      flex-direction: column; /* Stack items vertically */
      align-items: center; /* Center items horizontally */
    }

    .image-section img {
      transform: rotate(0deg); /* Angle the image, set to 0deg if no rotation needed */
      height: 200px;
      width: 200px;
      border-radius: 15%;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    }
  </style>
</head>
<body>
  <header>
  </header>

  <main>
    <div class="container">
      <div class="text-section">
        <h1><strong>Bienvenue dans Claim-Student</strong></h1>
      </div>
      <div class="image-container">
        <div class="image-section">
          <img src="{{ asset('admin_assets/img/1fb488a1287a4df7b23c3a862b5a6060.png') }}" alt="Claim-Student" class="image">
        </div>
        <div class='button-section' >
        @can('isUser')
          <a href="{{ route('products.create') }}" class="custom-button">Ajouter une réclamation</a>
          @endcan

          @can('isAdmin')

          <a href="{{ route('products') }}" class="custom-button">Voir les réclamations</a>
          @endcan
        </div>
      </div>
    </div>
  </main>

  <footer>
  </footer>
</body>
</html>
@endsection
