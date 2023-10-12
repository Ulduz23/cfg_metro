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

        Schema::create('contacts_translation', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('contacts_id');
            $table->string('locale')->index();

            $table->string('address');

            $table->unique(['contacts_id', 'locale']);
            $table->foreign('contacts_id')->references('id')->on('contacts')->onDelete('cascade');
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
