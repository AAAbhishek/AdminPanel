<?php
session_start();
if(isset($_SESSION['email'])){
	header("location:indexW.php");
}else{
	echo "Login Successful";
	header("location:login.php");
}
?>