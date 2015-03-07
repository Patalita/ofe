<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showlogin(){
		return View::make('login');

	}

	public function checkuser(){



		   $check=DB::table('tblsysusers')
            ->where('su_username', '=',Input::get('su_username'))
     		->where('su_password', '=',Input::get('su_password'))
            ->get();



        $count=count($check);

        if($count==0){

            return Redirect::back()->withInput()
            ->with('message','Account does not exists!');

        }else{

        	
        
        	Session::start();
         			
		    foreach ($check as $field){	
		    	Session::put('su_fname',$field->su_fname);		    
				Session::put('su_lname', $field->su_lname);
			    Session::put('su_alevel',$field->su_alevel);
						
			}	
        	
        	return Redirect::to('home');
        		

        }
	}

	public function showHome(){


		return View::make('home')
		->with('title','Home Page')
		->with('su_fname',Session::get('su_fname'))
		->with('su_lname',Session::get('su_lname'))
		->with('su_alevel',Session::get('su_alevel'));
	}

}
