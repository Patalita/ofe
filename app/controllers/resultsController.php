<?php
class resultsController extends BaseController{
	public function getIndex($subjcode){
		Session::start();
		$resArr = array();
		$aveArr = array();
		$viArr = array();
		$vGroup=array();

		$sumArr = array();
				$mA=0;
				$mB=0;
				$mC=0;
				$mD=0;
				$mE=0;
				$mF=0;
		$query = DB::table('tblsurveys')
				->join('tblgroup','tblsurveys.qgroup','=','tblgroup.grp_id')
				->get();

		foreach($query as $fieldname){

			
					for($x=1;$x<=5;$x++){
						$res_wm=DB::table('tblresults')
						->select($fieldname->qid)
						//->select($fieldname->qid.' AS f1')
						->where('subj_code','=',$subjcode)
						->where('evaluated','=',1)
						->where($fieldname->qid,'=',$x)
						->get();

						switch($x){
							case 1:
							$count1 = count($res_wm);
							break;

							case 2:
							$count2 = count($res_wm);
							break;

							case 3:
							$count3 = count($res_wm);
							break;

							case 4:
							$count4 = count($res_wm);
							break;

							case 5:
							$count5 = count($res_wm);
							break;

							default:
							print_r("Error.");
						}//end of switch
		
					}//end of for loop

				$tc=$count1+$count2+$count3+$count4+$count5;

		if($tc==0){
			return Redirect::back();

		}
				$w=($count1*1)+($count2*2)+($count3*3)+($count4*4)+($count5*5);
				$m=$w/$tc;
				

				switch($fieldname->grp_id){
					case 'A':
						$mA = $mA+$m;
						$vGroup[0]=$fieldname->grp_desc;
						break;
					case 'B':
						$mB = $mB+$m;
						$vGroup[1]=$fieldname->grp_desc;
						break;
					case 'C':
						$mC = $mC+$m;
						$vGroup[2]=$fieldname->grp_desc;
						break;

					case 'D':
						$mD = $mD+$m;
						$vGroup[3]=$fieldname->grp_desc;
						break;
					case 'E':
						$mE = $mE+$m;
						$vGroup[4]=$fieldname->grp_desc;
						break;
					case 'F':
						$mF = $mF+$m;
						$vGroup[5]=$fieldname->grp_desc;
						break;
					default:
					print_r("Error");
				}

				if(($m>=0)&&($m<=1.21))
				{
					$vi = "Poor.";
				}
				elseif(($m>=1.22)&&($m<=2.21))
				{
					$vi = "Fair.";
				}
				elseif(($m>=2.22)&&($m<=3.21)){
					$vi = "Good.";
				}
				elseif(($m>=3.22)&&($m<=4.21)){
					$vi = "Very Good.";
				}
				elseif(($m>=4.22)&&($m<=5)){
					$vi="Excellent.";
				}
				else{
					$vi="Something went wrong here!.";
				}

				array_push($resArr,$fieldname->grp_desc.'-'.$fieldname->qid.'-'.$fieldname->qtext.'-'.$m.'-'.$vi);

		}//end of foreach($query)
				
				$aveArr[0]=number_format($mA/6,2);
				$aveArr[1]=number_format($mB/5,2);
				$aveArr[2]=number_format($mC/5,2);
				$aveArr[3]=number_format($mD/5,2);
				$aveArr[4]=number_format($mE/4,2);
				$aveArr[5]=number_format($mF/5,2);

				$ov = number_format(array_sum($aveArr)/(count($aveArr)),2);

					if(($ov>=0)&&($ov<=1.21)){
						$ovi="Poor";

					}elseif(($ov>=1.22)&&($ov<=2.21)){
						$ovi="Fair";

					}elseif(($ov>=2.22)&&($ov<=3.21)){
						$ovi="Good";

					}elseif(($ov>=3.22)&&($ov<=4.21)){
						$ovi="Very Good";

					}elseif(($ov>=4.22)&&($ov<=5)){
						$ovi="Excellent";

					}else{
						$ovi="Something went wrong here!.";
					}


				
				for($b=0;$b<=5;$b++){
					if(($aveArr[$b]>=0)&&($aveArr[$b]<=1.21))
					{
						$viArr[$b] = "Poor.";
					}
					elseif(($aveArr[$b]>=1.22)&&($aveArr[$b]<=2.21))
					{
						$viArr[$b] = "Fair.";
					}
					elseif(($aveArr[$b]>=2.22)&&($aveArr[$b]<=3.21)){
						$viArr[$b] = "Good.";
					}
					elseif(($aveArr[$b]>=3.22)&&($aveArr[$b]<=4.21)){
						$viArr[$b] = "Very Good.";
					}
					elseif(($aveArr[$b]>=4.22)&&($aveArr[$b]<=5)){
						$viArr[$b]="Excellent.";
					}
					else{
						$viArr[$b]="Something went wrong here!.";
					}

				}
		for($c=0;$c<=5;$c++){

			array_push($sumArr,$vGroup[$c].'-'.$aveArr[$c].'-'.$viArr[$c]);
		}

		
		//Session::start();
		Session::put('dataG',$aveArr);		    
		Session::put('viG',$viArr);
		Session::put('grpG',$vGroup);

		
		return View::make('results.index')
		    ->with('subjcode',$subjcode)
			->with('title','Results Page')
			->with('results',$resArr)
			->with('summary',$sumArr)
			->with('ov',$ov)
			->with('ovi',$ovi);
    
	}
	public function showbGraph($subjcode){
		return View::make('results.bar_graph')
		->with('subjcode',$subjcode);
	}


	public function getIndex2($subjcode){
		
				$resArr = array();
				$vGroup = array();
				$percA= array();
				$percB= array();
				$percC= array();
				$percD= array();
				$percE= array();
				$percF= array();
				$percAv= array();
				$percBv= array();
				$percCv= array();
				$percDv= array();
				$percEv= array();
				$percFv= array();
				//initialize
			for($v=0;$v<=4;$v++){
					$percA[$v]=0;
					$percB[$v]=0;
					$percC[$v]=0;
					$percD[$v]=0;
					$percE[$v]=0;
					$percF[$v]=0;

					$percAv[$v]=0;
					$percBv[$v]=0;
					$percCv[$v]=0;
					$percDv[$v]=0;
					$percEv[$v]=0;
					$percFv[$v]=0;
				}
			
		$query = DB::table('tblsurveys')
				->join('tblgroup','tblsurveys.qgroup','=','tblgroup.grp_id')
				->get();

		foreach($query as $fieldname){

			
					for($x=1;$x<=5;$x++){
						$res_wm=DB::table('tblresults')
						->select($fieldname->qid)
						//->select($fieldname->qid.' AS f1')
						->where('subj_code','=',$subjcode)
						->where('evaluated','=',1)
						->where($fieldname->qid,'=',$x)
						->get();

						switch($x){
							case 1:
							$count1 = count($res_wm);
							
							break;

							case 2:
							$count2 = count($res_wm);
						
							break;

							case 3:
							$count3 = count($res_wm);
							
							break;

							case 4:
							$count4 = count($res_wm);
							
							break;

							case 5:
							$count5 = count($res_wm);
							
							break;

							default:
							print_r("Error.");
						}//end of switch
		
					}//end of for loop
					


					$tc=$count1+$count2+$count3+$count4+$count5;
					

		if($tc==0){
			return Redirect::back();

		}

					if($tc!=0){
					$perc1=number_format(($count1/$tc)*100,1);
					}else{
					$perc1=0;	
					}

					if($tc!=0){
					$perc2=number_format(($count2/$tc)*100,1);
					}else{
					$perc2=0;	
					}
					

					if($tc!=0){
					$perc3=number_format(($count3/$tc)*100,1);
					}else{
					$perc3=0;	
					}


					if($tc!=0){
					$perc4=number_format(($count4/$tc)*100,1);
					}else{
					$perc4=0;	
					}


					if($tc!=0){
					$perc5=number_format(($count5/$tc)*100,1);
					}else{
					$perc5=0;	
					}

					$pa = $perc4+$perc5;
					$tb = $perc5;
					$ntb = ($perc5+$perc4)-($perc2+$perc1);


				switch($fieldname->grp_id){
					case 'A':

						$vGroup[0]=$fieldname->grp_desc;
						break;
					case 'B':

						$vGroup[1]=$fieldname->grp_desc;
						break;
					case 'C':

						$vGroup[2]=$fieldname->grp_desc;
						break;

					case 'D':

						
						$vGroup[3]=$fieldname->grp_desc;
						break;
					case 'E':

						
						$vGroup[4]=$fieldname->grp_desc;
						break;
					case 'F':
					
						$vGroup[5]=$fieldname->grp_desc;
						break;
					default:
					print_r("Error");
				}
	
					array_push($resArr,$fieldname->qid.'*'.$fieldname->qtext.'*'.$perc1.'*'.$perc2.'*'.$perc3.'*'.$perc4.'*'.$perc5.'*'.$pa.'*'.$tb.'*'.$ntb);
		}
      
	    
			return View::make('results.mode')
				->with('title','Mode')
				->with('tc',$tc)
				->with('results',$resArr)
				->with('percAv',$percAv)
				->with('percBv',$percBv)
				->with('percCv',$percCv)
				->with('percDv',$percDv)
				->with('percEv',$percEv)
				->with('percFv',$percFv)
				->with('subjcode',$subjcode);
 
	}



	//updated feb 13

	   public function showSubjectlist(){
        
		$insuser = DB::table('tblinstructors')
					->join('tblsubjects','tblinstructors.ins_id','=','tblsubjects.subj_inscode')
					->join('tblcourse','tblsubjects.subj_course','=','tblcourse.course_id')
					->join('tbldepartment','tblcourse.dept_id','=','tbldepartment.dept_id')
					->where('tblinstructors.ins_id', '=', Session::get( 'username' ))
					->where('tblinstructors.ins_password', '=', Session::get( 'password' ))
					->get();
		foreach ($insuser as $i) {
		
		Session::put($i->subj_code,$i->subj_desc);
		 
        //echo Session::get($i->subj_code).'<br>';		 
  	    
		}
          		
        return( View::make( 'inssublist')->with('data',$insuser)); 
        
	}
	
	public function getIndex3($subjcode){
	
	    $comments = DB::table('tblresults')
				->where('subj_code','=',$subjcode)
				->where('ins_code','=',Session::get( 'username' ))
				->where('Comment','<>','')
				->paginate(10);
				
			foreach ($comments as $com){
			  $data['com'][]= $com->Comment;
			}
			  $data['subj'][] = $subjcode;			
			  return( View::make( 'results.comments')->with('data',$data));
	
	}

	public function showEx(){
		 return( View::make( 'example_download'));
	}


}
