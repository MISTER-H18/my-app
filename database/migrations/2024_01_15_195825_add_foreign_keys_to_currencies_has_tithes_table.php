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
        Schema::table('currencies_has_tithes', function (Blueprint $table) {
            $table->foreign(['currency_id'], 'currencies_has_tithes_ibfk_2')->references(['id'])->on('currencies')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->foreign(['tithe_id'], 'currencies_has_tithes_ibfk_1')->references(['id'])->on('tithes')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('currencies_has_tithes', function (Blueprint $table) {
            $table->dropForeign('currencies_has_tithes_ibfk_2');
            $table->dropForeign('currencies_has_tithes_ibfk_1');
        });
    }
};
