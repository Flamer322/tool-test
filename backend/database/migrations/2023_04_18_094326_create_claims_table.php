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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')
                ->unsigned();

            $table->string('name', 255)
                ->nullable();
            $table->string('number', 255)
                ->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
