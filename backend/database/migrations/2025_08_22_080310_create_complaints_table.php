<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['channel', 'chat', 'bot']);
            $table->boolean('link_not_work')->default(false);
            $table->boolean('drugs')->default(false);
            $table->boolean('false_information')->default(false);
            $table->boolean('child_abuse')->default(false);
            $table->string('other', 256)->nullable();
            $table->foreignId('object_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
