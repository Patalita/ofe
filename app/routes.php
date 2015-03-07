<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
//URI,controller,function
//instructors routes
//get - to view page
//post - to submit

//login routes


Route::get('login',array('as'=>'login','uses'=>'HomeController@showlogin'));
Route::post('syslogin',array('as'=>'syslogin','uses'=>'HomeController@checkuser'));
Route::get('showBG/{subjcode}',array('as'=>'DisplayGraph','uses'=>'resultsController@showbGraph'));
//home
Route::get('home',array('as'=>'home','uses'=>'HomeController@showHome'));

//instructor's routes
Route::get('instructors',array('as'=>'instructors','uses'=>'instructorsController@getIndex'));
Route::get('instructors/{id}',array('as'=>'insPage','uses'=>'instructorsController@viewIns'));
Route::get('instructors/new',array('as'=>'new_instructor','uses'=>'instructorsController@newIns'));
Route::post('instructors/create',array('uses'=>'instructorsController@createIns'));
Route::get('instructor/{id}/edit',array('as'=>'edit_instructor','uses'=>'instructorsController@editIns'));
Route::put('instructor/update',array('uses'=>'instructorsController@updateIns'));
Route::post('instructor/search',array('uses'=>'instructorsController@searchIns'));
Route::delete('instructor/{id}/delete',array('as'=>'del_instructor','uses'=>'instructorsController@delIns'));

//users' routes
Route::get('sysuser/{su_username}',array('as'=>'userPage','uses'=>'usersController@viewUser'));
Route::get('sysusers',array('as'=>'systemUsers','uses'=>'usersController@getIndex'));//
Route::post('sysuser/search',array('uses'=>'usersController@searchUser'));
Route::get('sysusers/new',array('as'=>'newuser','uses'=>'usersController@newUser'));
Route::post('sysusers/createnew',array('uses'=>'usersController@createUser'));
Route::get('sysuser/{su_username}/edit',array('as'=>'edit_user','uses'=>'usersController@editUser'));
Route::put('sysusers/update',array('uses'=>'usersController@updateUser'));
Route::delete('sysusers/delete',array('uses'=>'usersController@delUser'));

//students' routes
Route::get('students',array('as'=>'students','uses'=>'studentsController@getIndex'));
Route::post('students/search',array('uses'=>'studentsController@searchStudent'));
Route::get('student/{id}',array('as'=>'studentPage','uses'=>'studentsController@viewStudent'));
Route::delete('students/delete',array('uses'=>'studentsController@delStudent'));
Route::get('students/new',array('as'=>'new_student','uses'=>'studentsController@newStudent'));
Route::post('students/create',array('uses'=>'studentsController@createStudent'));
Route::get('student/{id}/edit',array('as'=>'edit_student','uses'=>'studentsController@editStudent'));
Route::put('students/update',array('uses'=>'studentsController@updateStudent'));

//subjects' routes
Route::get('subjects',array('as'=>'subjects','uses'=>'subjectsController@getIndex'));
Route::post('subjects/search',array('uses'=>'subjectsController@searchSubj'));
Route::get('subjects/{id}',array('as'=>'subjectPage','uses'=>'subjectsController@viewSubj'));
Route::delete('subjects/delete',array('uses'=>'subjectsController@delSubj'));
Route::get('subject/{id}/edit',array('as'=>'edit_subject','uses'=>'subjectsController@editSubj'));
Route::get('subject/new',array('as'=>'new_subject','uses'=>'subjectsController@newSubj'));
Route::post('subject/create',array('uses'=>'subjectsController@createSubj'));
Route::put('subject/update',array('uses'=>'subjectsController@updateSubj'));
//survey routes
Route::get('survey',array('as'=>'survey','uses'=>'surveyController@getIndex'));
Route::post('survey/search',array('uses'=>'surveyController@searchQ'));
Route::get('survey/{qid}/edit',array('as'=>'editquestion','uses'=>'surveyController@editQ'));

//from yani
Route::get('logins', array('as'=>'loginpage','uses' => 'StudentController@showLogins'));
Route::post('logins', array('uses' => 'StudentController@showLogins'));

Route::post('checks', array('uses' => 'StudentController@checkStud'));
Route::get('checks', array('as'=>'checkuser','uses' => 'StudentController@checkStud'));


Route::get('resultS/{subj_code}',function($subj_code)
{


   return Redirect::to('resultSsurvey')->with('subj_code',$subj_code);
  // return Redirect::to('checks')->with('errMsg', $errMsg);

});




Route::get('stud_ins/{subj_code}',function($subj_code)
{

		$ins_id = DB::table('tblsubjects')->where('subj_code', $subj_code)->pluck('subj_inscode');			  
		
		$instructor = DB::table('tblinstructors')
					->select('ins_fname', 'ins_lname','ins_id')
					->where('ins_id', $ins_id)
					->get();
		
		return json_encode($instructor);	
   
        		

});

Route::post('forms', array('uses' => 'StudentController@showforms'));
Route::get('forms', array('uses' => 'StudentController@showforms'));

Route::get('homes', array('uses' => 'StudentController@showhomestud'));
Route::post('homes', array('uses' => 'StudentController@showhomestud'));

Route::get('surveyA', array('uses' => 'StudentController@showsurveyA'));
Route::post('surveyA', array('uses' => 'StudentController@showsurveyA'));

Route::get('results', array('uses' => 'StudentController@seeResults'));
Route::post('results', array('uses' => 'StudentController@seeResults'));

Route::get('surveyB', array('uses' => 'StudentController@showsurveyB'));
Route::post('surveyB', array('uses' => 'StudentController@showsurveyB'));

Route::get('surveyC', array('uses' => 'StudentController@showsurveyC'));
Route::post('surveyC', array('uses' => 'StudentController@showsurveyC'));

Route::get('surveyD', array('uses' => 'StudentController@showsurveyD'));
Route::post('surveyD', array('uses' => 'StudentController@showsurveyD'));

Route::get('surveyE', array('uses' => 'StudentController@showsurveyE'));
Route::post('surveyE', array('uses' => 'StudentController@showsurveyE'));

Route::get('surveyF', array('uses' => 'StudentController@showsurveyF'));
Route::post('surveyF', array('uses' => 'StudentController@showsurveyF'));

Route::get('studcomment', array('uses' => 'StudentController@showStudcomment'));
Route::post('studcomment', array('uses' => 'StudentController@showStudcomment'));

Route::get('studsave', array('uses' => 'StudentController@showStudsaveterm'));
Route::post('studsave', array('uses' => 'StudentController@showStudsaveterm'));

Route::get('studconfirm', array('uses' => 'StudentController@studconfirm'));
Route::post('studconfirm', array('uses' => 'StudentController@studconfirm'));

Route::get('changePass', array('uses' => 'StudentController@studchangePassword'));
Route::post('changePass', array('uses' => 'StudentController@studchangePassword'));

Route::post('studVerify', array('uses' => 'StudentController@studVerifyPassword'));
Route::post('studVerify', array('uses' => 'StudentController@studVerifyPassword'));

//updates feb 13
Route::get('displaySubjects', array('as'=>'showSubjects','uses' => 'resultsController@showSubjectlist'));
Route::post('ins_subjectlist', array('uses' => 'StudentController@showSubjectlist'));
Route::get('displayRes/{subjcode}',array('as'=>'resultsPage','uses'=>'resultsController@getIndex'));
Route::get('displayRes2/{subjcode}',array('as'=>'resultsPage2','uses'=>'resultsController@getIndex2'));
Route::get('displayRes3/{subjcode}',array('as'=>'resultsPage3','uses'=>'resultsController@getIndex3'));

Route::get('showX',array('uses'=>'resultsController@showEx'));

