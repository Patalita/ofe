<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Student Form | On-Faculty Evaluation</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href=<?php echo asset("../favicon.ico")?>> 
<link rel="stylesheet" href=<?php echo asset("css/student_css.css")?> type="text/css" media="screen,projection" />
<script src=<?php echo asset("js/modernizr.custom.63321.js")?>></script>

</head>
<body>

<div id="container">
  <div id="header">
    <h1>On-line Faculty Evaluation</h1>

  </div>
   <div id="navigation">
    <ul>
     <li><a href="homes">Home</a></li>
      <li  class="selected"><a href="studcomment">Start Evaluation</a></li>     
      <li><a href="logins">Log out</a></li>
    </ul>
  </div>

  <div id="content">
    <form class="form-7" action='studsave' method='post' >
   	<table class='info'>
    <tr><td width='15%'>Instructor:</td><td> <?php echo Session::get('insname'); ?></td></tr>
	<tr><td>Subject:   </td><td><?php echo Session::get('subname'); ?></td></tr>
	</table>	
				<p class="field">
												
				</p>
		        <p class="field">
					<label>Additonal Comment/Evaluation:</label><textarea class="horiz" rows="10" cols="50" name='comment'></textarea>
				</p> 
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
					
			</form>
			
 <a href="surveyF" class='back'><<</a>	  
    </div>

   
  
  <div id="footer">
    <p>&copy; 2014-2015 On-line Faculty Evaluation | <a href="#">Contact Us</a>| <a href="#">Log out</a></p>
  </div>
</div>
</body>
</html>
