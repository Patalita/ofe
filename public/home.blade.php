<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Login | Online Faculty Evaluation</title>
        <meta name="description" content="Login | On-line Faculty Evaluation" />
        <meta name="keywords" content="On-line evaluation" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href=<?php echo asset("../favicon.ico")?>> 
		<link rel="stylesheet" href=<?php echo asset("css/andreas08.css")?> type="text/css" media="screen,projection" />
		<script src=<?php echo asset("js/modernizr.custom.63321.js")?>></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">					
			<header>			
				<h1><strong>On-line Faculty Evaluation</strong> </h1>
				<h1>Log in</h1>
				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>				
			</header>			
			<section class="main">
				<form class="form-1" action='auth' method='post'>
					<span class="field">
						<input type="text" name="username" placeholder="Username or email">
						<i class="icon-user icon-large"></i>
					</span>
						<span class="field">
							<input type="password" name="password" placeholder="Password">
							<i class="icon-lock icon-large"></i>
					</span>
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
					
				</form>
				 <center><span class='loginE'><i><?php echo $data['loginE'];?></i></span></center>
			</section>
			
        </div>
    </body>
</html>