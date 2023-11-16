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
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->text('more');

            $table->boolean('refound')->default(false);

            $table->string('place');
            $table->string('categorie');

            // $table->unsignedBigInteger('categorie_id');
            // $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            // $table->unsignedBigInteger('place_id');
            // $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade')->onUpdate('cascade');
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens');
    }
};
