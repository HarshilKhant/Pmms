<!DOCTYPE html>
<html lang = "eng">
	<head>
		<meta charset = "utf-8" />
		<title>Jay Balaji</title>
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css"/>
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
			<div class = "col-lg-3"></div>
			<div class = "col-lg-6 well">
				<h2 align="center">Send Message</h2>
				<br />
				<div id = "result"></div>
				<br />
				<br />
				<form action="<?php echo $_SERVER["PHP_SELF"];?>" enctype = "multipart/form-data" method="post">
					<div class = "form-group">
						<label>Number:</label>
						<input type = "text" class = "form-control" required = "required" name="name">
						<br/>
						<br/>
						<div id = "error"></div>
                        <label>Message:</label>
                        <textarea  class = "form-control" required = "required" name="txtarea"></textarea>
						<br />
						<br />
						<div id = "error"></div>
						<br />
						<!---<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-login"></span>Send</button>--->
                        <input type = "submit" class = "form-control" name="Send" value="Send" onClick="myfunc()"/>
					</div>
				</form>
			</div>
		</div>
	</body>
    <?php
	// Authorisation details.
    if(isset($_POST['Send'])){
	$username = "khantharshil123@gmail.com";
	$hash = "8904d96e9da48f48ae9690ea725d1dabad59be78fd296ec09460c54337bdec91";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "TXTLCL"; // This is who the message appears to be from.
	$numbers = $_POST['name']; // A single number or a comma-seperated list of numbers
	$message = $_POST['txtarea'];
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
    }
?>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
</html>