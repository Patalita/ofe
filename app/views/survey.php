<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Start Evaluation | On-Faculty Evaluation</title>
<link rel="shortcut icon" href=<?php echo asset("../favicon.ico")?>> 
<link rel="stylesheet" href=<?php echo asset("css/student_css.css")?> type="text/css" media="screen,projection" />
<script src=<?php echo asset("js/jquery-1.11.2.js")?>></script>

</head>
<body>
<?php 

		$input = Session::get('input');
		$g = $data['qrp_id'];
		$c = Session::get('count'.$g);		
		$in = Session::get('q'.$g);
		
		
		if(isset($input[1])) {
			$bg = $input[1]; 
		}
		else {
			for($i=1;$i<=$c;$i++)
			{
			  $bg[$g.$i] ='white';
			}
        }
   //print_r($in);
   
?>

<div id="container">
  <div id="header">
    <h1>On-line Faculty Evaluation</h1>

  </div>
   <div id="navigation">
    <ul>
     <li><a href="homes">Home</a></li>
	 <?php 
       echo "<li class='selected'><a href='survey$g'>Start Evaluation</a></li>";
      ?>	   
      <li><a href="logins">Log out</a></li>
    </ul>
  </div>

<div id="content">
    
	<form name='form_3' class='form-3' action='results' onsubmit="return validate();" method='post' > 
	<br /><br />
	<table class='info'>
    <tr><td width='15%'>Instructor:</td><td><?php echo Session::get('insname'); ?></td></tr>
	<tr><td>Subject:   </td><td><?php echo Session::get('subname'); ?></td></tr>
	</table><br />
	   	<center>
	<div class='erroMsg'><i><?php if(isset($input[2])): echo $input[2]; endif;?></i></div>
	  <br />
		<table class='surv'>	
			<tr >
			<th class='firstCol'><?php echo $data['qrp_desc'];?></th>	        
	    	<th>Never</th>
			<th>Rarely</th>
			<th>Sometimes</th>
			<th>Often</th>
			<th>Always</th>
			</tr>
			
			<?php 
			$questions = $data['questions']; 
			foreach($questions as $d) {?>
			<tr bgcolor=<?php echo $bg[$d->qid];?>>
			<?php
						
			echo"<td class='firstCol' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'>$d->qid . $d->qtext</td>";	 
			
			if(isset($in["$d->qid"]) && $in["$d->qid"]=='1'){
	    	echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='1' class='radio' id='$d->qid' checked></td>";
			} else {echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='1' class='radio' id='$d->qid'></td>";}        
			
			if(isset($in["$d->qid"]) && $in["$d->qid"]=='2'){
	    	echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='2' class='radio' id='$d->qid' checked></td>";
			} else {echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='2' class='radio' id='$d->qid'></td>";}     
                    
			if(isset($in["$d->qid"]) && $in["$d->qid"]=='3'){
	    	echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='3' class='radio' id='$d->qid' checked></td>";
			} else {echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='3' class='radio' id='$d->qid'></td>";} 
                  
			if(isset($in["$d->qid"]) && $in["$d->qid"]=='4'){
	    	echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='4' class='radio' id='$d->qid' checked></td>";
			} else {echo"<td class='Col'style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='4' class='radio' id='$d->qid'></td>";}
			       
			if(isset($in["$d->qid"]) && $in["$d->qid"]=='5'){
	    	echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='5' class='radio' id='$d->qid' checked></td>";
			} else {echo"<td class='Col' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'><input type='radio' name='$d->qid' value='5' class='radio' id='$d->qid'></td>";}
		   
		   }
		   ?>
	
        </tr>
	   </table><br /><br /> 
	    <input type="hidden" name="group" value="<?php echo $data['qrp_id'];?>">
		
	</center>	
		 <p class="submit">		
		 <button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>					
		</p>
<?php

      $arrayG = DB::table('tblgroup')->lists('grp_id');			
		if ($data['qrp_id']!='A'){			  
			while ($currentG = current($arrayG)) {
				if ($currentG == $data['qrp_id']) {
				$prevGkey = key($arrayG)-1;
			}
			next($arrayG);
			}
			$prevV = $arrayG[$prevGkey];		
		echo "<span class='back'><a href='survey$prevV' class='back'><<</a></span><br /><br />";
		}
		
?>
	 
    </form>
    </div>
  

  
  <div id="footer">
    <p>&copy; 2014-2015 On-line Faculty Evaluation | <a href="#">Contact Us</a>| <a href="login">Log out</a></p>
  </div>
</div>

</body>
</html>
