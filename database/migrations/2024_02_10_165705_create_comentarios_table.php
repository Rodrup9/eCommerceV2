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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('comentario_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('descripcion');
            $table->float('calificacion')->unsigned();
            $table->timestamps();

            $table->foreign('producto_id')
                ->references('producto_id')
                ->on('productos')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
