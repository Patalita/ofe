<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstructors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//insert new records for tblinstructor
		DB::table('tblinstructors')->insert(array(
			'ins_id'=>'EMP001',
			'ins_lname'=>'Cuizon',
			'ins_fname'=>'Lee',
			'ins_mname'=>'G',
			'ins_empstatus'=>'Part-Time',
			'ins_password'=>'EMP001',
			'ins_online'=>'N',
			'ins_status'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblinstructors')->insert(array(
			'ins_id'=>'EMP002',
			'ins_lname'=>'Cuizon',
			'ins_fname'=>'Jovelyn',
			'ins_mname'=>'G',
			'ins_empstatus'=>'Full-Time',
			'ins_password'=>'EMP002',
			'ins_online'=>'N',
			'ins_status'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblinstructors')->insert(array(
			'ins_id'=>'EMP003',
			'ins_lname'=>'Bandalan',
			'ins_fname'=>'Roderick',
			'ins_mname'=>'B',
			'ins_empstatus'=>'Full-Time',
			'ins_password'=>'EMP003',
			'ins_online'=>'N',
			'ins_status'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblinstructors')->insert(array(
			'ins_id'=>'EMP004',
			'ins_lname'=>'Santiago',
			'ins_fname'=>'January Faith',
			'ins_mname'=>'B',
			'ins_empstatus'=>'Part-Time',
			'ins_password'=>'EMP004',
			'ins_online'=>'N',
			'ins_status'=>'1',
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
		//rollback
		//DB::table('tblinstructors')->delete('EMP001');
		DB::table('tblinstructors')->where('ins_id','=','EMP001')->delete();
		DB::table('tblinstructors')->where('ins_id','=','EMP002')->delete();	
		DB::table('tblinstructors')->where('ins_id','=','EMP003')->delete();
		DB::table('tblinstructors')->where('ins_id','=','EMP004')->delete();

	}

}
