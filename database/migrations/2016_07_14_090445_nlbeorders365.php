<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nlbeorders365 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nlbeorders', function (Blueprint $table) {
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
        Schema::drop('nlbeorders');	// Delete all.
    }
}
