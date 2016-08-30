<?php
session_start();
if(isset($_SESSION['email'])){
	header("location:indexM.php");
}else{
	echo "Unknown User";
	header("location:login.php");
}
?>