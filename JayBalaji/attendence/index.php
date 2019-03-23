
<!DOCTYPE html>
<html lang = "eng">
	<head>
		<meta charset = "utf-8" />
		<title>Jay Balaji</title>
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.min.css"/>
	</head>
	<body>
		<div>
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<div class = "col-lg-4"></div>
			<div class = "col-lg-4 well">
				<h2 align="center">Attendance Login</h2>
				<br />
				<div id = "result"></div>
				<br />
				<br />
				<form enctype = "multipart/form-data">
					<div class = "form-group">
						<label>Employee ID:</label>
						<input type = "text" id = "student" class = "form-control" required = "required"/>
						<br />
						<br />
						<div id = "error"></div>
						<br />
						<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-login"></span>Login</button>
					</div>
				</form>
			</div>
		</div>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
</html>