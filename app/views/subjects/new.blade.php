@extends('layouts.default')
@section('content')

	{{ Form::open(array('url' => "subject/create",'method' => "post")) }}
	<h1>Add New Subject</h1>
	@if($errors->has())
		<ul>
			{{ $errors->first('subj_code','<li>:message</li>') }}
			{{ $errors->first('subj_desc','<li>:message</li>') }}
			{{ $errors->first('subj_inscode','<li>:message</li>') }}
			
		</ul>
	@endif
	@if(Session::has('message'))
				<p style="color: green;" >{{ Session::get('message')}}</p>
	@endif
	<p>
		{{ Form::label('subjcode','Subject Code*') }}<br />
		{{ Form::text('subj_code',Input::old('subj_code')) }}<br />

	</p>
	<p>
		{{ Form::label('subjdesc','Description*') }}<br />
		{{ Form::text('subj_desc',Input::old('subj_desc')) }}<br />

	</p>
	<p>
		{{ Form::label('subjyear','Year') }}<br />
		{{ Form::select('subj_year', array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5'))}}
	</p>

		<p>
		{{ Form::label('subjsection','Section') }}<br />
		{{ Form::select('subj_section', array('A' => 'A','B' => 'B','C' => 'C','D' => 'D','E' => 'E'))}}
	</p>
	<p>
		{{ Form::label('subjsem','Semester') }}<br />
		{{ Form::select('subj_sem', array('First Semester' => 'First Semester','Second Semester'=>'Second Semester'))}}
	</p>
	
	<p>
		{{ Form::label('subjsy','School Year') }}<br />
		{{ Form::select('subj_sy', array('2014-2015' => '2014-2015','2015-2016' => '2015-2016','2016-2017' => '2016-2017','2017-2018' => '2017-2018','2018-2019' => '2018-2019'))}}
	</p>
	
	<p>
		{{ Form::label('inscode','Instructor ID*') }}<br />
		{{ Form::text('subj_inscode',Input::old('subj_inscode')) }}<br />

	</p>
	<p>
		{{ Form::label('subjcourse','Course') }}<br />
		{{ Form::select('subj_course', array('1' => 'BSIT','2' => 'BSIS','3' => 'BA','4' => 'MA','5' => 'BSCpE','6' => 'BSECE','7' => 'BSN','8' => 'TEED'))}}
	</p>

	<p>




	{{ Form::submit('Add Subject', ['class' => 'btn btn-primary']) }}

	{{ Form::close()}}
	<p><i>Note:All fields with asterisk(*) must have an entry.</i></p>
@endsection