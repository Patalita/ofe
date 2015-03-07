@extends('layouts.default')
@section('content')
	{{ Form::open(array('url' => 'subjects/search')) }}

	<p>
		<table><tr><td>
		{{ Form::label('lblSearch','Search') }}</td>

		<td>{{ Form::text('searchKW') }}</td>
		<td>{{ Form::submit('Search')}}</td><tr></table>

	</p>
	{{ Form::close()}}

	@if(!isset($_POST['searchKW']))
			
			<h1>List of Subjects</h1>
			<p>{{ HTML::linkRoute('new_subject','New Subject') }}</p>	
				
				<table style="width:1000px; border-spacing:0;">
						<tr>
							<th>Subject Code</th>
							<th>Description</th>
							<th colspan="2">Instructor</th>
							<th>Course</th>
							<th>Semester</th>
							<th>School Year</th>
							<th colspan='2'>Action</th>
						</tr>
							@foreach($subjects as $subject)

								<tr>
									<td>{{ $subject->subj_code }}</td>
									<td>{{ $subject->subj_desc }}</td>
									<td>{{ $subject->ins_lname }}</td>
									<td>{{ $subject->ins_fname }}</td>
									<td>{{ $subject->desc }}</td>
									<td>{{ $subject->subj_sem }}</td>
									<td>{{ $subject->subj_sy }}</td>
									<td>{{ HTML::linkRoute('subjectPage','VIEW',array($subject->subj_code))}}</td>
									
									
								</tr>

							@endforeach
					
					</table>
					
				
					


	@else
			
			@if($num_rows>0)
			Result: {{$num_rows}} match(es) found!
				<h1>List of Students</h1>
				<p>{{ HTML::linkRoute('new_subject','New Subject') }}</p>	
			
				<table style="width:1000px; border-spacing:0;">
						<tr>
							<th>Subject Code</th>
							<th>Description</th>
							<th colspan="2">Instructor</th>
							<th>Course</th>
							<th>Semester</th>
							<th>School Year</th>
							<th colspan='2'>Action</th>
						</tr>
							@foreach($subjects as $subject)

								<tr>
									<td>{{ $subject->subj_code }}</td>
									<td>{{ $subject->subj_desc }}</td>
									<td>{{ $subject->ins_lname }}</td>
									<td>{{ $subject->ins_fname }}</td>
									<td>{{ $subject->desc }}</td>
									<td>{{ $subject->subj_sem }}</td>
									<td>{{ $subject->subj_sy }}</td>
									<td>{{ HTML::linkRoute('subjectPage','VIEW',array($subject->subj_code))}}</td>
									
									
								</tr>

							@endforeach
					
					</table>
					
			

			@else
				Resut: No Records found!

			@endif

	@endif
@endsection


