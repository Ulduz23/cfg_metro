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
        Schema::create('statistics', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('number');

            $table->timestamps();
        });

        Schema::create('statistics_translation', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('statistics_id');
            $table->string('locale')->index();
            
            $table->string('title');

            $table->unique(['statistics_id', 'locale']);
            $table->foreign('statistics_id')->references('id')->on('statistics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
