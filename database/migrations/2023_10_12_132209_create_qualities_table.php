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
        Schema::create('qualities', function (Blueprint $table) {
            $table->increments('id');

            $table->string('icon');

            $table->timestamps();
        });

        Schema::create('qualities_translation', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('qualities_id');
            $table->string('locale')->index();

            $table->string('description');

            $table->unique(['qualities_id', 'locale']);
            $table->foreign('qualities_id')->references('id')->on('qualities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualities');
    }
};
