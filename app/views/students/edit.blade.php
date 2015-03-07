@extends('layouts.default')
@section('content')
	<h1>Editing {{$students->stu_id}}</h1>
		@if($errors->has())
		<ul>
			{{ $errors->first('stu_id','<li>:message</li>') }}
			{{ $errors->first('stu_lname','<li>:message</li>') }}
			{{ $errors->first('stu_fname','<li>:message</li>') }}
		</ul>
	@endif
	{{ Form::open(array('url' => "students/update",'method' => "PUT")) }}
	@if(Session::has('message'))
				<p style="color: green;" >{{ Session::get('message')}}</p>
	@endif
	<p>
		{{ Form::label('stulname','Last Name*') }}<br />
		{{ Form::text('stu_lname',$students->stu_lname )}}<br />

	</p>
	<p>
		{{ Form::label('stufname','First Name*') }}<br />
		{{ Form::text('stu_fname',$students->stu_fname )}}<br />

	</p>
	<p>
		{{ Form::label('stumname','Middle Name*') }}<br />
		{{ Form::text('stu_mname',$students->stu_mname )}}<br />

	</p>

	<p>
		{{ Form::label('stucourse','Course') }}<br />
		{{ Form::select('stu_course', array('1' => 'BSIT','2' => 'BSIS','3' => 'BA','4' => 'MA','5' => 'BSCpE','6' => 'BSECE','7' => 'BSN','8' => 'TEED'),$students->stu_course)}}
	</p>

	<p>
		{{ Form::label('stuyear','Year Level') }}<br />
		{{ Form::select('stu_year', array('1' => '1','2' => '2','3' => '3','4' => '4','5' => '5'),$students->stu_year)}}
	</p>

	<p>
		{{ Form::label('stuSta','Status') }}<br />
		{{ Form::select('stu_status', array('1' => 'Active','2' => 'Inactive'),$students->stu_status)}}
	</p>


	{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
	{{ Form::hidden('stu_id',$students->stu_id)}}

	{{ Form::close()}}
	<p><i>Note:All fields with asterisk(*) must have an entry.</i></p>
	
@endsection