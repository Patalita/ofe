@extends('layouts.default')
@section('content')
	<h1>Editing {{ $sysuser->su_username }}</h1>

	@if($errors->has())
		<ul>
			{{ $errors->first('su_username','<li>:message</li>') }}
			{{ $errors->first('su_password','<li>:message</li>') }}
			{{ $errors->first('su_lname','<li>:message</li>') }}
			{{ $errors->first('su_fname','<li>:message</li>') }}
		</ul>
	@endif


	{{ Form::open(array('url' => "sysusers/update",'method' => "PUT")) }}


	<p>
		{{ Form::label('lastname','Last Name*') }}<br />
		{{ Form::text('su_lname',$sysuser->su_lname) }}<br />

	</p>
	<p>
		{{ Form::label('firstname','First Name*') }}<br />
		{{ Form::text('su_fname',$sysuser->su_fname) }}<br />
	</p>
	<p>
		{{ Form::label('middlename','Middle Name') }}<br />
		{{ Form::text('su_mname',$sysuser->su_mname)}}<br />
	</p>
	<p>
		{{ Form::label('accesslevel','Access Level') }}<br />
		{{ Form::select('su_alevel', array('1' => 'Administrator', '2' => 'Staff'),$sysuser->su_alevel)}}
	</p>
	<p>
		{{ Form::label('deptid','Department') }}<br />
		{{ Form::select('su_deptid', array('1' => 'CBA', '2' => 'CAS','3' => 'ENGG','4' => 'NURS','5' => 'TEED'),$sysuser->depit)}}
	</p>
	<p>
		{{ Form::label('password','Password*') }}<br />
		{{Form::input('password', 'su_password', $sysuser->su_password)}}
	</p>
	{{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
		
		{{ Form::hidden('su_username',$sysuser->su_username)}}


		{{ Form::close()}}
	
	<p><i>Note:All fields with asterisk(*) must have an entry.</i></p>


@endsection