<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubjects extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('tblsubjects')->insert(array(
			'subj_code'=>'HUMA12_A',
			'subj_desc'=>'Humanities and Arts Appreciation',
			'subj_year'=>'1',
			'subj_section'=>'A',
			'subj_sem'=>'First Semester',
			'subj_sy'=>'2014-2015',
			'subj_inscode'=>'EMP004',
			'subj_course'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsubjects')->insert(array(
			'subj_code'=>'HUMA12_B',
			'subj_desc'=>'Humanities and Arts Appreciation',
			'subj_year'=>'1',
			'subj_section'=>'B',
			'subj_sem'=>'First Semester',
			'subj_sy'=>'2014-2015',
			'subj_inscode'=>'EMP004',
			'subj_course'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsubjects')->insert(array(
			'subj_code'=>'HUMA12_C',
			'subj_desc'=>'Humanities and Arts Appreciation',
			'subj_year'=>'1',
			'subj_section'=>'C',
			'subj_sem'=>'First Semester',
			'subj_sy'=>'2014-2015',
			'subj_inscode'=>'EMP004',
			'subj_course'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::table('tblsubjects')->where('subj_code','=','HUMA12_A')->delete();
		DB::table('tblsubjects')->where('subj_code','=','HUMA12_B')->delete();
		DB::table('tblsubjects')->where('subj_code','=','HUMA12_C')->delete();
	}

}
