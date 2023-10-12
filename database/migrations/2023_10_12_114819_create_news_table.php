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
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');

            $table->string('image');
            $table->boolean('online')->default(false);

            $table->timestamps();
        });

        Schema::create('news_translations', function(Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('news_id');
            $table->string('locale')->index();

            $table->string('title');
            $table->text('description');
            $table->longtext('content');

            $table->unique(['news_id', 'locale']);
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
