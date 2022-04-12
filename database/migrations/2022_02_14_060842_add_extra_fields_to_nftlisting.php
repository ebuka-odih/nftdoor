<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldsToNftlisting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('n_f_t_listings', function (Blueprint $table) {
            //
            $table->string('floor_price')->nullable();
            $table->string('change24')->nullable();
            $table->string('owners')->nullable();
            $table->string('asset')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('n_f_t_listings', function (Blueprint $table) {
            //
        });
    }
}
