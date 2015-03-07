<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblstudents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tblstudents',function($table){
			$table->string('stu_id',10);
			$table->primary('stu_id');
			$table->string('stu_lname',50);
			$table->string('stu_fname',50);
			$table->string('stu_mname',50);
			$table->string('stu_pword',50);
			$table->string('stu_course',1);
			$table->string('stu_year',1);
			$table->string('stu_section',1);
			$table->string('stu_sem',20);
			$table->string('stu_sy',9);
			$table->string('stu_status',1);
			$table->string('stu_online',1);
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
		Schema::drop('tblstudents');
	}

}
