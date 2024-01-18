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
        Schema::table('members', function (Blueprint $table) {
            $table->foreign(['user_id'], 'members_ibfk_2')->references(['id'])->on('users')->onDelete('CASCADE')->onUpdate('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign(['pastor_id'], 'members_ibfk_1')->references(['id'])->on('pastors')->onDelete('CASCADE')->onUpdate('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign('members_ibfk_2');
            $table->dropForeign('members_ibfk_1');
        });
    }
};
