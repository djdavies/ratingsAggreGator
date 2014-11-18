<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('players', function($table)
	    {
	        $table->increments('id');
	        $table->string('name', 100);
	        $table->timestamps();
	    });
	}

	public function down()
	{
	    Schema::drop('players');
	}

}