<?php
	require_once 'admin/connect.php';
	$student = $_POST['student'];
    date_default_timezone_set("Asia/Kolkata");
	$time = date("H:i", strtotime("now"));
	$date = date("Y-m-d", strtotime("now"));
	$q_student = $conn->query("SELECT * FROM `user_details` WHERE `user_id` = '$student'") or die(mysqli_error());
	$f_student = $q_student->fetch_array();
	$student_name = $f_student['user_name'];
	$conn->query("INSERT INTO `time`(student_no,student_name,time,date) VALUES('$student', '$student_name', '$time', '$date')") or die(mysqli_error());
	echo "<h3 class = 'text-muted'>".$student_name." <label class = 'text-info'>at  ".date("h:i a", strtotime($time))."</label></h3>";