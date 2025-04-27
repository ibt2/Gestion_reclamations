<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
return new class extends Migration
{
   public function up(): void
{
 
    Schema::create('reclamations', function (Blueprint $table) {
        $table->id();
        $table->string('Nom');
        $table->text('description');
        $table->unsignedBigInteger('to_id'); // Clé étrangère pour l'étudiant
        $table->unsignedBigInteger('from_id'); // Clé étrangère pour l'étudiant

        $table->timestamps();

        // Définition des clés étrangères
        $table->foreign('to_id')->references('id')->on('users');
        $table->foreign('from_id')->references('id')->on('users');

    });
}

public function down(): void
{
    Schema::dropIfExists('reclamations');
}


};