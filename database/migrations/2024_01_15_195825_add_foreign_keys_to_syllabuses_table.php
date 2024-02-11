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
        Schema::table('syllabuses', function (Blueprint $table) {
            $table->foreign(['user_id'], 'syllabuses_ibfk_2')->references(['id'])->on('users')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->foreign(['course_id'], 'syllabuses_ibfk_1')->references(['id'])->on('courses')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('syllabuses', function (Blueprint $table) {
            $table->dropForeign('syllabuses_ibfk_2');
            $table->dropForeign('syllabuses_ibfk_1');
        });
    }
};
