<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Finish Evaluation | Online Faculty Evaluation</title>
        <meta name="description" content="Finish Evaluation | On-line Faculty Evaluation" />
        <meta name="keywords" content="On-line evaluation" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href=<?php echo asset("../favicon.ico")?>> 
		<link rel="stylesheet" href=<?php echo asset("css/student_css.css")?> type="text/css" media="screen,projection" />
		<script src=<?php echo asset("js/jquery-1.11.2.js")?>></script>
		<script src=<?php echo asset("js/mjs.js")?>></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body>
        <div class="container">
										
			<section class="main">
				<form class="form-4" action='studconfirm' method='post'>
					<p class="field">
					<center>
					Thank you for your time. Your answers were saved. <br>
					Do you  want to evaluate another Instructor?
					<br><br>
						<input type="radio" name="radc" value="1" class="block">Yes     
						<input type="radio" name="radc" value="2" class="block">No					
						</center>
					</p>						
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</form>
			</section>
        </div>
    </body>
</html>