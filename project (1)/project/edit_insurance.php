<?php
include("connection.php");

if(isset($_POST['edit']))
{
	$querry="update insurance set name='".$_POST['name']."',minp='".$_POST['minp']."' where in_id='".$_REQUEST['id1']."'";
	mysqli_query($con,$querry);
	header("location:insurance.php");
}
$querry="select * from insurance where in_id='".$_REQUEST['id1']."'";
$result=mysqli_query($con,$querry);
$fetch=mysqli_fetch_object($result);


?>
<html>
<form method ="post" action="">
<table>
<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo $fetch->name;?>" /></td></tr>
<tr><td>Minimum Premium:</td><td><input type="text" name="minp" value="<?php echo $fetch->minp;?>" /></td></tr>

<tr><td><input type="submit" name="edit" value="UPDATE" /></td></tr>
</table>
</form>
</html>