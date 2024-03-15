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
        Schema::create('type_user_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('type_user_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('type_user_id')
                ->references('id')
                ->on('type_users')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_user_user');
    }
};
