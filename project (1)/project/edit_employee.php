<?php
include("connection.php");

if(isset($_POST['edit']))
{
	$querry="update employee set name='".$_POST['name']."',email='".$_POST['email']."',password='".$_POST['password']."',contact_no='".$_POST['contact']."' where empid='".$_REQUEST['id1']."'";
	mysqli_query($con,$querry);
	header("location:employee.php");
}
$querry="select * from employee where empid='".$_REQUEST['id1']."'";
$result=mysqli_query($con,$querry);
$fetch=mysqli_fetch_object($result);


?>
<html>
<form method ="post" action="">
<table>
<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $fetch->name;?>" /></td></tr>
<tr><td>Email ID:</td><td><input type="text" name="email" value="<?php echo $fetch->email;?>" /></td></tr>
<tr><td>Password:</td><td><input type="text" name="password" value="<?php echo $fetch->password;?>" /></td></tr>
<tr><td>Contact:</td><td><input type="text" name="contact" value="<?php echo $fetch->contact_no;?>" /></td></tr>
<tr><td><input type="submit" name="edit" value="UPDATE" /></td></tr>
</table>
</form>
</html>