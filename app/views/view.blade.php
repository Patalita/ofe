@extends('layouts.default')
@section('content')
	<h1>{{ $instructor->ins_id }}</h1>
		<p>{{ $instructor->ins_fname }}</p>
		<p>{{ $instructor->ins_mname }}</p>
		<p><small>{{ $instructor->updated_at }}</small></p>
		

		
@endsection