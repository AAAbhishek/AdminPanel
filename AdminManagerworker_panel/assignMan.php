<?php

require 'connect.php';
	$empid = $_POST['empid'];
	$date = $_POST['date'];
	$description = $_POST['description'];
	//die(mysqli_error($conn));
	$sql = "insert into schedule values('$empid','$date','$description')";
	$result = mysqli_query($conn,$sql);
	header("location:tables.php");

?>