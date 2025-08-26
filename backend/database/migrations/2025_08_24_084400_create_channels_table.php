<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->foreignId('category_id')
                ->constrained('channels_categories')
                ->cascadeOnDelete();
            $table->text('image')->nullable();
            $table->string('link_tg', 64)->unique();
            $table->boolean('hidden')->default(false)->index();
            $table->boolean('activity')->default(true)->index();
            $table->integer('subscribers')->default(0)->index();
            $table->timestamp('created_at')->nullable()->index();
            $table->json('translates')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
