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
        Schema::create('detalle_de_pedidos', function (Blueprint $table) {
            $table->id('detalle_id');
            $table->unsignedBigInteger('pedido_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->integer('cantidad');
            $table->float('precio_unitario');
            $table->float('descuento')->nullable();
            $table->timestamps();
            
            $table->foreign('pedido_id')
                ->references('pedido_id')
                ->on('pedidos')
                ->onDelete('set null');

            $table->foreign('producto_id')
                ->references('producto_id')
                ->on('productos')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_de_pedidos');
    }
};
