<?php
include("Connection.php");
if(isset($_POST['insert']))
{
	$querry="insert into student set name='".$_POST['name']."' ,address='".$_POST['address']."' ,email='".$_POST['email']."' ,c_id='".$_POST['stream']."'";
	mysqli_query($con, $querry);
	header("location:student.php");
}
$querry="select * from stream";
$result=mysqli_query($con,$querry);
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
<td>Name:</td>
<td><input type="text" name="name" value=""
placeholder="name"></td>
</tr>
<tr>
<td>Select Stream:</td>
<td><select name="stream" id="cars"><?php while($fetch=mysqli_fetch_object($result)){?>
<option value="<?php echo $fetch->c_id;?>"><?php echo $fetch->c_name;?></option><?php }?></select></td>
</tr>
<tr>
<td>Address:</td>
<td><input type="text" name="address" value=""
placeholder="Address"></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" value=""
placeholder="Email"></td>
</tr>
<tr>
<td><input type="submit" name="insert" value="insert"></td>
</tr>
</table>
</form>
</html>