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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId(column:'user_id')->constrained();
            $table->string(column:'description')->nullable();
            $table->string(column: 'location')->nullable();
            $table->boolean(column:'hide_like_view')->default(value: false);
            $table->boolean(column:'allow_commenting')->default(value: false);
            $table->enum(column:'type' , allowed: ['post' , 'reel']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
