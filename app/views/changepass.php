<!DOCTYPE html>
<html lang="en">
    <head>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
		<link rel="shortcut icon" href=<?php echo asset("../favicon.ico")?>> 
		<link rel="stylesheet" href=<?php echo asset("css/student_css.css")?> type="text/css" media="screen,projection" />
		<script src=<?php echo asset("js/modernizr.custom.63321.js")?>></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">					
			<header>			
				<h1><strong>On-line Faculty Evaluation</strong> </h1>
				<h1>Change Password</h1>
				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>				
			</header>			
			<section class="main">
				<form class="form-9" action='studVerify' method='post'>
					<span class="field">
						<input type="text" name="username" placeholder="Username">
						<i class="icon-user icon-large"></i>
					</span>
					<span class="field">
							<input type="password" name="opassword" placeholder="Old Password">
							<i class="icon-lock icon-large"></i>
					</span>
					<span class="field">
							<input type="password" name="npassword" placeholder="New Password">
							<i class="icon-lock icon-large"></i>
					</span>
					<span class="field">
							<input type="password" name="cnpassword" placeholder="Confirm New Password">
							<i class="icon-lock icon-large"></i>
					</span>
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
					
				</form>
			<center>
				 
				 <span class='loginE'><i><?php if (Session::has('loginE')) { echo Session::get('loginE'); }?></i></span>
			<br /><br />
			</center>
   
  
  <center>
    <p>&copy; 2014-2015 On-line Faculty Evaluation | <a href="logins">Login</a></p>
  </center>
</div>
</body>
</html>
