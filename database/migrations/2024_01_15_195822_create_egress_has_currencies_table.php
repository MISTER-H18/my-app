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
        Schema::create('egress_has_currencies', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('currency_id')->index('currency_id');
            $table->integer('egress_id')->index('egress_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('egress_has_currencies');
    }
};
