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
        Schema::create('advertisement', function (Blueprint $table) {
            $table->id();
            $table->string('title', 128);
            $table->text('image')->nullable();
            $table->string('content', 128)->nullable();
            $table->string('link', 128)->nullable();
            $table->boolean('desktop')->default(false);
            $table->boolean('mobile')->default(false);
            $table->json('translates')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisement');
    }
};
