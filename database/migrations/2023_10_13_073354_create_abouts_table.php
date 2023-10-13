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
        Schema::create('abouts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('image');
            $table->boolean('status')->default(false);

            $table->timestamps();
        });

        Schema::create('abouts_translation', function(Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('abouts_id');
            $table->string('locale')->index();

            $table->string('title');
            $table->string('description');
            $table->text('content');

            $table->unique(['abouts_id', 'locale']);
            $table->foreign('abouts_id')->references('id')->on('abouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts_translation');
        Schema::dropIfExists('abouts');
    }
};
