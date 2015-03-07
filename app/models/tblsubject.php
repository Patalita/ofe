<?php


class tblsubject extends Eloquent{
	public $primaryKey = 'subj_code';


	public static $rules = array(
        'subj_code' => 'required|min:5',
        'subj_desc'  => 'required|min:2',
        'subj_inscode'  => 'required|min:6',
        
        // .. more rules here ..
    );

   	 public static $messages = array(
	        'subj_code.required' => 'Subject code is required.',
	        'subj_desc.required' => 'Description required.',
	        'subj_inscode.required' => 'Instructor code is required.'
	    );

    public static function validate(array $data)
    {
    	return Validator::make($data,static::$rules,static::$messages);


    }
}