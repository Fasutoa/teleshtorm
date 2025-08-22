<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('translit_name', 64)->unique();
            $table->string('description', 225)->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->boolean('recommended')->default(false);
            $table->foreignId('category_id')
                ->constrained('articles_categories')
                ->cascadeOnDelete();
            $table->timestamps();
            $table->json('translates')->nullable();
            $table->unsignedBigInteger('telegram_post_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
