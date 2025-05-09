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
        Schema::create('prof', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('module_responsable');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('adresse');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prof');
    }
};