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
	<li>{{ HTML::linkRoute('checkuser','Home')}}</li>
	<li class="selected">{{ HTML::linkRoute('showSubjects','List of Subjects')}}</li>
	<li>{{ HTML::linkRoute('loginpage','Log out')}}</li>
	</ul>
  </div>
<?
                  /*
				    if($key=='subj_course') { Session::put('subj_course',$value); }
					if($key=='subj_sy') { Session::put('subj_sy',$value); }
					if($key=='subj_section') { Session::put('subj_section',$value); }
					if($key=='subj_sem') { Session::put('subj_sem',$value); }
					if($key=='subj_year') { Session::put('subj_year',$value); }
					*/
  ?>
  <div id="content">
 	@yield('content')
    
  </div>
   
  
  <div id="footer">
    <p>&copy; 2014-2015 On-line Faculty Evaluation | <a href="#">Contact Us</a>| <a href="#">Log out</a></p>
  </div>
</div>
</body>
</html>
