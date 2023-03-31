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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('excerpt');
            $table->text('description');
            $table->text('image');
            $table->foreignId('type_id');
            $table->integer('status');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE blogs ADD FULLTEXT search(title,slug,excerpt,description)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
