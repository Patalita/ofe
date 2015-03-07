<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblsurvey extends Migration {

	public function up()
	{
			Schema::create('tblsurveys',function($table){
			$table->string('qid',2);
			$table->primary('qid');
			$table->string('qtext',200);
			$table->string('qgroup',1);
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
		Schema::drop('tblsurveys');
	}

}
