@extends('layouts.default')
@section('content')
	{{ Form::open(array('url' => 'survey/search')) }}

	<p>
		<table><tr><td>
		{{ Form::label('lblSearch','Search') }}</td>

		<td>{{ Form::text('searchKW') }}</td>
		<td>{{ Form::submit('Search')}}</td><tr></table>

	</p>
	{{ Form::close()}}

	@if(!isset($_POST['searchKW']))
			
			<h1>List of Questions</h1>
		
				<h2>
				<table style="width:100%; border-spacing:0;">
						<tr bgcolor='#555'>
							<th>QID</th>
							<th>Question</th>
							<th>Group</th>
							<th colspan='1'>Action</th>
						</tr>
							@foreach($sqs as $sq)

								<tr>
									<td>{{ $sq->qid }}</td>
									<td>{{ $sq->qtext }}</td>
									<td>{{ $sq->qgroup }}</td>
									<td>{{ HTML::linkRoute('editquestion','EDIT',array($sq->qid))}}</td>
								</tr>

							@endforeach
					
					</table>
					
					</h2>
					

	@else
			
			@if($num_rows>0)
			Result: {{$num_rows}} match(es) found!
				<h1>List of Questions</h1>
		
				<h2>
				<table style="width:100%; border-spacing:0;">
						<tr bgcolor='#555'>
							<th>QID</th>
							<th>Question</th>
							<th>Group</th>
							<th colspan='1'>Action</th>
						</tr>
							@foreach($sqs as $sq)

								<tr>
									<td>{{ $sq->qid }}</td>
									<td>{{ $sq->qtext }}</td>
									<td>{{ $sq->qgroup }}</td>
									<td>{{ HTML::linkRoute('editquestion','EDIT',array($sq->qid))}}</td>

									
									
								</tr>

							@endforeach
					
					</table>
					
					</h2>
			@else
				Resut: No Records found!

			@endif

	@endif
@endsection


