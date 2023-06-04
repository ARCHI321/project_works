<?php
include("connection.php");
if(isset($_POST['insert']))
{
	$querry="insert into user set name='".$_POST['name']."',gender='".$_POST['gender']."',locality='".$_POST['locality']."',email='".$_POST['email']."',password='".$_POST['password']."',contact_no='".$_POST['contact']."'";
	mysqli_query($con,$querry);
	header("location:user.php");//provide the name of your file here in location

}


?>
<html>
<!--adjust with your html frontend-->
<form method ="post" action="">
<table>
<tr><td>Name:</td><td><input type="text" name="name" value="" /></td></tr>
<tr><td>Gender:</td><td><input type="text" name="gender" value="" /></td></tr>
<tr><td>locality:</td><td><input type="text" name="locality" value="" /></td></tr>
<tr><td>Email ID:</td><td><input type="text" name="email" value="" /></td></tr>
<tr><td>Password:</td><td><input type="text" name="password" value="" /></td></tr>
<tr><td>Contact:</td><td><input type="text" name="contact" value="" /></td></tr>
<tr><td><input type="submit" name="insert" value="LOGIN" /></td></tr>
</table>
</form>
</html>