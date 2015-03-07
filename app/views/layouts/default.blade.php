<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>{{ $title }} | On-Faculty Evaluation</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<link rel="shortcut icon" href=<?php echo asset("../favicon.ico")?>> 
<link rel="stylesheet" href=<?php echo asset("css/student_css.css")?> type="text/css" media="screen,projection" />
<script src=<?php echo asset("js/jquery-1.11.2.js")?>></script>
<script src=<?php echo asset("js/mjs.js")?>></script>
</head>
<body>
<div id="container">
  <div id="header">
    <h1>On-line Faculty Evaluation</h1>
    <div>Simple. Easy.  Reliable</div>

  </div>
   <div id="navigation">
    <ul>
     <li>{{ HTML::linkRoute('home','Home') }}</li>
      <li>{{ HTML::linkRoute('instructors','Instructors') }}</li>
	   <li>{{ HTML::linkRoute('subjects','Subjects') }}</li>
       <li>{{ HTML::linkRoute('students','Students') }}</li>  
      <li>{{ HTML::linkRoute('survey','Survey') }}</li> 
	  <li>{{ HTML::linkRoute('systemUsers','User Accounts') }}</li> 
	  <li>{{ HTML::linkRoute('login','Logout') }}</li> 
    </ul>
  </div>
  <div id="content">

  		@yield('content')

			
		  
    </div>
   
  
  <div id="footer">
    <p>&copy; 2014-2015 On-line Faculty Evaluation | <a href="#">Contact Us</a>| <a href="#">Log out</a></p>
  </div>
</div>

</body>
</html>
