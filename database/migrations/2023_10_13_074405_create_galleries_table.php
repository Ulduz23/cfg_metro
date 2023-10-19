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
        Schema::create('galleries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('image');
            $table->boolean('status')->default(false);

            $table->timestamps();
        });

        Schema::create('gallery_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('gallery_id');
            $table->string('locale')->index();

            $table->string('title');

            $table->unique(['gallery_id', 'locale']);
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
