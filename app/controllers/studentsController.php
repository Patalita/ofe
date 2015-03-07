<?php
class studentsController extends BaseController{
	

	public function getIndex(){	

   /* DB::table('users')
    ->join('phone', 'users.id', '=', 'phone.user_id')
    ->get(array('users.email', 'phone.number'));
*/

    $students = DB::table('tblstudents')
    ->join('tblcourse','tblstudents.stu_course','=','tblcourse.course_id')
    ->join('tblstatus','tblstudents.stu_status','=','tblstatus.scode')
   // ->where('tblstudents.stu_lname','=','Canen')
    ->get(array('tblstudents.stu_id','tblstudents.stu_lname','tblstudents.stu_fname','tblstudents.stu_mname','tblcourse.desc','tblstudents.stu_year','tblstudents.stu_section','tblstatus.sdesc'));
    $count = count($students);
		return View::make('students.index')
			->with('title','Students')
			->with('students',$students)
			->with('num_rows',$count);
					
	}//end of getIndex


	 public function searchStudent(){


   	$q = Input::get('searchKW');

    $searchTerms = explode(',', $q);

    $query = DB::table('tblstudents')
    ->join('tblcourse','tblstudents.stu_course','=','tblcourse.course_id')
    ->join('tblstatus','tblstudents.stu_status','=','tblstatus.scode');

    foreach($searchTerms as $term)
    {
        $query->where('tblstudents.stu_id', 'LIKE', '%'. trim($term) .'%')
             ->orWhere('tblstudents.stu_lname', 'LIKE', '%'. trim($term) .'%')
 			->orWhere('tblstudents.stu_fname', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('tblstudents.stu_mname', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('tblcourse.desc', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('stu_year', 'LIKE', '%'. trim($term) .'%')
    		->orWhere('tblstatus.sdesc', 'LIKE','%'. trim($term) .'%');
    }
    //displays only one instance of id

    $results = $query->get(array('tblstudents.stu_id','tblstudents.stu_lname','tblstudents.stu_fname','tblstudents.stu_mname','tblcourse.desc','tblstudents.stu_year','tblstudents.stu_section','tblstatus.sdesc'));
    $count = count($results);
	$results = $query->simplePaginate(10);

    return View::make('students.index')
    ->with('title','Search Results')
    ->with('students', $results)
    ->with('num_rows',$count);

    }


   	public function viewStudent($id)
    {


     $query = DB::table('tblstudents')
    ->join('tblcourse','tblstudents.stu_course','=','tblcourse.course_id')
    ->join('tblstatus','tblstudents.stu_status','=','tblstatus.scode')
	->where('tblstudents.stu_id', 'LIKE', '%'. $id .'%')
	->get(array('tblstudents.stu_id','tblstudents.stu_lname','tblstudents.stu_fname','tblstudents.stu_mname','tblcourse.desc','tblstudents.stu_year','tblstudents.stu_section','tblstatus.sdesc'));
       /*$data['id'] = tblstudent::find($id);*/
      
       //result is an array
       $nr = count($query);
        return View::make('students.view')
        	->with('title','Student Page')
        	->with('students',$query)
        	->with('nr',$nr);

    }

     public function delStudent(){
    	tblstudent::find(Input::get('stu_id'))->delete();
    	return Redirect::to('students')
	    			->with('message','Student was deleted successfully!');

    }
        public function newStudent()
    {
    	return View::make('students.new')
    		->with('title','Add New Student');
    }

     public function createStudent()
    {

        $check=DB::table('tblstudents')
            ->where('stu_id', '=',Input::get('stu_id'))
            ->orWhere(function($query)
            {
                $query->where('stu_lname', '=',Input::get('stu_lname') )
                      ->where('stu_fname', '=', Input::get('stu_fname'));
            })
            ->get();



        $count=count($check);

        if($count>=1){

            return Redirect::back()->withInput()
            ->with('message','Student record already exists!');

        }else{

        $validator = tblstudent::validate(Input::all());

        if($validator->fails())
            
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
     
                    $newStudent = new tblstudent();//instantiate
                
                    $newStudent->stu_id=Input::get('stu_id');
                    $newStudent->stu_lname=Input::get('stu_lname');
                    $newStudent->stu_fname=Input::get('stu_fname');
                    $newStudent->stu_mname=Input::get('stu_mname');
                    $newStudent->stu_course=Input::get('stu_course');
					$newStudent->stu_year=Input::get('stu_year'); 
                    $newStudent->stu_section=Input::get('stu_section'); 
                    $newStudent->stu_sem=Input::get('stu_sem'); 
                    $newStudent->stu_sy=Input::get('stu_sy'); 
					$newStudent->stu_status=Input::get('stu_status');                   
					$newStudent->stu_pword=Input::get('stu_id');
					$newStudent->stu_online='N';
                    $newStudent->save();



                    //register student
                $checkR=DB::table('tblsubjects')
            ->join('tblcourse','tblsubjects.subj_course','=','tblcourse.course_id')
            ->join('tbldepartment','tblcourse.dept_id','=','tbldepartment.dept_id')
                    ->where('subj_course','=',Input::get('stu_course'))
                    ->where('subj_year','=',Input::get('stu_year'))
                    ->where('subj_section','=',Input::get('stu_section'))
                    ->where('subj_sem','=',Input::get('stu_sem'))
                    ->where('subj_sy','=',Input::get('stu_sy'))
                    ->get();

            
            $countR=count($checkR);//add to tblresults

            if($countR!=0){

                foreach($checkR as $item){
                    $newEntry = new tblresult();
                    $newEntry->stu_id=Input::get('stu_id');
                    $newEntry->evaluated='N';
                    $newEntry->course_id=Input::get('stu_course');
                    $newEntry->dept_id=$item->dept_id;
                    $newEntry->subj_code=$item->subj_code;
                    $newEntry->subj_year=$item->subj_year;
                    $newEntry->subj_section=$item->subj_section;
                    $newEntry->semester=$item->subj_sem;
                    $newEntry->school_year=$item->subj_sy;
                    $newEntry->ins_code=$item->subj_inscode;
                    $newEntry->save();
                }




            }

                    return Redirect::to('students')
                    ->with('message','Student was created successfully!'.$countR);
                   

    }}

     public function editStudent($id)
    {
       $data['id'] = tblstudent::find($id);

        return View::make('students.edit')
        	->with('title','Edit Student Profile')
        	->with('students',$data['id']);

    }

    public function updateStudent(){
    	$id = Input::get('stu_id');

    	 $validator = tblstudent::validate(Input::all());

	    if($validator->fails()){
	    	return Redirect::back()->withInput()->withErrors($validator);	
	    }else{


	    	tblstudent::where('stu_id',$id)->update(array('stu_lname'=>Input::get('stu_lname'),
	    			'stu_fname'=>Input::get('stu_fname'),
	    			'stu_mname'=>Input::get('stu_mname'),
	    			'stu_course'=>Input::get('stu_course'),
	    			'stu_year'=>Input::get('stu_year'),
	    			'stu_status'=>Input::get('stu_status')
	    	
	    		));

	    	//use route name and pass the parameter
	    	//instead of Redirect::to use Redirect::route instead
	    	return Redirect::route('studentPage',$id)
	    			->with('message','Student information was updated successfully!');
	    }
    }


}