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
            $table->string('number');
            $table->string('email');
            $table->timestamps();
        });

        activity()->withoutLogs(function() {
            Alumni::create([
                'id' => '1',
                'last_name' => 'Dalisay',
                'middle_name' => 'Agila',
                'first_name' => 'Cardo',
                'birthdate' => '01/12/1969',
                'sex' => 'male',
                'nationality' => 'Filipino',
                'status' => 'Married',
                'spouse' => 'Filipino',
                'number' => '09123456789',
                'email' => 'cardoadalisay@su.edu.ph',
            ]);
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
