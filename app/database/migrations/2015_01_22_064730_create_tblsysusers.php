<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblsysusers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblsysusers',function($table){
			$table->string('su_username',20);
			$table->primary('su_username');
			$table->string('su_password',20);
			$table->string('su_lname',50);
			$table->string('su_fname',50);
			$table->string('su_mname',50);
			$table->string('su_alevel',1);
			$table->string('su_deptid',2);
			$table->string('su_online',1);
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
		Schema::drop('tblsysusers');
	}

}
