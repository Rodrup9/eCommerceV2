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
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id('ubicacion_id');
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->integer('codigo_postal');
            $table->string('calle');
            $table->string('colonia');
            $table->string('num_casa');
            $table->timestamps();

            $table->foreign('estado_id')
                ->references('estado_id')
                ->on('estados')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubicaciones');
    }
};
