<?php
include("connection.php");
if(isset($_POST['insert']))
{
	$querry="insert into insurance set name='".$_POST['name']."',minp='".$_POST['minp']."'";
	mysqli_query($con,$querry);
	header("location:insurance.php");

}

?>
<html>
<form method ="post" action="">
<table>
<tr><td>Name:</td><td><input type="text" name="name" value="" /></td></tr>
<tr><td>minimum Premium:</td><td><input type="text" name="minp" value="" /></td></tr>

<tr><td><input type="submit" name="insert" value="INSERT" /></td></tr>
</table>
</form>
</html>