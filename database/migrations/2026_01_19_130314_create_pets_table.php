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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('photo_path')->nullable();
            $table->string('name');
            $table->string('specie')->nullable();
            $table->string('breed')->nullable();
            $table->string('color')->nullable();
            $table->decimal('height', 12, 3)->nullable();
            $table->decimal('weight', 12, 3)->nullable();
            $table->date('birthday')->nullable();
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('observations')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
