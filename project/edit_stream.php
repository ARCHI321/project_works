<?php
include("Connection.php");
if(isset($_POST['click']))
{
	$querry="update student set c_name='".$_POST['name']."' where c_id='".$_POST['id']."'";
	mysqli_query($con, $querry);
	
}
$querry="select * from student where c_id='".$_REQUEST['id']."'";
$result = mysqli_query($con, $querry);
$fetch = mysqli_fetch_object($result);
?>
<html>
<form method="post" action="">
<a href="student.php">GO TO STUDENTS</a>
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="name" value="<?php echo
$fetch->c_name; ?>" placeholder="name"></td>
</tr>
<tr>
<td><input type="submit" name="click" value="UPDATE" /></td><td><input type="hidden" name="id" value="<?php echo
$fetch->c_id; ?> />"</td>
</tr>
</table>
</form>
</html>