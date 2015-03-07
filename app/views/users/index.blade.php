@extends('layouts.default')
@section('content')
	@if(Session::has('message'))
				<p style="color: green;" >{{ Session::get('message')}}</p>
	@endif

	{{ Form::open(array('url' => 'sysuser/search')) }}

	<p>
		<table><tr><td>
		{{ Form::label('lblSearch','Search') }}</td>

		<td>{{ Form::text('searchKW') }}</td>
		<td>{{ Form::submit('Search')}}</td><tr></table>

	</p>
	{{ Form::close()}}

	
	@if(!isset($_POST['searchKW']))
			
			<h1>System Users</h1>
			{{ HTML::linkRoute('newuser','New User')}}
				<h2>
				<table id='tblsurvey' style="width:100%; border-spacing:0;">
						<tr>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Username</th>
							<th>Access Level</th>
							<th colspan='2'>Action</th>
						</tr>
							@foreach($sysuser as $user)

								<tr>
									<td>{{ $user->su_lname }}</td>
									<td>{{ $user->su_fname }}</td>
									<td>{{ $user->su_mname }}</td>
									<td>{{ $user->su_username }}</td>
									<td>{{ $user->su_alevel }}</td>
									<td>{{ HTML::linkRoute('userPage','VIEW',array($user->su_username))}}</td>
									
								</tr>

							@endforeach
					
					</table>
				
					</h2>
					


	@else
			
			@if($num_rows>0)
			Result: {{$num_rows}} match(es) found!
				<h1>System Users</h1>
				{{ HTML::linkRoute('newuser','New User')}}	
				<h2>
				<table id='tblsurvey' style="width:100%; border-spacing:0;">
						<tr>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Username</th>
							<th>Access Level</th>
							<th colspan='2'>Action</th>
						</tr>
							@foreach($sysuser as $user)

								<tr>
									<td>{{ $user->su_lname }}</td>
									<td>{{ $user->su_fname }}</td>
									<td>{{ $user->su_mname }}</td>
									<td>{{ $user->su_username }}</td>
									<td>{{ $user->su_alevel }}</td>
									<td>{{ HTML::linkRoute('userPage','VIEW',array($user->su_username))}}</td>
									
									
								</tr>

							@endforeach
					
					</table>
					
					</h2>

			@else
				Resut: No Records found!

			@endif

	@endif
	
@endsection


