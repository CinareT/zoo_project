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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->text('description');
            $table->string('img_url')->nullable();
            $table->string('img_big_url')->nullable();
            $table->string('weight')->nullable();
            $table->string('nutrition')->nullable();
            $table->unsignedBigInteger('continent_id');
            $table->unsignedBigInteger('category_id');
            $table->string('life_span')->nullable();
            $table->string('growth_count')->nullable();
            $table->string('map_url');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
