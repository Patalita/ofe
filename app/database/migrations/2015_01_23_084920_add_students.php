<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStudents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			DB::table('tblstudents')->insert(array(
			'stu_id'=>'2014123456',
			'stu_lname'=>'Canen',
			'stu_fname'=>'Exel',
			'stu_mname'=>'G',
			'stu_pword'=>'usjr2015',
			'stu_course'=>'1',
			'stu_year'=>'2',
			'stu_section'=>'A',
			'stu_sem'=>'First Semester',
			'stu_sy'=>'2014-2015',
			'stu_status'=>'1',
			'stu_online'=>'N',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
			DB::table('tblstudents')->insert(array(
			'stu_id'=>'2014123457',
			'stu_lname'=>'Villegas',
			'stu_fname'=>'Reyna',
			'stu_mname'=>'L',
			'stu_pword'=>'usjr2015',
			'stu_course'=>'1',
			'stu_year'=>'2',
			'stu_section'=>'A',
			'stu_sem'=>'First Semester',
			'stu_sy'=>'2014-2015',
			'stu_status'=>'1',
			'stu_online'=>'N',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
			DB::table('tblstudents')->insert(array(
			'stu_id'=>'2014123458',
			'stu_lname'=>'Balane',
			'stu_fname'=>'Christian',
			'stu_mname'=>'A',
			'stu_pword'=>'usjr2015',
			'stu_course'=>'1',
			'stu_year'=>'2',
			'stu_section'=>'A',
			'stu_sem'=>'First Semester',
			'stu_sy'=>'2014-2015',
			'stu_status'=>'1',
			'stu_online'=>'N',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
			DB::table('tblstudents')->insert(array(
			'stu_id'=>'2014123459',
			'stu_lname'=>'Remorta',
			'stu_fname'=>'Christian',
			'stu_mname'=>'A',
			'stu_pword'=>'usjr2015',
			'stu_course'=>'1',
			'stu_year'=>'2',
			'stu_section'=>'A',
			'stu_sem'=>'First Semester',
			'stu_sy'=>'2014-2015',
			'stu_status'=>'1',
			'stu_online'=>'N',
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
		DB::table('tblstudents')->where('stu_id','=','2014123456')->delete();
		DB::table('tblstudents')->where('stu_id','=','2014123457')->delete();
		DB::table('tblstudents')->where('stu_id','=','2014123458')->delete();
		DB::table('tblstudents')->where('stu_id','=','2014123459')->delete();
	}

}
