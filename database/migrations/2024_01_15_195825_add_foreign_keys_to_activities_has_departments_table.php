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
        Schema::table('activities_has_departments', function (Blueprint $table) {
            $table->foreign(['department_id'], 'activities_has_departments_ibfk_2')->references(['id'])->on('departments')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->foreign(['activity_id'], 'activities_has_departments_ibfk_1')->references(['id'])->on('activities')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activities_has_departments', function (Blueprint $table) {
            $table->dropForeign('activities_has_departments_ibfk_2');
            $table->dropForeign('activities_has_departments_ibfk_1');
        });
    }
};
