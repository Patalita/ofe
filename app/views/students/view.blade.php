<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete this student record?");
  if (x)
    return true;
  else
    return false;
  }

</script>

@extends('layouts.default')
@section('content')
<h1>Student's Profile</h1>
<h2>
	@if(Session::has('message'))
				<p style="color: green;" >{{ Session::get('message')}}</p>
	@endif
	@foreach($students as $data)
		  Student ID:  {{ $data->stu_id }}<br />
		   Last Name:  {{ $data->stu_lname }}<br />
		  First Name:  {{ $data->stu_fname }}<br />
		Middle Name:{{ $data->stu_mname }}<br />
		{{ $data->desc }}<br />
		{{ $data->stu_year }}<br />
		{{ $data->stu_section }}<br />
		{{ $data->sdesc }}				
	@endforeach
	</h2>
	

		{{ HTML::linkRoute('students','List of Students')}}|
		{{ HTML::linkRoute('edit_student','Edit',array($data->stu_id)) }}		
		{{ Form::open(array('url' => 'students/delete','method' => 'DELETE', 'style'=>'display: inline;','onsubmit' => 'return ConfirmDelete()')) }}
		{{ Form::hidden('stu_id',$data->stu_id)}}
		{{ Form::submit('Delete')}}

	
		
@endsection