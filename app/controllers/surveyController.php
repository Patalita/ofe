<?php
class surveyController extends BaseController{
	public function getIndex(){	
		                $lvl = Session::get('su_alevel');
        if($lvl!=1){
            return Redirect::route('home');
           }
		return View::make('survey.index')
			->with('title','Survey Questionnaire')
	

			->with('sqs',tblsurvey::orderBy('qid','ASC')->get()); 
		
	}
	 public function searchQ(){


   	$q = Input::get('searchKW');

    $searchTerms = explode(',', $q);

    $query = DB::table('tblsurveys');

    foreach($searchTerms as $term)
    {
        $query->where('qid', 'LIKE', '%'. $term .'%')
             ->orWhere('qtext', 'LIKE', '%'. $term .'%')
 			->orWhere('qgroup', 'LIKE', '%'. $term .'%');
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

    return View::make('survey.index')
    ->with('title','Search Results')
    ->with('sqs', $results)
    ->with('num_rows',$count);



    }
     public function editQ($id)
    {
       $data['id'] = tblsurvey::find($id);

        return View::make('survey.edit')
            ->with('title','Edit Survey Question ')
            ->with('qid',$data['id']);

    }


}