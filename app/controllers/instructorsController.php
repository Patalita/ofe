<?php
class instructorsController extends BaseController{
	

	public function getIndex(){	
                        $lvl = Session::get('su_alevel');
        if($lvl!=1){
            return Redirect::route('home');}

            
		return View::make('instructors.index')
			->with('title','Instructors')
			//->with('instructors',tblinstructor::all()); display all

			->with('instructors',tblinstructor::orderBy('ins_lname','ASC')->get()); //instructors is a variable orderBy not order_by
		
	}//end of getIndex

	public function viewIns($id)
    {
       $data['id'] = tblinstructor::find($id);

        return View::make('instructors.view')
        	->with('title','Instructor Page')
        	->with('instructor',$data['id']);
    }

    public function newIns()
    {
    	return View::make('instructors.new')
    		->with('title','Add New Instructor');
    }
//with validation
   

    public function createIns()
    {
    	

    $check=DB::table('tblinstructors')
            ->where('ins_id', '=',Input::get('ins_id'))
            ->orWhere(function($query)
            {
                $query->where('ins_lname', '=',Input::get('ins_lname') )
                      ->where('ins_fname', '=', Input::get('ins_fname'));
            })
            ->get();



        $count=count($check);

        if($count>=1){

            return Redirect::back()->withInput()
            ->with('message','Instructor record already exists!');

        }else{


            	    $validator = tblinstructor::validate(Input::all());

            	    if($validator->fails())
            	    	
            	    {
            	        return Redirect::back()->withInput()->withErrors($validator);
            	    }
            	 
            					$newIns = new tblInstructor();//instantiate
            	    		
            	    			$newIns->ins_id=Input::get('ins_id');
            	    			$newIns->ins_lname=Input::get('ins_lname');
            	    			$newIns->ins_fname=Input::get('ins_fname');
            	    			$newIns->ins_mname=Input::get('ins_mname');
            	    			$newIns->ins_empstatus=Input::get('ins_empstatus');
            	    			$newIns->ins_password=Input::get('ins_id');
            	    			$newIns->ins_online='N';//default value
            	    			$newIns->save();

            	    		return Redirect::to('instructors')
            	    			->with('message','Instructor was created successfully!');
            }

	}


  	public function editIns($id)
    {
       $data['id'] = tblinstructor::find($id);

        return View::make('instructors.edit')
        	->with('title','Edit Instructor')
        	->with('instructor',$data['id']);

    }
    public function updateIns(){

        $oln = Input::get('oldln');
        $ofn = Input::get('oldfn');

        if(($oln==Input::get('ins_lname')) && ($ofn==Input::get('ins_fname'))){

            $change =0;//no change

        }else{

            $change=1;//changes made in last first name

        }


            $check=DB::table('tblinstructors');
                      $check->where('ins_lname', '=',Input::get('ins_lname'))
                            ->where('ins_fname', '=', Input::get('ins_fname'));
            $result=$check->get();


        $count = count($result);

        if(($count==1)&&($change==1)){

            return Redirect::back()->withInput()
            ->with('message','Instructor record already exists!');

        }else{

    	$id = Input::get('ins_id');

    	 $validator = tblinstructor::validate(Input::all());

	    if($validator->fails()){
	    	return Redirect::back()->withInput()->withErrors($validator);	
	    }else{


	    	tblinstructor::where('ins_id',$id)->update(array('ins_lname'=>Input::get('ins_lname'),
	    			'ins_fname'=>Input::get('ins_fname'),
	    			'ins_mname'=>Input::get('ins_mname'),
	    			'ins_empstatus'=>Input::get('ins_empstatus')
	    		));

	    	//use route name and pass the parameter
	    	//instead of Redirect::to use Redirect::route instead
	    	return Redirect::route('insPage',$id)
	    			->with('message','Instructor information was updated successfully!');
	    }
    }}//end of updateIns()

    public function delIns(){
    	tblinstructor::find(Input::get('ins_id'))->delete();
    	return Redirect::to('instructors')
	    			->with('message','Instructor was deleted successfully!');

    }

    public function searchIns(){


   	$q = Input::get('searchKW');

    $searchTerms = explode(',', $q);

    $query = DB::table('tblinstructors');

    foreach($searchTerms as $term)
    {
        $query->where('ins_id', 'LIKE', '%'. $term .'%')
             ->orWhere('ins_lname', 'LIKE', '%'. $term .'%')
 			->orWhere('ins_fname', 'LIKE', '%'. $term .'%')
    		->orWhere('ins_mname', 'LIKE', '%'. $term .'%')
    		->orWhere('ins_empstatus', 'LIKE', '%'. $term .'%');
    }

    $results = $query->get();
    $count = count($results);
	$results = $query->simplePaginate(10);
   /*	 $q = trim(Input::get('searchKW'));

   		
     $results = DB::table('tblinstructors')->where('ins_id', 'LIKE', '%'. $q .'%')
     		->orWhere('ins_lname', 'LIKE', '%'. $q .'%')
 			->orWhere('ins_fname', 'LIKE', '%'. $q .'%')
    		->orWhere('ins_mname', 'LIKE', '%'. $q .'%')
    		->orWhere('ins_empstatus', 'LIKE', '%'. $q .'%')
    		->get();
    
	*/

    return View::make('instructors.index')
    ->with('title','Search Results')
    ->with('instructors', $results)
    ->with('num_rows',$count);



    }


   

}


