<?php
/*The php file is for the admin panel 
to add the employees into the database
*/
	require 'connect.php';
/*	if(isset($_POST['submit'])){
	*/
	$id=$_POST['id'];	
	$name=$_POST['name'];

/*}
else{
	echo "Enter all correct and each values";
}*/

$sql = "delete from emp where empid = $id";
if($sql){
	$result = mysqli_query($conn,$sql);
}
else{
	header("location:index.php");
}
header("location:tables.php");
//$count = mysqli_num_rows($result);

?>










