<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblsubjects extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('tblsubjects',function($table){
			$table->string('subj_code',10);
			$table->primary('subj_code');
			$table->string('subj_desc',100);
			$table->string('subj_year',1);
			$table->string('subj_section',1);
			$table->string('subj_sem',20);
			$table->string('subj_sy',16);
			$table->string('subj_inscode',6);
			$table->string('subj_course',1);
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
		Schema::drop('tblsubjects');
	}

}
