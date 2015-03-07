<script src=<?php echo asset("js/Chart.js");?>></script>
@extends('layouts.inssublist')
@section('content')
	<div id="content">
	<table id='tblsurvey'>
	   <tr><th>Subject: {{ Session::get($subjcode)}}</th></tr>
	   <tr>
	   <td align='center'>
	    <center>
		<div style="width: 75%;margin:100px, 0, 50px, 0;">
			<canvas id="canvas" height="500" width="700"></canvas>
			
		</div>
		</center>
		</td>
		</tr>
	</table>	
	</div>
@endsection
		<?php 
			session_start();
			$group = Session::get('grpG');
			$data=Session::get('dataG');


		?>

	<script>
	//var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	
	var barChartData = {



		labels : ["<?php echo $group[0];?>","<?php echo $group[1];?>","<?php echo $group[2];?>","<?php echo $group[3];?>","<?php echo $group[4];?>","<?php echo $group[5];?>"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [<?php echo $data[0];?>,<?php echo $data[1];?>,<?php echo $data[2];?>,<?php echo $data[3];?>,<?php echo $data[4];?>,<?php echo $data[5];?>]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
