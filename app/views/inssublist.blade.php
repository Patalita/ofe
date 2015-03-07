<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Subjects | On-line Faculty Evaluation</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href=<?php echo asset("css/student_css.css")?> type="text/css" media="screen,projection" />
</head>
<body>
<div id="container">
  <div id="header">
    <h1>On-line Faculty Evaluation</h1>

  </div>
   <div id="navigation">
	<ul>
     <li ><a href="checks">Home</a></li>
      <li class="selected"><a href="displaySubjects">List of Subjects</a></li>	  
      <li><a href="logins">Log out</a></li>
	</ul>
  </div>

  <div id="content">
  <table cellspacing='0' id="tblsurvey">
    
	<tr>
	<th>Subject Code</th>
	<th>Description</th>
	<th>Course</th>
	<th>Year Level</th>
	<th>S.Y.</th>
	<th align='center' colspan='3'>Result</th>
	</tr>
	<?php foreach ($data as $d) {?>
	<tr>
	<td><?php echo $d->subj_code;?></td>
	<td><?php echo $d->subj_desc;?></td>
	<td><?php echo $d->subj_course;?></td>
	<td><?php echo $d->subj_year;?></td>
	<td><?php echo $d->subj_sy;?></td>
	<td>{{ HTML::linkRoute('resultsPage','Weighted Mean',array($d->subj_code))}}</td>
	<td>{{ HTML::linkRoute('resultsPage2','Percentage',array($d->subj_code))}}</td>
	<td>{{ HTML::linkRoute('resultsPage3','View Student Comments',array($d->subj_code))}}</td>
  
	
	<tr> 
	<?php } ?>
  <table>
  <br /><br />
    
    </div>
   
  
  <div id="footer">
    <p>&copy; 2014-2015 On-line Faculty Evaluation | <a href="#">Contact Us</a>| <a href="#">Log out</a></p>
  </div>
</div>
</body>
</html>
