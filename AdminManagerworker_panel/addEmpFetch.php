<?php
require 'connect.php';
$eid = $_GET['term'];
//print_r($_GET);
//die();
$sql  = "select * from emp where empid like '%".$eid."%'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
    $data[] = $row['empid'];
}
echo json_encode($data);
?>