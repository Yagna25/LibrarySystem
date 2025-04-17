<!DOCTYPE html>
<?php 
	session_start();
	if(ISSET($_SESSION['admin_id'])){
		header('location:home.php');
	}
?>
<html lang = "eng">
	<head>
		<title>Library System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
	</head>
	<body style = "background-color:#d3d3d3;">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "160px" height = "50px" />
					<h4 class = "navbar-text navbar-right"> Institute Of Technology</h4>
				</div>
			</div>
		</nav>Institute of Technology
		<div class = "container-fluid" style = "margin-top:70px;" >
			<div class = "col-lg-3 well">
				<br />
				<br />
				<h4>Login Here..</h4>
				<hr style = "border:1px solidrgb(255, 255, 255); width:300px;"  />
				<form enctype = "multipart/form-data">	
					<div id = "username_warning" class = "form-group">
						<label class = "control-label">Username:</label>
						<input type = "text" class = "form-control" id = "username"/>
					</div>
					<div id = "password_warning" class = "form-group">
						<label class = "control-label">Password:</label>
						<input type = "password" class = "form-control" id = "password"/>
					</div>
					<br />
					<div class = "form-group">
						<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-save"></span> Login</button>
					</div>
				</form>	
				<div id = "result"></div>
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-8 well">
				<img src = "images/back.jpg" height = "770px" width = "1215px" style = "margin-top:5px" />
			</div>
		</div>
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid">
				<label class = "navbar-text pull-right">YGANA PATEL :- 22171341149 </label>
			</div>
		</nav>
	</body>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src = "js/jquery.js"></script>
	
	<script src = "js/login.js"></script>
</html>