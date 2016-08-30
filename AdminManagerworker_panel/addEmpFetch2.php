<?php
require 'connect.php';
$empName = $_GET['term'];
//print_r($_GET);
//die();
$sql  = "select * from emp where empname like '%".$empName."%'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row['empname'];
}
echo json_encode($data);
?>