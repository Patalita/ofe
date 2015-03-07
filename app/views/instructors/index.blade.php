@extends('layouts.default')
@section('content')
	
	{{ Form::open(array('url' => 'instructor/search','class'=>'form-1')) }}

	<p>
		<table><tr><td>
		<span class="field">
		{{ Form::label('lblSearch','Search') }}</td>
		<td>{{ Form::text('searchKW') }}</td>
		<span class="field">
		<td><p class="submit">
		<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
	</p></td></tr></table>

	</p>
	{{ Form::close()}}
	{{ Form::open(array('class'=>'form-3')) }}
	
	@if(!isset($_POST['searchKW']))

	<div id="content">
			
			<table><tr><td><h1>List of Instructors</h1></tr></td><td></td></table>
			<p>{{ HTML::linkRoute('new_instructor','Click to Add a New Instructor') }}</p>	
				<h2>
				<table id="tblsurvey" style="width:100%; border-spacing:0;">
						<thead>
							<tr>
							<th>Employee ID</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Status</th>
							<th colspan='2'>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($instructors as $instructor)

								<tr>
									<td>{{ $instructor->ins_id }}</td>
									<td>{{ $instructor->ins_lname }}</td>
									<td>{{ $instructor->ins_fname }}</td>
									<td>{{ $instructor->ins_mname }}</td>
									<td>{{ $instructor->ins_empstatus }}</td>
									<td>{{ HTML::linkRoute('insPage','VIEW',array($instructor->ins_id))}}</td>
									
									
								</tr>

							@endforeach
						</tbody>
					
					</table>
				
					</h2>
					


	@else
			
			@if($num_rows>0)
			
				<table style="width:100%; border-spacing:0;"><tr><td><h1>List of Instructors</h1></td><td align='right'>Result: {{$num_rows}} match(es) found!</td></tr></table>
				<p>{{ HTML::linkRoute('new_instructor','Click to Add a New Instructor') }}</p>	
				<h2>
				<table style="width:100%; border-spacing:0;font-size:8pt;">
				<thead>
						<tr>
							<th>Employee ID</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Status</th>
							<th colspan='2'>Action</th>
						</tr>
				</thead>
				<tbody>
							@foreach($instructors as $instructor)

								<tr>
									<td>{{ $instructor->ins_id }}</td>
									<td>{{ $instructor->ins_lname }}</td>
									<td>{{ $instructor->ins_fname }}</td>
									<td>{{ $instructor->ins_mname }}</td>
									<td>{{ $instructor->ins_empstatus }}</td>
									<td>{{ HTML::linkRoute('insPage','VIEW',array($instructor->ins_id))}}</td>
								</tr>

							@endforeach
				</tbody>
				</table>
			

					</h2>
					

			@else
				<table style="width:100%; border-spacing:0;"><tr><td><h1>List of Instructors</h1></td><td align='right'>Result: No match found!</td></tr></table>
				<p>{{ HTML::linkRoute('new_instructor','Click to Add a New Instructor') }}</p>	

			@endif

	@endif
	{{Form::close()}}
	</div>
@endsection


