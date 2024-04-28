<?php

use App\Models\College;
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
        Schema::create('colleges', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $colleges = json_decode(file_get_contents(public_path('data/colleges.json')), true);
        foreach ($colleges as $college) {
            College::create([
                'name' => $college['name'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
