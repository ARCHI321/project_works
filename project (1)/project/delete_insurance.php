<?php
include("connection.php");
$querry="select * from insurance";
$result=mysqli_query($con,$querry);

if(isset($_REQUEST['id2']))
{
	$querry="delete from insurance where in_id='".$_REQUEST['id2']."'";
	mysqli_query($con,$querry);
	header("location:insurance.php");
}
?>


