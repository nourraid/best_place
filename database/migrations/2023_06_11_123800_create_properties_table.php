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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->double('price');
            $table->string('image');
            $table->string('Certificate_of_ownership');
            $table->string('state');
            $table->string('address');
            $table->unsignedBigInteger("city_id");
            $table->unsignedBigInteger("type_id");
            $table->unsignedBigInteger("user_id");
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
