<?php
include("Connection.php");
if(isset($_POST['insert']))
{
	$querry="insert into stream set c_name='".$_POST['name']."'";
	mysqli_query($con, $querry);
	header("location:stream.php");
}
?>


<html>
<head>
<style>
form {
margin-top: 20%;
margin-left: 38%;
}
</style>
</head>
<form method="post" action="">
<table>
<tr>
<td>Stream Name:</td>
<td><input type="text" name="name" value=""
placeholder="name"></td>
</tr>
<tr>
<td><input type="submit" name="insert" value="insert"></td>
</tr>
</table>
</form>
</html>