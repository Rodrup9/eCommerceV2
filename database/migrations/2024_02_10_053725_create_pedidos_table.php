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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('pedido_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('ubicacion_id')->nullable();
            $table->unsignedBigInteger('tipo_de_entrega_id')->nullable();
            $table->unsignedBigInteger('estado_pedido_id')->nullable();
            $table->string('descripcion');
            $table->dateTime('fecha_de_pedido');
            $table->dateTime('fecha_de_entrega');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('ubicacion_id')
                ->references('ubicacion_id')
                ->on('ubicaciones')
                ->onDelete('set null');

            $table->foreign('tipo_de_entrega_id')
                ->references('tipo_de_entrega_id')
                ->on('tipo_de_entregas')
                ->onDelete('set null');

            $table->foreign('estado_pedido_id')
                ->references('estado_pedido_id')
                ->on('estado_pedidos')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
