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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('producto_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('subcategoria_id')->nullable();
            $table->string('nombre');
            $table->text('descripcion');
            $table->float('precio');
            $table->integer('cantidad');
            $table->boolean('oferta');
            $table->float('precio_ante')->nullable();
            $table->string('tipo_envio',255);
            $table->string('direccion',255)->nullable();
            $table->date('fecha_lim_desc')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('subcategoria_id')
                ->references('subcategoria_id')
                ->on('subcategorias')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
