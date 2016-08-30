<?php
/*Update any field of the 
specified employee
*/

include 'connect.php';

$id=$_POST['id'];	
$role=$_POST['role'];
$name=$_POST['name'];
$age=$_POST['age'];
$addr=$_POST['addr'];
$email=$_POST['email'];

if($id!=''){
	if($role!=''){
		$sql = "update emp set role = '$role' where empid = '$id'";
		$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
	}
	if($name!=''){
		$sql = "update emp set empname = '$name' where empid = '$id'";
		$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
	}
	if($age!=''){
		$sql = "update emp set age = '$age' where empid = '$id'";
		$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
	}
	if($addr!=''){
		$sql = "update emp set address = '$addr' where empid = '$id'";
		$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
	}
	if($email!=''){
		$sql = "update emp set email = '$email' where empid = '$id'";
		$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
	}
	header("location:tables.php");
}else{
	echo "enter Employee ID";
	header("location:index.php");
}

?>