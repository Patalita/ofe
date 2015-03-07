<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::table('tblsurveys')->insert(array(
			'qid'=>'A1',
			'qtext'=>'Speak expressively or emphatically',
			'qgroup'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'A2',
			'qtext'=>'Move about while lecturing',
			'qgroup'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'A3',
			'qtext'=>'Gesture with hands or arms',
			'qgroup'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'A4',
			'qtext'=>'Show facial expressions',
			'qgroup'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'A5',
			'qtext'=>'Use humor',
			'qgroup'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'A6',
			'qtext'=>'Read lecture verbatim from prepared notes or text',
			'qgroup'=>'1',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'B1',
			'qtext'=>'Use concrete examples of concepts',
			'qgroup'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'B2',
			'qtext'=>'Give multiple examples',
			'qgroup'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'B3',
			'qtext'=>'Point out practical applications of concepts',
			'qgroup'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'B4',
			'qtext'=>'Stress important points',
			'qgroup'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'B5',
			'qtext'=>'Repeat difficult ideas',
			'qgroup'=>'2',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'C1',
			'qtext'=>'Address students by name',
			'qgroup'=>'3',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'C2',
			'qtext'=>'Encourage questions and comments',
			'qgroup'=>'3',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'C3',
			'qtext'=>'Talk with students after class',
			'qgroup'=>'3',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'C4',
			'qtext'=>'Praise students for good ideas',
			'qgroup'=>'3',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'C5',
			'qtext'=>'Ask questions of class as a whole',
			'qgroup'=>'3',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'D1',
			'qtext'=>'Advise students as to how to prepare for tests or exams',
			'qgroup'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'D2',
			'qtext'=>'Provide sample exam questions',
			'qgroup'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'D3',
			'qtext'=>'Proceed at rapid pace',
			'qgroup'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'D4',
			'qtext'=>'Digress from theme of lecture',
			'qgroup'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'D5',
			'qtext'=>'State course objectives',
			'qgroup'=>'4',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'E1',
			'qtext'=>'Act friendly, easy to talk to',
			'qgroup'=>'5',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'E2',
			'qtext'=>'Show concern for student progress',
			'qgroup'=>'5',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'E3',
			'qtext'=>'Offer to help students with problems',
			'qgroup'=>'5',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'E4',
			'qtext'=>'Show tolerance of other viewpoints',
			'qgroup'=>'5',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'F1',
			'qtext'=>'Put outline of lecture on blackboard or overhead screen',
			'qgroup'=>'6',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'F2',
			'qtext'=>'Use headings and subheadings',
			'qgroup'=>'6',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'F3',
			'qtext'=>'Give preliminary overview of lecture',
			'qgroup'=>'6',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'F4',
			'qtext'=>'Signal transition to a new topic',
			'qgroup'=>'6',
			'created_at'=>date('Y-m-d H:m:s'),
			'updated_at'=>date('Y-m-d H:m:s')
			));
		DB::table('tblsurveys')->insert(array(
			'qid'=>'F5',
			'qtext'=>'Explain how each topic fits in',
			'qgroup'=>'6',
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
		DB::table('tblsurveys')->where('qid','=','A1')->delete();
		DB::table('tblsurveys')->where('qid','=','A2')->delete();
		DB::table('tblsurveys')->where('qid','=','A3')->delete();
		DB::table('tblsurveys')->where('qid','=','A4')->delete();
		DB::table('tblsurveys')->where('qid','=','A5')->delete();
		DB::table('tblsurveys')->where('qid','=','A6')->delete();
		DB::table('tblsurveys')->where('qid','=','B1')->delete();
		DB::table('tblsurveys')->where('qid','=','B2')->delete();
		DB::table('tblsurveys')->where('qid','=','B3')->delete();
		DB::table('tblsurveys')->where('qid','=','B4')->delete();
		DB::table('tblsurveys')->where('qid','=','B5')->delete();
		DB::table('tblsurveys')->where('qid','=','C1')->delete();
		DB::table('tblsurveys')->where('qid','=','C2')->delete();
		DB::table('tblsurveys')->where('qid','=','C3')->delete();
		DB::table('tblsurveys')->where('qid','=','C4')->delete();
		DB::table('tblsurveys')->where('qid','=','C5')->delete();
		DB::table('tblsurveys')->where('qid','=','D1')->delete();
		DB::table('tblsurveys')->where('qid','=','D2')->delete();
		DB::table('tblsurveys')->where('qid','=','D3')->delete();
		DB::table('tblsurveys')->where('qid','=','D4')->delete();
		DB::table('tblsurveys')->where('qid','=','D5')->delete();
		DB::table('tblsurveys')->where('qid','=','E1')->delete();
		DB::table('tblsurveys')->where('qid','=','E2')->delete();
		DB::table('tblsurveys')->where('qid','=','E3')->delete();
		DB::table('tblsurveys')->where('qid','=','E4')->delete();
		DB::table('tblsurveys')->where('qid','=','F1')->delete();
		DB::table('tblsurveys')->where('qid','=','F2')->delete();
		DB::table('tblsurveys')->where('qid','=','F3')->delete();
		DB::table('tblsurveys')->where('qid','=','F4')->delete();
		DB::table('tblsurveys')->where('qid','=','F5')->delete();
	}


}
