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
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('image');
            $table->boolean('status')->default(false);

            $table->timestamps();
        });

        Schema::create('projects_translation', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('projects_id');
            $table->string('locale')->index();

            $table->string('title');
            $table->longText('content');

            $table->unique(['projects_id', 'locale']);
            $table->foreign('projects_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
