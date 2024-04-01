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
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('sex');
            $table->string('status');
            $table->string('nationality');
            $table->string('spouse');
            $table->integer('number');
            $table->string('occupation');
            $table->string('email');
            $table->string('living_status');
            $table->date('birthdate');
            $table->text('address');
            $table->string('education');
            $table->string('awards')->nullable();
            $table->timestamps();
        });

        //Alumni::create([
        //'first_name' => 'John',
        //'middle_name' => 'David',
       // 'last_name' => 'Doe',
       // 'sex' => 'Male',
       // 'status' => 'Alumni',
       // 'nationality' => 'American',
       // 'occupation' => 'Software Engineer',
       // 'email' => 'john.doe@example.com',
        //'living_status' => 'Alive',
        //'birthdate' => '1990-01-01',
        //'address' => '123 Main Street, City, Country',
       // 'education' => 'Bachelor of Science in Computer Science',
       // 'awards' => 'Best Student Award, 2010',
        // ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
