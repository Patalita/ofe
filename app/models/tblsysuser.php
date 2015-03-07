<?php


class tblsysuser extends Eloquent{
	public $primaryKey = 'su_username';


public static $rules = array(
        'su_username' => 'required|min:4',
        'su_password'  => 'required|min:8',
        'su_lname'  => 'required|min:2',
        'su_fname'  => 'required|min:2'
        // .. more rules here ..
    );

   	 public static $messages = array(
	        'su_username.required' => 'Username is required.',
	        'su_password.required' => 'Password is required.',
	        'su_lname.required' => 'Last Name is required.',
	        'su_fname.required' => 'First Name is required.'
	    );

    public static function validate(array $data)
    {
    	return Validator::make($data,static::$rules,static::$messages);


    }
}
