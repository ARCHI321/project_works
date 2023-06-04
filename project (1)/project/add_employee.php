<?php
include("connection.php");
if(isset($_POST['insert']))
{
	$querry="insert into employee set name='".$_POST['name']."',email='".$_POST['email']."',password='".$_POST['password']."',contact_no='".$_POST['contact']."'";
	mysqli_query($con,$querry);
	header("location:employee.php");

}



?>
<html>
<form method ="post" action="">
<table>
<tr><td>Name:</td><td><input type="text" name="name" value="" /></td></tr>
<tr><td>Email ID:</td><td><input type="text" name="email" value="" /></td></tr>
<tr><td>Password:</td><td><input type="text" name="password" value="" /></td></tr>
<tr><td>Contact:</td><td><input type="text" name="contact" value="" /></td></tr>
<tr><td><input type="submit" name="insert" value="INSERT" /></td></tr>
</table>
</form>
</html>