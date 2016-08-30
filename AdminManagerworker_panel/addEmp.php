<?php
/*The php file is for the admin panel 
to add the employees into the database
*/
require 'connect.php';
if(isset($_POST['submit'])){
	print_r($_POST);
	die();
	$id=$_POST['id'];	
	$role=$_POST['role'];
	$name=$_POST['name'];
	$age=$_POST['age'];
	$addr=$_POST['addr'];
	$email=$_POST['email'];
	$val = 'null';
	$age = intval($age);
}
stripslashes($id);
mysqli_real_escape_string($conn,$id);

$sql = "insert into emp values('$id','$role','$name','$age','$addr','$email',$val)";
$result = mysqli_query($conn,$sql)or die(mysqli_error($conn));
echo "Value Inserted";
//$count = mysqli_num_rows($result);
header("location:tables.php");
?>










