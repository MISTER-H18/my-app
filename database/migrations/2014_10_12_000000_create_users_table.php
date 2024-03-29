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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('identity_card', 10)->nullable()->unique('identity_card'); 
            $table->string('name', 45)->nullable();
            // $table->string('middle_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            // $table->string('second_last_name', 45)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->boolean('sex')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->text('address')->nullable();
            $table->text('occupation')->nullable();
            $table->string('email', 60)->unique()->unique('email');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->rememberToken();
            
            $table->unsignedBigInteger('marital_status_id')->index('marital_status_id');
            // $table->unsignedBigInteger('occupation_id')->index('occupation_id');
            //$table->unsignedBigInteger('phone_number_id')->index('phone_number_id');

            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
