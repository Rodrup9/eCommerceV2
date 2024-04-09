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
        Schema::create('subcategorias', function (Blueprint $table) {
            $table->id('subcategoria_id');
            $table->string('nombreSubCategoria')->unique();
            $table->timestamps();
            $table->unsignedBigInteger('categoria_id')->nullable();
            $table->foreign('categoria_id')
                ->references('categoria_id')
                ->on('categorias')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
