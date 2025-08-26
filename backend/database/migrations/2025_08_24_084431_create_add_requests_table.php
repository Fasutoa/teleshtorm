<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('add_requests', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('link_tg', 64)->nullable();
            $table->foreignId('category_id')
                ->constrained('channels_categories')
                ->cascadeOnDelete();
            $table->enum('second_category', ['channel', 'chat_bot'])->default('channel');
            $table->integer('subscribers')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('add_requests');
    }
};
