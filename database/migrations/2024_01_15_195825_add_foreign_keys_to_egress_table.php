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
        Schema::table('egress', function (Blueprint $table) {
            $table->foreign(['payment_method_id'], 'egress_ibfk_1')->references(['id'])->on('payment_methods')->onDelete('CASCADE')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('egress', function (Blueprint $table) {
            $table->dropForeign('egress_ibfk_1');
        });
    }
};
