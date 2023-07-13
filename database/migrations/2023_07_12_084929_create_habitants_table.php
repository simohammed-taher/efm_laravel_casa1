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
        Schema::create('habitants', function (Blueprint $table) {
            $table->id();
            $table->string('cin');
            $table->string('nom');
            $table->string('prenom');
            $table->unsignedBigInteger('ville_id');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->foreign('ville_id')->references('id')->on('villes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitants');
    }
};
