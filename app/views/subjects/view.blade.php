<script>

  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete this subject?");
  if (x)
    return true;
  else
    return false;
  }

</script>

@extends('layouts.default')
@section('content')
<h1>Subject</h1>
<h2>
	@foreach($subjects as $data)
		{{ $data->subj_code }}<br />
		{{ $data->subj_desc }}<br />
		{{ $data->ins_lname }}, {{ $data->ins_fname }}<br />
		{{ $data->desc }}<br />
		{{ $data->subj_sem }}<br />
		{{ $data->subj_sy }}<br />
				
	@endforeach
	</h2>
	

		{{ HTML::linkRoute('subjects','List of Subjects')}}|
		{{ HTML::linkRoute('edit_subject','Edit',array($data->subj_code)) }}
		{{ Form::open(array('url' => 'subjects/delete','method' => 'DELETE', 'style'=>'display: inline;','onsubmit' => 'return ConfirmDelete()')) }}
		{{ Form::hidden('subj_code',$data->subj_code)}}
		{{ Form::submit('Delete')}}

	
		
@endsection