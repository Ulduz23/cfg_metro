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
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');

            $table->string('disk');
            $table->string('image');

            $table->timestamps();
        });

        Schema::create('slide_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('slide_id');
            $table->string('locale')->index();

            $table->string('title', 50);

            $table->unique(['slide_id', 'locale']);
            $table->foreign('slide_id')->references('id')->on('slides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slides');
    }
};
