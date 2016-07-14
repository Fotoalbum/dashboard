<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Frbeorders365 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frbeorders', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('total_orders');
            $table->string('total_amount');
            $table->string('average');
            $table->date('created_at');
        });		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('frbeorders');	// Delete all.
    }
}
