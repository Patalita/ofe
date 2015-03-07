@extends('layouts.default')
@section('content')
	{{ Form::open(array('url' => 'students/search')) }}

	<p>
		<table><tr><td>
		{{ Form::label('lblSearch','Search') }}</td>

		<td>{{ Form::text('searchKW') }}</td>
		<td>{{ Form::submit('Search')}}</td><tr></table>

	</p>
	{{ Form::close()}}

	@if(!isset($_POST['searchKW']))
			
			<h1>List of Students</h1>
			<p>{{ HTML::linkRoute('new_student','New Student') }}</p>	
			
				<table id = 'tblsurvey' style="width:100%; border-spacing:0;">
						<tr>
							<th>Student ID</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Course</th>
							<th>Year</th>
							<th>Section</th>
							<th>Status</th>
							<th colspan='2'>Action</th>
						</tr>
							@foreach($students as $student)

								<tr>
									<td>{{ $student->stu_id }}</td>
									<td>{{ $student->stu_lname }}</td>
									<td>{{ $student->stu_fname }}</td>
									<td>{{ $student->stu_mname }}</td>
									<td>{{ $student->desc }}</td>
									<td>{{ $student->stu_year }}</td>
									<td>{{ $student->stu_section }}</td>
									<td>{{ $student->sdesc }}</td>
									<td>{{ HTML::linkRoute('studentPage','VIEW',array($student->stu_id))}}</td>
									
									
								</tr>

							@endforeach
					
					</table>
					
				
					


	@else
			
			@if($num_rows>0)
			Result: {{$num_rows}} match(es) found!
				<h1>List of Students</h1>
				<p>{{ HTML::linkRoute('new_student','New Student') }}</p>	
				
				<table id='tblsurvey' style="width:100%; border-spacing:0;">
						<tr>
							<th>Student ID</th>
							<th>Last Name</th>
							<th>First Name</th>
							<th>Middle Name</th>
							<th>Course</th>
							<th>Year</th>
							<th>Section</th>
							<th>Status</th>
							<th colspan='2'>Action</th>
						</tr>
							@foreach($students as $student)

								<tr>
									<td>{{ $student->stu_id }}</td>
									<td>{{ $student->stu_lname }}</td>
									<td>{{ $student->stu_fname }}</td>
									<td>{{ $student->stu_mname }}</td>
									<td>{{ $student->desc }}</td>
									<td>{{ $student->stu_year }}</td>
									<td>{{ $student->stu_section }}</td>
									<td>{{ $student->sdesc }}</td>
									<td>{{ HTML::linkRoute('studentPage','VIEW',array($student->stu_id))}}</td>
								</tr>

							@endforeach
					
					</table>
					
			

			@else
				Resut: No Records found!

			@endif

	@endif
@endsection


