<?php
include("Connection.php");
if(isset($_POST['click']))
{
	$querry="update student set name='".$_POST['name']."' ,address='".$_POST['address']."' ,email='".$_POST['email']."' where u_id='".$_POST['id']."'";
	mysqli_query($con, $querry);
	
}
$querry="select * from student where u_id='".$_REQUEST['id']."'";
$result = mysqli_query($con, $querry);
$fetch = mysqli_fetch_object($result);
?>
<html>
<form method="post" action="">
<a href="student.php">GO TO STUDENT</a>
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="name" value="<?php echo
$fetch->name; ?>" placeholder="name"></td>
</tr>
<tr>
<td>Address:</td>
<td><input type="text" name="address" value="<?php echo
$fetch->address; ?>" placeholder="Address"></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" value="<?php echo
$fetch->email; ?>" placeholder="Email"></td>
</tr>
<tr>
<td><input type="submit" name="click" value="UPDATE" /></td><td><input type="hidden" name="id" value="<?php echo
$fetch->u_id; ?> />"</td>
</tr>
</table>
</form>
</html>