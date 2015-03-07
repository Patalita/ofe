<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSysusers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('tblsysusers')->insert(array(
			'su_username'=>'patski',
			'su_password'=>'jan19',
			'su_lname'=>'Patalita',
			'su_fname'=>'Vicente III',
			'su_mname'=>'Funclara',
			'su_alevel'=>'1',
			'su_deptid'=>'1',
			'su_online'=>'N',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsysusers')->insert(array(
			'su_username'=>'yani',
			'su_password'=>'marie',
			'su_lname'=>'Amahit',
			'su_fname'=>'Llanelyn',
			'su_mname'=>'S',
			'su_alevel'=>'1',
			'su_deptid'=>'1',
			'su_online'=>'N',
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
		DB::table('tblsysusers')->where('su_username','=','patski')->delete();
		DB::table('tblsysusers')->where('su_username','=','yani')->delete();
	}

}
