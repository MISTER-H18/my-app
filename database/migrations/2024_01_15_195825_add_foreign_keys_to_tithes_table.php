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
        Schema::table('tithes', function (Blueprint $table) {
            $table->foreign(['user_id'], 'tithes_ibfk_2')->references(['id'])->on('users')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->foreign(['payment_method_id'], 'tithes_ibfk_1')->references(['id'])->on('payment_methods')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tithes', function (Blueprint $table) {
            $table->dropForeign('tithes_ibfk_2');
            $table->dropForeign('tithes_ibfk_1');
        });
    }
};
