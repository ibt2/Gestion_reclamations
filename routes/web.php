<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\conversationController;
use App\Http\Controllers\ProductController;
 use App\Http\Controllers\reclamationController;
 use App\Http\Controllers\rdvController;

use App\Models\reclamation;
Route::get('/get-recipient-id', [reclamationController::class, 'getRecipientId']);
Route::resource('products', reclamationController::class);
route::get('/home',[conversationController::class, 'index'])->name('home');
route::get('/conversations',[conversationController::class, 'index'])->name('conversations');
route::get('/conversations/{user}',[conversationController::class, 'show'])->name('conversations.show');
Route::post('/conversations/{user}', [conversationController::class, 'store']);

Route::get('/', function () {
    return view('welcome');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(reclamationController::class)->prefix('reclamations')->group(function () {
        Route::get('', 'index')->name('products');
    
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });

// Route pour afficher la liste des rendez-vous
Route::get('/rdv', [rdvcontroller::class, 'afficher'])->name('RDV.index');

// Route pour afficher le formulaire de création de rendez-vous
Route::get('/rdv/createrdv/{id}', [rdvcontroller::class, 'createrdv'])->name('RDV.createrdv');

// Route pour enregistrer un nouveau rendez-vous
Route::post('/rdv', [rdvcontroller::class, 'store'])->name('RDV.store');

// Route pour afficher un rendez-vous spécifique
Route::get('/rdv/{num}', [rdvcontroller::class, 'show'])->name('RDV.show');

// Route pour afficher le formulaire d'édition d'un rendez-vous spécifique
Route::get('/rdv/{num}/edit', [rdvcontroller::class, 'edit'])->name('RDV.edit');

// Route pour mettre à jour un rendez-vous spécifique
Route::put('/rdv/{num}', [rdvcontroller::class, 'update'])->name('RDV.update');

// Route pour supprimer un rendez-vous spécifique
Route::delete('/rdv/{num}', [rdvcontroller::class, 'destroy'])->name('RDV.destroy');

 
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');

});