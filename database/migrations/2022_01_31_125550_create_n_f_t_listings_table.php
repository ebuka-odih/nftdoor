<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNFTListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_f_t_listings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('featured_image');
            $table->string('price');
            $table->text('description');
            $table->string('images')->nullable();
            $table->integer('profit')->nullable();
            $table->integer('supply')->nullable();
            $table->string('network')->nullable();
            $table->dateTime('pre_sale')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('n_f_t_listings');
    }
}
