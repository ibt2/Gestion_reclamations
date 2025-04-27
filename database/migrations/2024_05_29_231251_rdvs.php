<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  
     public function up(): void
     {
         Schema::create('rdvs', function (Blueprint $table) {
             $table->bigIncrements('num');
             $table->date('date');
             $table->string('lieu');
             $table->string('durée');
             $table->string('heure');

             $table->unsignedBigInteger('reclamation_id'); 

             // Clé étrangère pour la réclamation
             $table->timestamps();
     
             // Définition de la clé étrangère
             $table->foreign('reclamation_id')->references('id')->on('reclamations');

         });
     }
     
     public function down(): void
     {
         Schema::dropIfExists('rdvs');
     }
    };