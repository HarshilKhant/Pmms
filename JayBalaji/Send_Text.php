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
<br>
<br>
<div class = "col-lg-4"></div>
<div class = "col-lg-4 well">
    <h2 align="center">Send Message</h2>
    <br />
    <div id = "result"></div>
    <br />
    <br />
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<div class = "form-group">
<label>Enter Contact:</label> <input type="text" name="contact" class = "form-control" required = "required" required pattern="[0-9]{10}" title="Name must be alphabetic and contain atleast 3 characters"><br>
<label>Enter Message: </label>
    <textarea name="msg" class="form-control" required = "required"></textarea><br>
 <!--   <input type="text" name="msg" class = "form-control" required = "required"><br>-->
<input type="submit" name="sumbit" value="Send" class = "btn btn-primary btn-block">

    
    <span class = "glyphicon glyphicon-login"></span>
    </div>
</form>
    </div>
    </div>
</body>
</html>

<?php
/*if(isset($_POST['name']))
{
 echo $_POST["name"];
 echo $_POST["email"];
}
*/ ?>






<?php
	require('Textlocal.class.php');
    if( isset($_POST['contact']) )
    {
    //be sure to validate and clean your variables
   // $val1 = htmlentities($_GET['number']);
   // $val2 = htmlentities($_GET['txtmsg']);
     //   echo $_POST['contact'];
            
 
	$Textlocal = new Textlocal(false, false, 'f11WyhV+2h4-OMzq86lUYsdegO3P4BY0qts6hI8ui8');
 
	$numbers = array(htmlentities($_POST["contact"]));
	$sender = 'TXTLCL';
	$message = htmlentities($_POST["msg"]);
    $test='false';
 
	$response = $Textlocal->sendSms($numbers, $message, $sender);
	if(isset($response))
    {
        ?><script>alert("Message Sent")</script><?php
    }
    }
?>

<?php
