<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete this user account?");
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
	<h1>{{ $sysuser->su_lname }}</h1>
		<p>{{ $sysuser->su_fname }}</p>
		<p>{{ $sysuser->su_mname }}</p>
		<p><small>{{ $sysuser->updated_at }}</small></p>
		{{ HTML::linkRoute('systemUsers','List of System Users')}}|
		{{ HTML::linkRoute('edit_user','Edit',array($sysuser->su_username)) }}
		{{ Form::open(array('url' => 'sysusers/delete','method' => 'DELETE', 'style'=>'display: inline;','onsubmit' => 'return ConfirmDelete()')) }}
		{{ Form::hidden('su_username',$sysuser->su_username)}}
		{{ Form::submit('Delete')}}
	
		
@endsection