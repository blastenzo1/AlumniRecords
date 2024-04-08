<?php

use App\Http\Controllers\AlumniController;
use App\Models\Alumni;
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
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('birthdate');
            $table->string('sex');
            $table->string('nationality');
            $table->string('status');
            $table->string('spouse');
            $table->integer('number');
            $table->string('email');
            // $table->string('occupation');
            // $table->string('living_status');
            // $table->string('education');
            // $table->string('awards')->nullable();
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
