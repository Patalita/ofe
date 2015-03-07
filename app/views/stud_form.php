<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Form | Online Faculty Evaluation</title>
        <meta name="description" content="Form 2 | On-line Faculty Evaluation" />
        <meta name="keywords" content="On-line evaluation" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href=<?php echo asset("../favicon.ico")?>> 
		<link rel="stylesheet" href=<?php echo asset("css/student_css.css")?> type="text/css" media="screen,projection" />
		<script src=<?php echo asset("js/jquery-1.11.2.js")?>></script>
		<script type="text/javascript">
		$( document ).ready(function() {
			
			$('#subname').change(function() {
				$("#insname > option").remove();
				var subj_code = $(this).val();

				//alert(subj_code);
				
				$.ajax({
				    type: "GET",
					dataType: "json",
					url: "stud_ins/" + subj_code,
					data: {subj_code : $(this).val()},
					success: function(data){
					  for (row in data) { 
					   $('#insname').append($('<option></option>').attr('value',data[row].ins_id).text(data[row].ins_fname + ' '+ data[row].ins_lname));	
					  }
					},
					error: function(jqXHR,textStatus, errorThrown){
					   alert(errorThrown);
					}
				
				});
				
						   
			});			
		});
		</script>
		</head>
		<body>
        <div class="container">	
			<header>
			
				<h1><strong>On-line Faculty Evaluation</strong> </h1>				
				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>				
			</header>			
			<section class="main">
			<?php 
				$sum = DB::table('tblresults')
					->join('tblsubjects', 'tblresults.subj_code', '=', 'tblsubjects.subj_code')
					->join('tblinstructors', 'tblresults.ins_code', '=', 'tblinstructors.ins_id')
					->where('tblresults.stu_id', Session::get('student_id'))
					->select('tblsubjects.subj_desc', 'tblinstructors.ins_fname', 'tblinstructors.ins_lname','tblresults.evaluated')
					->get(); 
	?>
	
	<form class='form-2' action='forms' method='post'>
		<table style='width:100%;' cellpadding='50'>
            <tr><td width='55%' valign='top'>		
					<table style='width:100%;'>
						<tr><th colspan='3' style='border-bottom: 1px solid rgba(0, 0, 0, 0.1)'>Evaluation Summary </th></tr>	
						 <tr><th>Subjects</th><th>Instructor</th><th>Status</th></tr>
						 <?php foreach ($sum as $s) { 
						 $stat = ($s->evaluated == 1 ? "Done" : "Pending");
						 echo "<tr><td>$s->subj_desc</td><td>$s->ins_fname $s->ins_lname</td><td>$stat</td></tr>";
						 } ?>
						 </table>
			    </td><td valign='top' style='border-left: 1px solid rgba(0, 0, 0, 0.1);padding:10px 20px 10px 20px'>				
					<p class="field">						
						<b>Subject:</b><br> 
						<select name="subname" id='subname'>
						<option value="xxx">Select Subject...</option>						
						<?php $sub = $data['sub'];
 						foreach ($sub as $key=>$value){?>
						<option value="<?php echo $key;?>"><?php echo $value;?></option>
						<?php } ?>
						</select>
					</p>
					<p class="field">						
						<b>Instructor:</b><br> 
						<select name="insname" id='insname'>
						<option value="xxx">Select Instructor...</option>
						<?php $ins = $data['ins'];
 						foreach ($ins as $key1=>$value1){?>
						<option value="<?php echo $key1;?>"><?php echo $value1;?></option>
						<?php } ?>					
						</select>
						
					</p>
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
			</td>
		</tr>
        </table>		
				</form>
			
			</section>
			<center><div class='erroMsg'><i><?php echo Session::get('errMsg');?></i></div></center><br><br>
        </div>
		<center><p>&copy; 2014-2015 On-line Faculty Evaluation | <a href="logins">Log out</a></p><center>
    </body>
</html>