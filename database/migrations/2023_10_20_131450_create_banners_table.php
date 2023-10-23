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
        Schema::create('banners', function (Blueprint $table) {

            $table->increments('id');

            $table->string('disk');
            $table->string('image');
            $table->string('link');
            $table->boolean('status')->default(false);

            $table->timestamps();
        });

        Schema::create('banner_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('banner_id');
            $table->string('locale')->index();

            $table->string('title');
            $table->string('description');

            $table->unique(['banner_id', 'locale']);
            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
