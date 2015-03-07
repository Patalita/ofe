<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblinstructors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//create tblinstructors
		Schema::create('tblInstructors',function($table){
			$table->string('ins_id',6);
			$table->primary('ins_id');
			$table->string('ins_lname',50);
			$table->string('ins_fname',50);
			$table->string('ins_mname',50);
			$table->string('ins_empstatus',50);
			$table->string('ins_password',50);
			$table->string('ins_online',1);
			$table->string('ins_status',1);//active or inactive
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//drop tblinstructors
		Schema::drop('tblinstructors');
	}

}
