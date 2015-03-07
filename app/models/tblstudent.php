<?php


class tblstudent extends Eloquent{
	public $primaryKey = 'stu_id';


public static $rules = array(
        'stu_id' => 'required|min:10',
        'stu_lname'  => 'required|min:2',
        'stu_fname'  => 'required|min:2',
        
        // .. more rules here ..
    );

   	 public static $messages = array(
	        'stu_id.required' => 'Student ID is required.',
	        'stu_lname.required' => 'Last Name required.',
	        'stu_fname.required' => 'First Name is required.'
	    );

    public static function validate(array $data)
    {
    	return Validator::make($data,static::$rules,static::$messages);


    }


}