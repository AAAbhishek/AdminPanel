<?php
require 'connect.php';
function retriveSchedule($email){
	$email = $_POST['email'];
	echo $email;
	//die (mysqli_error($conn));
	$sql = "select * from schedule where empid in(select empid from emp where email = '$email')";
	$result = mysqli_query($conn,$sql);
	echo $result;
}
?>