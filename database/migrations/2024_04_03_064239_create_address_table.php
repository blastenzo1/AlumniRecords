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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('info_id')->nullable();
            // $table->foreign('info_id')->references('id')->on('alumnis')->onDelete('cascade');
            $table->string('current_street');
            $table->string('current_city');
            $table->string('current_country');
            $table->string('current_zip_code');
            $table->string('home_street');
            $table->string('home_city');
            $table->string('home_country');
            $table->string('home_zip_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
