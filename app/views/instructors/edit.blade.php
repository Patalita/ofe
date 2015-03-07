@extends('layouts.default')
@section('content')


	{{ Form::open(array('url' => 'instructor/update','method' => 'PUT','class'=>'form-1')) }}
	
	<h1>Edit</h1>
	@if($errors->has())
		<ul>
			{{ $errors->first('ins_id','<li>:message</li>') }}
			{{ $errors->first('ins_lname','<li>:message</li>') }}
			{{ $errors->first('ins_fname','<li>:message</li>') }}
		</ul>
	@endif
	@if(Session::has('message'))
				<p style="color: green;" >{{ Session::get('message')}}</p>
	@endif
	<span class="field">
		{{ Form::label('inslname','Last Name') }}<br />
		{{ Form::text('ins_lname',$instructor->ins_lname) }}<br />

	</span>
	<span class="field">
		{{ Form::label('insfname','First Name') }}<br />
		{{ Form::text('ins_fname',$instructor->ins_fname) }}<br />
	</span>
	<span class="field">
		{{ Form::label('insmname','Middle Name') }}<br />
		{{ Form::text('ins_mname',$instructor->ins_mname) }}<br />
	</span>
	{{ Form::select('ins_empstatus', array('Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time'),$instructor->ins_empstatus)}}

	<p class="submit">
		<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
	</p>
		{{ Form::hidden('ins_id',$instructor->ins_id)}}
		{{ Form::hidden('oldln',$instructor->ins_lname)}}
		{{ Form::hidden('oldfn',$instructor->ins_fname)}}

	{{ Form::close()}}
@endsection