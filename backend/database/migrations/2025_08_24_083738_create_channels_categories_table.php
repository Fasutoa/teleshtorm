<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('channels_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('translit_name', 64)->unique();
            $table->json('translates')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channels_categories');
    }
};
