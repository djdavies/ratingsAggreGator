<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	public function up()
	{
		Schema::create('users', function($table)
	    {
	        $table->increments('id');
	        $table->string('username', 100);
	        $table->string('password');
	        $table->timestamps();
	    });
	}

	public function down()
	{
		Schema::drop('users');
	}

}
