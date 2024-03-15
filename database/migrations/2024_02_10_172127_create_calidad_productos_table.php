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
        Schema::create('calidad_productos', function (Blueprint $table) {
            $table->id('calidad_producto_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('comentario_id')->nullable();
            $table->float('media');
            $table->integer('total_vendidas');
            $table->timestamps();

            $table->foreign('producto_id')
                ->references('producto_id')
                ->on('productos')
                ->onDelete('cascade');

            $table->foreign('comentario_id')
                ->references('comentario_id')
                ->on('comentarios')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calidad_productos');
    }
};
