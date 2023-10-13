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
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('status')->default(false);

            $table->timestamps();
        });

        Schema::create('stations_translation', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('stations_id');
            $table->string('locale')->index();

            $table->string('name');

            $table->unique(['stations_id', 'locale']);
            $table->foreign('stations_id')->references('id')->on('stations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stations');
    }
};
