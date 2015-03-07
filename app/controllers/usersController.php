<?php
class usersController extends BaseController{

	public function getIndex(){	
                $lvl = Session::get('su_alevel');
        if($lvl!=1){
            return Redirect::route('home');

        }
		return View::make('users.index')
			->with('title','System Users')
			->with('sysuser',tblsysuser::orderBy('su_lname','ASC')->get()); 
		
	}//end of getIndex

	Public function newUser(){
		return View::make('users.new')
			->with('title','Add New user');


	}

	public function viewUser($su_username)
    {
       $data['su_username'] = tblsysuser::find($su_username);

        return View::make('users.view')
        	->with('title','Users Page')
        	->with('sysuser',$data['su_username']);
    }


    public function searchUser(){
   	$q = Input::get('searchKW');

    $searchTerms = explode(',', $q);

    $query = DB::table('tblsysusers');

    foreach($searchTerms as $term)
    {
        $query->where('su_username', 'LIKE', '%'. trim($term) .'%')
             ->orWhere('su_lname', 'LIKE', '%'. trim($term) .'%')
 			->orWhere('su_fname', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('su_mname', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('su_alevel', 'LIKE', '%'. trim($term) .'%');
    }

    $results = $query->get();
    $count = count($results);

    return View::make('users.index')
    ->with('title','Search Results')
    ->with('sysuser', $results)
    ->with('num_rows',$count);
	}


	public function createUser()
    {

         $check=DB::table('tblsysusers')
            ->where('su_username', '=',Input::get('su_username'))
            ->orWhere(function($query)
            {
                $query->where('su_lname', '=',Input::get('su_lname') )
                      ->where('su_fname', '=', Input::get('su_fname'));
            })
            ->get();



        $count=count($check);

        if($count>=1){

            return Redirect::back()->withInput()
            ->with('message','User Account record already exists!');

        }else{



        	$validator = tblsysuser::validate(Input::all());

        	    if($validator->fails())
        	    	
        	        {
        	        return Redirect::back()->withInput()->withErrors($validator);
        	       }
        	 
        					$newUser = new tblsysuser();//instantiate
        	    		
        	    			$newUser->su_username=Input::get('su_username');
        	    			$newUser->su_password=Input::get('su_password');
        	    			$newUser->su_lname=Input::get('su_lname');
        	    			$newUser->su_fname=Input::get('su_fname');
        	    			$newUser->su_mname=Input::get('su_mname');
        	    			$newUser->su_alevel=Input::get('su_alevel');
        	    			$newUser->su_deptid=Input::get('su_deptid');
        	    			$newUser->su_online='N';
        	    			$newUser->save();

        	    		return Redirect::to('sysusers')
        	   			->with('message','User Account was created successfully!');
                    }

	}
 	
 	  	public function editUser($su_username)
        {


       $data['su_username'] = tblsysuser::find($su_username);

        return View::make('users.edit')
        	->with('title','Edit User')
        	->with('sysuser',$data['su_username']);

    }



     public function updateUser(){
    	$su_username = Input::get('su_username');

    	 $validator = tblsysuser::validate(Input::all());

	    if($validator->fails()){
	    	return Redirect::back()->withInput()->withErrors($validator);	
	    }else{


	    	tblsysuser::where('su_username',$su_username)->update(array('su_lname'=>Input::get('su_lname'),
	    			'su_fname'=>Input::get('su_fname'),
	    			'su_mname'=>Input::get('su_mname'),
	    			'su_alevel'=>Input::get('su_alevel'),
	    			'su_deptid'=>Input::get('su_depitd'),
	    			'su_password'=>Input::get('su_password')


	    		));

	    	//use route name and pass the parameter
	    	//instead of Redirect::to use Redirect::route instead
	    	return Redirect::route('userPage',$su_username)
	    			->with('message','User Account was updated successfully!');
	    }
    }

     public function delUser(){
    	tblsysuser::find(Input::get('su_username'))->delete();
    	return Redirect::to('sysusers')
	    			->with('message','User Account was deleted successfully!');

    }

}