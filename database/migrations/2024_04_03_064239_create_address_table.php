<?php

use App\Models\Address;
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

        Address::create([
            'info_id' => '1',
            'current_street' => 'test',
            'current_city' => 'test',
            'current_country' => 'Philippines',
            'current_zip_code' => '6200',
            'home_street' => 'test',
            'home_city' => 'test',
            'home_country' => 'Philippines',
            'home_zip_code' => '6200',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};
