<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete this record?");
  if (x)
    return true;
  else
    return false;
  }

</script>
@extends('layouts.default')
@section('content')
	@if(Session::has('message'))
				<p style="color: green;" >{{ Session::get('message')}}</p>
	@endif
	<h1>{{ $instructor->ins_lname }}</h1>
		<p>{{ $instructor->ins_fname }}</p>
		<p>{{ $instructor->ins_mname }}</p>
		<p><small>{{ $instructor->updated_at }}</small></p>
		<span>
		{{ HTML::linkRoute('instructors','Instructors')}}|
		{{ HTML::linkRoute('edit_instructor','Edit',array($instructor->ins_id)) }}
		{{ Form::open(array('url' => 'instructor/delete','method' => 'DELETE', 'style'=>'display: inline;','onsubmit' => 'return ConfirmDelete()')) }}
		{{ Form::hidden('ins_id',$instructor->ins_id)}}
		{{ Form::submit('Delete')}}
		{{ Form::close()}}

		</span>

		
@endsection