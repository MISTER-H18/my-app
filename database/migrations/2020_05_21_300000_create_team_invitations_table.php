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
        Schema::create('team_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->constrained()->restrictOnUpdate()->cascadeOnDelete();
            $table->string('email');
            // ->constrained('team_roles', 'id')->restrictOnUpdate()->cascadeOnDelete() add it?
            $table->string('role')->nullable();
            $table->timestamps();

            $table->unique(['team_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_invitations');
    }
};
