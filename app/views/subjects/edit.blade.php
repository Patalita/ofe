@extends('layouts.default')
@section('content')


	{{ Form::open(array('url' => "subject/update",'method' => "PUT")) }}
	<h1>Editing {{ $subjects->subj_code }}</h1>

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
		{{ Form::label('subjdesc','Description*') }}<br />
		{{ Form::text('subj_desc',$subjects->subj_desc) }}<br />

	</p>

	<p>
		{{ Form::label('subjsem','Semester') }}<br />
		{{ Form::select('subj_sem', array('First Semester' => 'First Semester','Second Semester'),$subjects->subj_sem)}}
	</p>
	
	<p>
		{{ Form::label('subjsy','School Year') }}<br />
		{{ Form::select('subj_sy', array('2014-2015' => '2014-2015','2015-2016' => '2015-2016','2016-2017' => '2016-2017','2017-2018' => '2017-2018','2018-2019' => '2018-2019'),$subjects->subj_sy)}}
	</p>
	
	<p>
		{{ Form::label('inscode','Instructor ID*') }}<br />
		{{ Form::text('subj_inscode',$subjects->subj_inscode) }}<br />

	</p>
	<p>
		{{ Form::label('subjcourse','Course') }}<br />
		{{ Form::select('subj_course', array('1' => 'BSIT','2' => 'BSIS','3' => 'BA','4' => 'MA','5' => 'BSCpE','6' => 'BSECE','7' => 'BSN','8' => 'TEED'),$subjects->subj_course)}}
	</p>

	{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
	{{ Form::hidden('subj_code',$subjects->subj_code)}}
	{{ Form::close()}}
	<p><i>Note:All fields with asterisk(*) must have an entry.</i></p>
@endsection