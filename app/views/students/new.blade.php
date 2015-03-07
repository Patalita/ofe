@extends('layouts.default')
@section('content')
	<h1>Add New Student</h1>
	@if($errors->has())
		<ul>
			{{ $errors->first('stu_id','<li>:message</li>') }}
			{{ $errors->first('stu_lname','<li>:message</li>') }}
			{{ $errors->first('stu_fname','<li>:message</li>') }}
		</ul>
	@endif
	{{ Form::open(array('url' => "students/create",'method' => "post")) }}
	<p>
		{{ Form::label('stuid','Student ID*') }}<br />
		{{ Form::text('stu_id',Input::old('stu_id')) }}<br />

	</p>
	<p>
		{{ Form::label('stulname','Last Name*') }}<br />
		{{ Form::text('stu_lname',Input::old('stu_lname')) }}<br />

	</p>
	<p>
		{{ Form::label('stufname','First Name*') }}<br />
		{{ Form::text('stu_fname',Input::old('stu_fname')) }}<br />
	</p>
	<p>
		{{ Form::label('stumname','Middle Name') }}<br />
		{{ Form::text('stu_mname',Input::old('stu_mname')) }}<br />
	</p>
	<p>
		{{ Form::label('stucourse','Course') }}<br />
		{{ Form::select('stu_course', array('1' => 'BSIT','2' => 'BSIS','3' => 'BA','4' => 'MA','5' => 'BSCpE','6' => 'BSECE','7' => 'BSN','8' => 'TEED'))}}
	</p>

	<p>
		{{ Form::label('stuyear','Year Level') }}<br />
		{{ Form::select('stu_year', array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5'))}}
	</p>

		<p>
		{{ Form::label('stusection','Section') }}<br />
		{{ Form::select('stu_section', array('A' => 'A','B' => 'B','C' => 'C','D' => 'D','E' => 'E'))}}
	</p>
	<p>
		{{ Form::label('stusem','Semester') }}<br />
		{{ Form::select('stu_sem', array('First Semester' => 'First Semester','Second Semester'=>'Second Semester'))}}
	</p>
	
	<p>
		{{ Form::label('stusy','School Year') }}<br />
		{{ Form::select('stu_sy', array('2014-2015' => '2014-2015','2015-2016' => '2015-2016','2016-2017' => '2016-2017','2017-2018' => '2017-2018','2018-2019' => '2018-2019'))}}
	</p>

	<p>
		{{ Form::label('stuSta','Status') }}<br />
		{{ Form::select('stu_status', array('1' => 'Active','2' => 'Inactive'))}}
	</p>


	{{ Form::submit('Add Student', ['class' => 'btn btn-primary']) }}

	{{ Form::close()}}
	<p><i>Note:All fields with asterisk(*) must have an entry.</i></p>
@endsection