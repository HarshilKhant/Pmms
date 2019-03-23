<?php
//header.php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Jay Balaji</title>
		<script src="js/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
        
	</head>
	<body style="background-color: #CFE2F0">
		<div class="container">
			<h1 align="center" style="color: #004d99">Jay Balaji</h1><br/>

			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
					</ul>
					<ul class="nav navbar-nav">
					<?php
					if($_SESSION['type'] == 'master')
					{
					?>
						<li><a href="user.php">User</a></li>
						<li><a href="category.php">Category</a></li>
						<li><a href="brand.php">Brand</a></li>
                        <li><a href="product.php">Product</a></li>
						<li><a href="order.php">Order</a></li>
                        <li><a href="Send_Text.php">Send-Text</a></li>
                        <li><a href="track_courier.php">Track-Order</a></li>
                        <li><a href="attendence/index.php">Attendance</a></li>
                        <li><a href="attendence/admin/record.php">View Attendance</a></li>
                        
					<?php
					}
                    else
                    {
                    ?>
                        <li><a href="product_user.php">Product</a></li>
						<li><a href="order.php">Order</a></li>
                        <li><a href="Send_Text.php">Send-Text</a></li>
                        <li><a href="track_courier.php">Track-Order</a></li>
                    <?php
                    }
					?>
                        
                      
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span> <?php echo $_SESSION["user_name"]; ?></a>
							<ul class="dropdown-menu">
								<li><a href="profile.php">Profile</a></li>
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>

				</div>
			</nav>
			