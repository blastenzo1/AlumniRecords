<?php

use App\Models\User;
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
        if(!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('first_name')->nullable();
                $table->string('middle_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('email')->unique();
                $table->string('type');
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });
        }

        activity()->withoutLogs(function() {
            User::create([
                'first_name' => 'Silliman',
                'middle_name' => '',
                'last_name' => 'University',
                'email' => 'sillimanict@su.edu.ph',
                'password' => bcrypt('123'),
                'type' => 'Master Admin'
            ]);

            User::create([
                'first_name' => 'John',
                'middle_name' => 'Dave',
                'last_name' => 'Williams',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('123'),
                'type' => 'Admin'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
