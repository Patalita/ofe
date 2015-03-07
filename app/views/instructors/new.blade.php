@extends('layouts.default')
@section('content')

	{{ Form::open(array('url' => "instructors/create",'method' => "post",'class'=>'form-1')) }}
	
	<h1>Add New Instructor</h1>
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
		{{ Form::label('insid','Instructor ID*') }}<br />
		{{ Form::text('ins_id',Input::old('ins_id')) }}<br />

	</span>
	<span class="field">
		{{ Form::label('inslname','Last Name*') }}<br />
		{{ Form::text('ins_lname',Input::old('ins_lname')) }}<br />

	</span>
	<span class="field">
		{{ Form::label('insfname','First Name*') }}<br />
		{{ Form::text('ins_fname',Input::old('ins_fname')) }}<br />
	</span>
	<span class="field">
		{{ Form::label('insmname','Middle Name') }}<br />
		{{ Form::text('ins_mname',Input::old('ins_mname')) }}<br />
	</span>
	<span class="field">
		{{ Form::label('insstatus','Employment Status') }}<br />
		{{ Form::select('ins_empstatus', array('Full-Time' => 'Full-Time', 'Part-Time' => 'Part-Time'))}}
	</span>
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>

	<p><i>Note:All fields with asterisk(*) must have an entry.</i></p>
	{{ Form::close()}}
	
@endsection