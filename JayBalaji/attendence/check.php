<?php
	require_once 'admin/connect.php';
	$student = $_POST['student'];
	$q_student = $conn->query("SELECT * FROM `user_details` WHERE `user_id` = '$student'") or die(mysqli_error());
	$v_student = $q_student->num_rows;
	if($v_student > 0){
		echo 'Success';
	}else{
		echo 'Error';
	}