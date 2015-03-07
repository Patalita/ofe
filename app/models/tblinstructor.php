<?php


class tblinstructor extends Eloquent{
	public $primaryKey = 'ins_id';//need to declare the primary key of each table if not eloquent will use a default id 
	//protected $fillable = array('ins_id','ins_lname', 'ins_fname');
	//which will create an error
	//singular for the model
	//plural for the table name
	//public static $table='tblinstructors'; this one cause error no need to declare
	//still having problems implementing validation in model, modify later on. In the maintime, i'll do validation in the controller

	//list of rules

	
   	public static $rules = array(
        'ins_id' => 'required|min:6',
        'ins_lname'  => 'required|min:2',
        'ins_fname'  => 'required|min:2'
        // .. more rules here ..
    );

   	 public static $messages = array(
	        'ins_id.required' => 'Employeed ID is required.',
	        'ins_lname.required' => 'Last Name is required.',
	        'ins_fname.required' => 'First Name is required.'
	    );

    public static function validate(array $data)
    {
    	return Validator::make($data,static::$rules,static::$messages);


    }


   }

        	

       
        
       




