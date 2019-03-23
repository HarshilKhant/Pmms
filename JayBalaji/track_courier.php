<?php
//user.php

include('database_connection.php');

if(!isset($_SESSION["type"]))
{
	header('location:login.php');
}



include('header.php');

?>

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
			<div class = "col-lg-3"></div>
			<div class = "col-lg-6 well">
				<h2 align="center">Track Order</h2>
				<br />
				<div id = "result"></div>
				<br />
				<br />
				<form enctype = "multipart/form-data">
					<div class = "form-group">
						<label>Enter order-id:</label>
						<input type="text" id="YQNum" maxlength="50" class = "form-control" required = "required"/>
						<br />
						<br />
						<div id = "error"></div>
						<br />
				        <input type="button" value="TRACK" class = "btn btn-primary btn-block" onclick="doTrack()"/>		
					</div>
				</form>
			</div>
		</div>

	
<div id="YQContainer"></div>

<!--Script code can be put in the bottom of the page, wait until the page is loaded then execute.-->
<script type="text/javascript" src="//www.17track.net/externalcall.js"></script>
<script type="text/javascript">
function doTrack() {
    var num = document.getElementById("YQNum").value;
    if(num===""){
        alert("Enter your number."); 
        return;
    }
    YQV5.trackSingle({
        //Required, Specify the container ID of the carrier content.
        YQ_ContainerId:"YQContainer",
        //Optional, specify tracking result height, max height 800px, default is 560px.
        YQ_Height:560,
        //Optional, select carrier, default to auto identify.
        YQ_Fc:"0",
        //Optional, specify UI language, default language is automatically detected based on the browser settings.
        YQ_Lang:"en",
        //Required, specify the number needed to be tracked.
        YQ_Num:num
    });
}
</script>
        	</body>
    </html>