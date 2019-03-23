<?php
//login.php

include('database_connection.php');

if(isset($_SESSION['type']))
{
	header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
{
	$query = "
	SELECT * FROM user_details 
		WHERE user_email = :user_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'user_email'	=>	$_POST["user_email"]
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['user_status'] == 'Active')
			{
				if(password_verify($_POST["user_password"], $row["user_password"]))
				{
				
					$_SESSION['type'] = $row['user_type'];
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_name'] = $row['user_name'];
					header("location:index.php");
				}
				else
				{
                    $message = "<label align='center'><div class='alert alert-danger'>Wrong Password</div></label><br>";
				}
			}
			else
			{
                $message = "<label align='center'><div class='alert alert-danger'>Your account is disabled, Contact Master</div></label><br>";
			}
		}
	}
	else
	{
        $message = "<label align='center'><div class='alert alert-danger'>Wrong Email Address</div></label><br>";
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Jay Balaji Mobile Accessories</title>		
		<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<br />
		<div class="container">
			<h2 align="center">Jay Balaji Mobile Accessories</h2>
			<br />
            <div>
            <br />
            <br />
            <div class = "col-lg-4"></div>
                <div class = "col-lg-4 well">
                    <h2 align="center">Login</h2>
                    <br />
                    <br />
                    <br />
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class = "form-group">
                            <?php echo $message;?>
                            <label>User Email:</label> <input type="email" name="user_email" class = "form-control" required = "required"><br>
                            <label>User Password: </label><input type="password" name="user_password" class = "form-control" required = "required"><br>
                            <input type="submit" name="login" value="Login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-login"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</body>
</html>