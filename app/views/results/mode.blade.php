@extends('layouts.inssublist')
@section('content')
<table cellspacing='0' id="tblsurvey">
<tr>
    <th colspan="2">Subject:&nbsp;&nbsp;{{ Session::get($subjcode)}}</th>
    <th colspan="5"><div align="left">Percentage (%)  <br>Total Respondents: {{$tc}}</div></th>
    <th rowspan="2">Percent Agree (%)</th>
    <th rowspan="2">Top-Box (%)</th>
    <th rowspan="2">Net Top Box (%) </th>
  </tr>
  <tr>
    <th>QID</th>
    <th width='200px'>Question</th>
    <th>Never </th>
    <th>Rarely</th>
    <th>Sometimes </th>
    <th>Often</th>
    <th>Always </th>
  </tr>
	@foreach($results as $field)
			<?php $f=explode('*',$field)?>
		<tr>
				@foreach($f as $a)
				<td>{{ $a}}</td>
				
				@endforeach
		</tr>
	@endforeach

	</table></br></br>
	{{ HTML::linkRoute('showSubjects','<<',array('class'=>'back')) }}		
</br>
@endsection