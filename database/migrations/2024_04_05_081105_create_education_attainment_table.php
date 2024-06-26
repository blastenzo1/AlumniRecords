<?php

use App\Models\EducationAttainment;
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
        Schema::create('education_attainments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('info_id')->nullable();
            // $table->foreign('info_id')->references('id')->on('alumnis')->onDelete('cascade');
            $table->string('course');
            $table->string('year_attended');
            $table->timestamps();
        });

        activity()->withoutLogs(function() {
            EducationAttainment::create([
                'info_id' => '1',
                'course' => 'Bachelor of Science in Agricultural Business',
                'year_attended' => '2023-2024',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_attainment');
    }
};
