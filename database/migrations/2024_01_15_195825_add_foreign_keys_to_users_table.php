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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['marital_status_id'], 'users_ibfk_1')->references(['id'])->on('marital_statuses')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->foreign(['occupation_id'], 'users_ibfk_2')->references(['id'])->on('occupations')->onDelete('CASCADE')->onUpdate('RESTRICT');
            // $table->foreign(['phone_number_id'], 'users_ibfk_3')->references(['id'])->on('phone_numbers')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_ibfk_2');
            $table->dropForeign('users_ibfk_1');
        });
    }
};
