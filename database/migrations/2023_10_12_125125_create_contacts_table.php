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
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('phone');
            $table->string('email');

            $table->timestamps();
        });

        Schema::create('contact_translations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('contact_id');
            $table->string('locale')->index();

            $table->string('address');

            $table->unique(['contact_id', 'locale']);
            $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
