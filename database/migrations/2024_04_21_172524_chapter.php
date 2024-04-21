<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Chapter;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chapters', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('representative');
            $table->string('email');
            $table->string('status');
            $table->timestamps();
        });

        Chapter::create([
            'name' => 'Acacia Chapter United States',
            'representative' => 'Jane Cooper',
            'email' => 'jane@microsoft.com',
            'status' => 'Active',
        ]);
        Chapter::create([
            'name' => 'Birch Chapter Canada',
            'representative' => 'John Doe',
            'email' => 'john@example.com',
            'status' => 'Inactive',
        ]);
        Chapter::create([
            'name' => 'Oak Chapter Australia',
            'representative' => 'Alice Smith',
            'email' => 'alice@example.com',
            'status' => 'Active',
        ]);
        Chapter::create([
            'name' => 'Pine Chapter Germany',
            'representative' => 'Michael Brown',
            'email' => 'michael@example.com',
            'status' => 'Inactive',
        ]);
        Chapter::create([
            'name' => 'Maple Chapter France',
            'representative' => 'Emily Taylor',
            'email' => 'emily@example.com',
            'status' => 'Pending',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
