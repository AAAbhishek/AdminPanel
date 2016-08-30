<?php

	//session_start();
	//require 'loginScript.php';
	//print_r ($_POST);
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$sql = "SELECT * FROM $tbl_name WHERE email='$email' and pwd='$pwd'";
	$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
	
	// Mysql_num_row is counting table row
	$count = mysqli_num_rows($result);
		
	// If result matched $myusername and $mypassword, table row must be 1 row
	$power = '';
	//$empid = '';
	if($count>=1){
		session_start();
		while($row = mysqli_fetch_assoc($result)){
			$power = $row['role'];
			//$empid = $row['empid'];
			//echo $power;
		}
	}
	//die();	
	// Register $myusername, $mypassword and redirect to file "login_success.php"
	$power = strtolower($power);
	if($power == "manager"){
		$_SESSION['email'] = $email or die(mysqli_error($conn));
		$_SESSION['pwd'] = $pwd ;
	//	echo "<form id = 'hidden' method = 'post' action = 'indexM.php'><input type = 'hidden' name = 'email' value = '$email'></form>";
	//	echo "<script>window.onload = function(){document.getElementById('hidden').submit();}</script>";
	//	header("location:indexM.php");
	}else if($power == "admin"){
		$_SESSION['email'] = $email or die(mysqli_error($conn));
		$_SESSION['pwd'] = $pwd ; 
		header("location:start_sessionA.php");
	}else if($power == "worker"){
		$_SESSION['email'] = $email or die(mysqli_error($conn));
		$_SESSION['pwd'] = $pwd ; 
		include 'start_sessionW.php';
	}
	else{
		header("location:login.php");
		echo "Wrong Username or Password";
	}
?>