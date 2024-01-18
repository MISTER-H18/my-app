<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_settings', function (Blueprint $table) {
            $table->foreign(['user_id'], 'users_settings_ibfk_1')->references(['id'])->on('users')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_settings', function (Blueprint $table) {
            $table->dropForeign('users_settings_ibfk_1');
        });
    }
};
