<?php

use App\Models\Nationality;
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
        Schema::create('nationalities', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $nationalities = json_decode(file_get_contents(public_path('data/nationalities.json')), true);
        foreach ($nationalities as $nationality) {
            Nationality::create([
                'name' => $nationality['name'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nationalities');
    }
};
