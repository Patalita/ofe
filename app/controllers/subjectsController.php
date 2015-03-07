<?php
class subjectsController extends BaseController{


	public function getIndex(){	

   /* DB::table('users')
    ->join('phone', 'users.id', '=', 'phone.user_id')
    ->get(array('users.email', 'phone.number'));
*/
    //if user not admin redirecto to home
                $lvl = Session::get('su_alevel');
        if($lvl!=1){
            return Redirect::route('home');}

    $subjects = DB::table('tblsubjects')
    ->join('tblcourse','tblsubjects.subj_course','=','tblcourse.course_id')
    ->join('tblinstructors','tblsubjects.subj_inscode','=','tblinstructors.ins_id')
    ->get(array('tblsubjects.subj_code','tblsubjects.subj_desc','tblsubjects.subj_sem','tblsubjects.subj_sy','tblinstructors.ins_lname','tblinstructors.ins_fname','tblcourse.desc'));
    $count = count($subjects);
		return View::make('subjects.index')
			->with('title','Subjects')
			->with('subjects',$subjects)
			->with('num_rows',$count);
					
	}//end of getIndex


	 public function searchSubj(){


   	$q = Input::get('searchKW');

    $searchTerms = explode(',', $q);

    $query = DB::table('tblsubjects')
    ->join('tblcourse','tblsubjects.subj_course','=','tblcourse.course_id')
    ->join('tblinstructors','tblsubjects.subj_inscode','=','tblinstructors.ins_id');

    foreach($searchTerms as $term)
    {
        $query->where('tblsubjects.subj_code', 'LIKE', '%'. trim($term) .'%')
             ->orWhere('tblsubjects.subj_desc', 'LIKE', '%'. trim($term) .'%')
 			->orWhere('tblsubjects.subj_sem', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('tblsubjects.subj_sy', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('tblcourse.desc', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('tblinstructors.ins_fname', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('tblinstructors.ins_lname', 'LIKE', '%'. trim($term) .'%');
    }
    //displays only one instance of id

    $results = $query->get(array('tblsubjects.subj_code','tblsubjects.subj_desc','tblsubjects.subj_sem','tblsubjects.subj_sy','tblinstructors.ins_lname','tblinstructors.ins_fname','tblcourse.desc'));
    $count = count($results);
	$results = $query->simplePaginate(10);

    return View::make('subjects.index')
    ->with('title','Search Results')
    ->with('subjects', $results)
    ->with('num_rows',$count);

    }

    public function viewSubj($id)
    {

 
    $query = DB::table('tblsubjects')
    ->join('tblcourse','tblsubjects.subj_course','=','tblcourse.course_id')
    ->join('tblinstructors','tblsubjects.subj_inscode','=','tblinstructors.ins_id')
    ->where('tblsubjects.subj_code', 'LIKE', '%'. $id .'%')
    ->get(array('tblsubjects.subj_code','tblsubjects.subj_desc','tblsubjects.subj_sem','tblsubjects.subj_sy','tblinstructors.ins_lname','tblinstructors.ins_fname','tblcourse.desc'));
       
      
       //result is an array
       $nr = count($query);
        return View::make('subjects.view')
        	->with('title','Subject Page')
        	->with('subjects',$query)
        	->with('nr',$nr);

    }
    public function delSubj(){
    	tblsubject::find(Input::get('subj_code'))->delete();
    	return Redirect::to('subjects')
	    			->with('message','Subject was deleted successfully!');

    }
         public function editSubj($id)
    {
       $data['id'] = tblsubject::find($id);

        return View::make('subjects.edit')
        	->with('title','Edit Subject')
        	->with('subjects',$data['id']);

    }
         public function newSubj()
    {
    	return View::make('subjects.new')
    		->with('title','Add New Subject');
    }
    public function createSubj()
    {


        $check=DB::table('tblsubjects')
            ->where('subj_code', '=',Input::get('subj_code'))->get();


        $count=count($check);

        if($count>=1){

            return Redirect::back()->withInput()
            ->with('message','Subject already exists!');

        }else{

    
        $validator = tblsubject::validate(Input::all());

        if($validator->fails())
            
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
     
                    $newSubj = new tblsubject();//instantiate
                
                    $newSubj->subj_code=Input::get('subj_code');
                    $newSubj->subj_desc=Input::get('subj_desc');
                    $newSubj->subj_year=Input::get('subj_year');
                    $newSubj->subj_section=Input::get('subj_section');
                    $newSubj->subj_sem=Input::get('subj_sem');
                    $newSubj->subj_sy=Input::get('subj_sy');
                    $newSubj->subj_inscode=Input::get('subj_inscode');
                    $newSubj->subj_course=Input::get('subj_course');
                    $newSubj->save();

                return Redirect::to('subjects')
                    ->with('message','Subject was created successfully!');

    }}
    public function updateSubj(){
    	$id = Input::get('subj_code');

    	 $validator = tblsubject::validate(Input::all());

	    if($validator->fails()){
	    	return Redirect::back()->withInput()->withErrors($validator);	
	    }else{


	    	tblsubject::where('subj_code',$id)->update(array('subj_desc'=>Input::get('subj_desc'),
	    			'subj_sem'=>Input::get('subj_sem'),
	    			'subj_sy'=>Input::get('subj_sy'),
	    			'subj_inscode'=>Input::get('subj_inscode'),
	    			'subj_course'=>Input::get('subj_course')
	    	
	    	
	    		));

	    	//use route name and pass the parameter
	    	//instead of Redirect::to use Redirect::route instead
	    	return Redirect::route('subjectPage',$id)
	    			->with('message','Subject was updated successfully!');
	    }
    }

}
