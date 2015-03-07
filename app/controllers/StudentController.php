<?php

class StudentController extends BaseController {

	/*hec
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method c
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	public function showLogins()
	{
        if (Session::has('loginE')){
		   $data['loginE']=Session::get('loginE');
		}else {	
	       $data['loginE']=null;
		}
        Session::flush();
		return( View::make( 'loginstudent')->with('data',$data));
	}

	
	public function checkStud(){
		Session::start();
		/*
		if (Session::has('username')){
		  $username = Session::get('username');
		  $password= Session::get( 'password' );
		} else {
			$username= Input::get( 'username' );
			$password= Input::get( 'password' );
		}
	
		
		echo $username;
		echo $password;
			*/
			
		$studuser= DB::table('tblstudents')
		              ->where('stu_id', Input::get( 'username' ))
					  ->where('stu_pword', Input::get( 'password' ))
					  ->get();
					 
		
		$insuser = DB::table('tblinstructors')
					->join('tblsubjects','tblinstructors.ins_id','=','tblsubjects.subj_inscode')
					->join('tblcourse','tblsubjects.subj_course','=','tblcourse.course_id')
					->join('tbldepartment','tblcourse.dept_id','=','tbldepartment.dept_id')
					->where('tblinstructors.ins_id', '=', Input::get( 'username' ))
					->where('tblinstructors.ins_password', '=', Input::get( 'password' ))
					->first();
					//->get(array('tblinstructors.ins_fname','tblsubjects.subj_course','tblsubjects.subj_sy','tblsubjects.subj_section','tblsubjects.subj_sem','tblcourse.dept_id','tbldepartment.dept_name'));
	
				Session::put('username',Input::get( 'username' ));
				Session::put('password',Input::get( 'password' ));
				
	    if(count($studuser) > 0) {	//checking if the student is registered		
             foreach ($studuser as $r3){
				Session::put('first_name', $r3->stu_fname);			    			
			    Session::put('accesslevel', 4);
				Session::put('course_id',$r3->stu_course);
				Session::put('student_id',$r3->stu_id);
				Session::put('loginE', null); 
			}		
         }
		 elseif(count($insuser) > 0){		
		
			    foreach ($insuser as $key=>$value){
					if($key=='ins_fname') { Session::put('first_name',$value); }
					/*
				    if($key=='subj_course') { Session::put('subj_course',$value); }
					if($key=='subj_sy') { Session::put('subj_sy',$value); }
					if($key=='subj_section') { Session::put('subj_section',$value); }
					if($key=='subj_sem') { Session::put('subj_sem',$value); }
					if($key=='subj_year') { Session::put('subj_year',$value); }
					*/
				
				}
				
			    Session::put('accesslevel', 3);
				Session::put('loginE', null);
											
		} else{
            Session::put('loginE', 'Please enter correct username or password');    
		}	
			
		
		$data = Session::all();
		$aclevel = Session::get('accesslevel');
		
        		
		if (Session::has('first_name')){	    
            if ($aclevel==4){  
					
				$subject = DB::table('tblsubjects')
				          ->where('subj_course', Session::get('course_id'))
						  ->get();
	 		
                foreach($subject as $s){
				   $d['sub'][$s->subj_code]=$s->subj_desc;
				}	
              /////////////////////////////////////////////
				$ins = DB::table('tblsubjects')
						->join('tblinstructors', function($join)
						{
						$join->on('tblsubjects.subj_inscode', '=', 'tblinstructors.ins_id')
						->where('tblsubjects.subj_course', '=', Session::get('course_id'));
						})
						->get();
						
				foreach($ins as $i){
				   $y[$i->ins_id]= $i->ins_fname.' '.$i->ins_lname;				
				}
				
				$d['ins']= array_unique($y); 
				
				 
				 foreach (range('A', 'F') as $l) {
					Session::forget("q$l");
                     for ($x=1; $x<=10; $x++){
					    
						if(Session::has($l.$x)) {Session::forget($l.$x);}
						
					}	
				}
				
				
				 
				///////////////////////////////////
				
				return( View::make( 'stud_form' )->with('data',$d));
                //print_r(Session::all());				
						             
			} else {			
				return( View::make( 'home_'.$aclevel )->with('data',$data));
			}
		}	
		else {
		    return( View::make( 'loginstudent')->with('data',$data));
		}
	  
    }
	
	public function showforms()
	{	
	   
	   If(Input::get('subname')=='xxx' || Input::get('insname')=='xxx'){	   
			$errMsg = 'Please input correct subject or instructor';
			return Redirect::to('checks')->with('errMsg', $errMsg);
			
	   }else{
	       	
				$subj = DB::table('tblsubjects')
				          ->where('subj_course', Session::get('course_id'))
						  ->get();
	 			
                $ins = DB::table('tblsubjects')
						->join('tblinstructors', function($join)
						{
						$join->on('tblsubjects.subj_inscode', '=', 'tblinstructors.ins_id')
						->where('tblsubjects.subj_course', '=', Session::get('course_id'));
						})
						->get();
		   
                foreach($subj as $s){
				   $sub[$s->subj_code]=$s->subj_desc;
				}
								
				foreach($ins as $i){
				   $ind[$i->ins_id]= $i->ins_fname.' '.$i->ins_lname;				
				}
				
				$in = array_unique($ind);
				
			Session::put('sub_code',Input::get('subname'));
			Session::put('ins_id',Input::get('insname'));
			Session::put('subname',$sub[Input::get('subname')]);
			Session::put('insname',$in[Input::get('insname')]);
			
			$ifreg = DB::table('tblresults')
					->where('stu_id', Session::get('student_id'))
					->where('subj_code', Session::get('sub_code'))
					->where('ins_code', Session::get('ins_id'))
					->get();
            	 
			if(count($ifreg) == 0){ 
			  $errMsg = 'Please input correct instructor for the subject';
			  return Redirect::to('checks')->with('errMsg', $errMsg);
			  
			}else {
			
			   foreach ($ifreg as $i) {
						$eval = $i->evaluated;			   
			   }
			   			     
				 if($eval==0) {
					return Redirect::to('homes');
				 }else {
				   $errMsg = 'You have already evaluated instructor for this subject';
			       return Redirect::to('checks')->with('errMsg', $errMsg);
				 }
	  
			}			
	   }

	}
	
	public function showhomestud()
	{
	   $data['first_name'] = Session::get('first_name');
	   return( View::make( 'home_4' )->with('data',$data));
	}
	
	public function showsurveyA()
	{
		
	   $count= DB::table('tblsurveys')->where('qgroup', 'A')->count();
	  
       
	   if ($count > 1){	   
			Session::put('countA',$count);	          	   
			$data['questions'] = DB::table('tblsurveys')->where('qgroup', 'A')->get();
			$data['qrp_desc'] = DB::table('tblgroup')->where('grp_id', 'A')->pluck('grp_desc');
			$data['qrp_id'] = 'A';

			return( View::make('survey')->with('data',$data));
			
		}else{
			return Redirect::to('surveyB');
        }				
	   
	}
	
	public function showsurveyB()
	{
	   //print_r(Input::all());
	
	   $count= DB::table('tblsurveys')->where('qgroup', 'B')->count();
	       
	   if ($count > 1){	   
			Session::put('countB',$count);	          	   
			$data['questions'] = DB::table('tblsurveys')->where('qgroup', 'B')->get();
			$data['qrp_desc'] = DB::table('tblgroup')->where('grp_id', 'B')->pluck('grp_desc');
			$data['qrp_id'] = 'B';
			

			return( View::make('survey')->with('data',$data));
			
		}else{
			return Redirect::to('surveyC');
        }	   
	}
	
	public function showsurveyC()
	{
	   
	   $count= DB::table('tblsurveys')->where('qgroup', 'C')->count();
	  
       
	   if ($count > 1){	   
			Session::put('countC',$count);	          	   
			$data['questions'] = DB::table('tblsurveys')->where('qgroup', 'C')->get();
			$data['qrp_desc'] = DB::table('tblgroup')->where('grp_id', 'C')->pluck('grp_desc');
			$data['qrp_id'] = 'C';

			return( View::make('survey')->with('data',$data));
			
		}else{
			return Redirect::to('surveyD');
        }			
	   
	}
	public function showsurveyD()
	{
	   
	   $count= DB::table('tblsurveys')->where('qgroup', 'D')->count();
	  
       
	   if ($count > 1){	   
			Session::put('countD',$count);	          	   
			$data['questions'] = DB::table('tblsurveys')->where('qgroup', 'D')->get();
			$data['qrp_desc'] = DB::table('tblgroup')->where('grp_id', 'D')->pluck('grp_desc');
			$data['qrp_id'] = 'D';

			return( View::make('survey')->with('data',$data));
			
		}else{
			return Redirect::to('surveyE');
        }			
	   
	}
	public function showsurveyE()
	{
	   
	   $count= DB::table('tblsurveys')->where('qgroup', 'E')->count();
	  
       
	   if ($count > 1){	   
			Session::put('countE',$count);	          	   
			$data['questions'] = DB::table('tblsurveys')->where('qgroup', 'E')->get();
			$data['qrp_desc'] = DB::table('tblgroup')->where('grp_id', 'E')->pluck('grp_desc');
			$data['qrp_id'] = 'E';

			return( View::make('survey')->with('data',$data));
			
		}else{
			return Redirect::to('surveyF');
        }			
	   
	}
	
	public function showsurveyF()
	{
	   
	   $count= DB::table('tblsurveys')->where('qgroup', 'F')->count();
	  
       
	   if ($count > 1){	   
			Session::put('countF',$count);	          	   
			$data['questions'] = DB::table('tblsurveys')->where('qgroup', 'F')->get();
			$data['qrp_desc'] = DB::table('tblgroup')->where('grp_id', 'F')->pluck('grp_desc');
			$data['qrp_id'] = 'F';

			return( View::make('survey')->with('data',$data));
			
		}else{
			return Redirect::to('stucomment');
        }			
	   
	}
	
	public function seeResults(){
	
	 $answers = Input::all();
	 
	 foreach ($answers as $key=>$value) {
	    
	    Session::put($key,$value);
	    
	 }
	 
	     
	   $input[] = Input::all();	
  	   $in = $input[0];	      
       $group = $in['group'];
	   Session::put('q'.$group,$input[0]);
	   $count = Session::get('count'.$group);
	   
	   //print_r($in);
	   
	   $bg = array();	   
			for ($i=1;$i<=$count;$i++){
				if(isset($in[$group.$i])) $bg[$group.$i] = 'white';
				else $bg[$group.$i] = '#ff9999';
			}
			
		$input[1] = $bg;	   
	    
		/*************************************/
		
		$arrayG = DB::table('tblgroup')->lists('grp_id');
		
		
		while ($currentG = current($arrayG)) {
		if ($currentG == $group) {
           $nextGkey = key($arrayG)+1;
		}
		next($arrayG);
		}
		$lastGkey = count($arrayG)-1;
		
		if(isset($arrayG[$nextGkey]))$nextGvalue = $arrayG[$nextGkey];
		
	
			
		/**************************************/
	   $input[3] = $group;	 
	   $newArray = count(array_unique($input[1]));
		if ($newArray==1 && count($in)>2) {
             foreach ($bg as $key=>$value){
			    if($value=='white') {
					//echo 'go to b';					 
					$input[2] = '';
					
					if($lastGkey < $nextGkey){
						return Redirect::to('studcomment');
					}else {							
						 
						return Redirect::to('survey'.$nextGvalue);	
					}
				
				
				}else{
					$input[2] = 'Please answer all questions on this page.';	
					return Redirect::to('survey'.$group)->with('input', $input);
				}
			 }
				
		} else {	
			$input[2] = 'Please answer all questions on this page.';	
		    return Redirect::to('survey'.$group)->with('input', $input);
		  
		}
	 
	}	

	public function showStudcomment(){
	
	        //print_r(Session::All());
			return( View::make('studcomment'));
			
	
	}
	
	public function showStudsaveterm(){
	
	    /*
	       $record = DB::table('tblresults')
            ->where('stu_id', Session::get('student_id'))
			->where('subj_code', Session::get('sub_code'))
			->where('ins_code', Session::get('ins_id'))
            ->get();
				
		$update =array();
		foreach($record[0] as $key=>$value){
		    if($key='course_id') continue;
		    if (Session::has($key))  $update[$key] = Session::get($key); 
		
		}
		*/

		foreach (range('A', 'F') as $l) {
					
                for ($x=1; $x<=10; $x++){
					    
					if(Session::has($l.$x)) { $update[$l.$x]=Session::get($l.$x);}
						
			  }	
		}

		$update['comment']=Input::get('comment');
		$update['evaluated']=1;
	    
		//print_r($update);

		DB::table('tblresults')
            ->where('stu_id', Session::get('student_id'))
			->where('subj_code', Session::get('sub_code'))
			->where('ins_code', Session::get('ins_id'))
            ->update($update);
			
			
		
			
			return(View::make('saveterm'));
	
	    
	}
	
	public function studconfirm(){
	
	    
		$ans =  Input::get('radc');
			if($ans=='1'){
			   return Redirect::to('checks');
			} else {
			    return Redirect::to('logins');
			}		
	}
	
	public function studchangePassword(){
			
			return(View::make('changepass'));
			
	
	}
	
	public function studVerifyPassword() {
	  
	if(Input::get('npassword')==Input::get('cnpassword')){
		
		 
		 $rec = DB::table('tblstudents')
				->where('stu_id', Input::get('username'))
				->where('stu_pword', Input::get('opassword'))
				->get(); 
		
	
		if (count($rec) > 0){

             DB::table('tblstudents')
				->where('stu_id', Input::get('username'))
				->where('stu_pword', Input::get('opassword'))
				->update(array('stu_pword' => Input::get('npassword')));
				
				
                $loginE = 'You have successfully changed your password';	
				return Redirect::to('changePass')->with('loginE', $loginE);				
        }else {
		
             $loginE = "Username or Password doesn't exist";
			 return Redirect::to('changePass')->with('loginE', $loginE);	
		}		
	  
	  }else {
			$loginE = "New Password and Confirm Password dont match";
			 return Redirect::to('changePass')->with('loginE', $loginE);
	  
	  }

	}	
	
  public function showSubjectlist(){
	
	   return View::make('instructors.inssublist');
	
	}
	
}

