<?php
include("connection.php");
$querry="select * from employee";
$result=mysqli_query($con,$querry);

if(isset($_REQUEST['id2']))
{
	$querry="delete from employee where empid='".$_REQUEST['id2']."'";
	mysqli_query($con,$querry);
	header("location:employee.php");
}
?>


