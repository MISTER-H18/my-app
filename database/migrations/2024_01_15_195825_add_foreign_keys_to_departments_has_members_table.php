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
        Schema::table('departments_has_members', function (Blueprint $table) {
            $table->foreign(['department_id'], 'departments_has_members_ibfk_2')->references(['id'])->on('departments')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->foreign(['member_id'], 'departments_has_members_ibfk_1')->references(['id'])->on('members')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('departments_has_members', function (Blueprint $table) {
            $table->dropForeign('departments_has_members_ibfk_2');
            $table->dropForeign('departments_has_members_ibfk_1');
        });
    }
};
