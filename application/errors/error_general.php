<!DOCTYPE html>
<!--
   ___               __                 __  __          _____     __          
  / _ \___ _  _____ / /__  ___  ___ ___/ / / /  __ __  / __(_)__ / /  ___ ____
 / // / -_) |/ / -_) / _ \/ _ \/ -_) _  / / _ \/ // / / _// (_-</ _ \/ -_) __/
/____/\__/|___/\__/_/\___/ .__/\__/\_,_/ /_.__/\_, / /_/ /_/___/_//_/\__/_/   
                        /_/                   /___/                           
-->
<html lang="en">
	<head>
		<title>Bootstrap Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
<?php if ($status_code == 401): ?>
			<div class="jumbotron">
				<h1>Sorry!</h1>
				<p>You do not have permission for this page.</p>
				<p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>account/doLogout" role="button">Login</a></p>
			</div>
<?php elseif ($status_code == 402): ?>
<?php else: ?>
			<div class="jumbotron">
				<h1><?php echo $heading; ?></h1>
				<p><?php echo $message; ?></p>
				<p><a class="btn btn-primary btn-lg" href="<?php echo base_url(); ?>account/doLogout" role="button">Login</a></p>
			</div>
<?php endif; ?>   
		</div>
	</body>
</html>