<script src=<?php echo asset("js/jquery-1.11.2.js")?>></script>
<script>


$(document).ready(function(){
 $("#tblsurvey a[href^='http://']").attr("target","_blank"); 
 $('#details').hide();  
 
 $('#det').click(function(){
    $('#details').show();
    $('#summary').hide();	
 });
 $('#sum').click(function(){
    $('#details').hide();
    $('#summary').show();	
 });
 
});

</script>


@extends('layouts.inssublist')
@section('content')

<div id='summary'>
<table id="tblsurvey">
	<tr><th align="center">Subject:&nbsp;&nbsp;<?php echo Session::get("$subjcode");?></th>
	<th><u><a id='det'>View Details</a></u></th>
	<th><u>{{ HTML::linkRoute('DisplayGraph','View Graph',array('target'=>'blank','id'=>'linkg','subjcode'=>$subjcode))}}</u></th>	
	</tr>
		<tr>
			<td><b>Criteria</b></td>
			<td><b>Average Weighted Mean</b></td>
			<td><b>Verbal Interpretation</b></td>
		
		</tr>
		@foreach($summary as $sum)
			<?php $s=explode('-',$sum) ?>

		<tr>
				@foreach($s as $b)
				<td>{{ $b}}</td>
				
				@endforeach
		</tr>
	@endforeach
		<tr>	
			<td><b>Over-All</b></td>
			<td><b>{{$ov}}</b></td>
			<td><b>{{$ovi}}</b></td>

		</tr>

	<tr><th colspan=></center></th></tr>
	</table><br><br>

{{ HTML::linkRoute('showSubjects','<<',array('class'=>'back')) }}		
</div>	
<div id='details'>
	<table id="tblsurvey">
	<tr><th align="center" colspan='3'>Subject:&nbsp;&nbsp;<?php echo Session::get("$subjcode");?></th>
	<th colspan='4'><u><a id='sum'>View Summary</a></u></th>
		@foreach($summary as $sum)
			<?php $s=explode('-',$sum); ?>
            <tr>
			<td colspan='4'><b>Criteria: {{ $s[0]}}</b></td>
			</tr>
			<tr>
			<td><b>QID</b></td>
			<td><b>Question</b></td>
			<td><b>Weighted Mean</b></td>
			<td><b>Verbal Interpretation</b></td>
			</tr>
			
	         @foreach($results as $field)
		       <?php $f=explode('-',$field); ?>
			   @if($s[0]==$f[0])
			     <tr>
					   @foreach($f as $a)
                         @if($a==$f[0]) 
						 <?php continue; ?>
						 @endif
						    
						<td>{{ $a}}</td>
						 
					   @endforeach					   
				</tr>
			   @endif
			@endforeach
		    
		
		    <tr>
			<th></th>
			<th><b>Average</b></th>
			<th><b>{{ $s[1]}}</b></th>
			<th><b>{{ $s[2]}}</b></th>
			</tr> 
	   @endforeach
	   
   <tr><th colspan='4'></th></tr>
	</table>
</div>
	</br>

@endsection