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
        Schema::table('egress_has_currencies', function (Blueprint $table) {
            $table->foreign(['egress_id'], 'egress_has_currencies_ibfk_2')->references(['id'])->on('egress')->onDelete('CASCADE')->onUpdate('RESTRICT');
            $table->foreign(['currency_id'], 'egress_has_currencies_ibfk_1')->references(['id'])->on('currencies')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('egress_has_currencies', function (Blueprint $table) {
            $table->dropForeign('egress_has_currencies_ibfk_2');
            $table->dropForeign('egress_has_currencies_ibfk_1');
        });
    }
};
