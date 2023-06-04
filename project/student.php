<?php
include("Connection.php");

$querry="select * from student";
$result = mysqli_query($con,$querry);
if(isset($_REQUEST['del']))
{
	$querry="delete from student where u_id='".$_REQUEST['del']."'";
	mysqli_query($con,$querry);
	header("location:student.php");
}
?>
<a href="add_student.php">ADD STUDENTS</a>
<table>
<tr>
<td>Student ID</td>
<td>Name</td>
<td>Address</td>
<td>Email</td>
<td>Action</td>
</tr>
<?php while($fetch = mysqli_fetch_object($result)) { ?>
<tr>
<td>
<?php echo $fetch->u_id; ?>
</td>
<td>
<?php echo $fetch->name; ?>
</td>
<td>
<?php echo $fetch->address; ?>
</td>
<td>
<?php echo $fetch->email; ?>
</td>
<td>
<a href="edit_student.php?id=<?php echo $fetch->u_id; ?>">Edit</a>
</td>
<td>
<a href="student.php?del=<?php echo $fetch->u_id; ?>">Delete</a>
</td>
</tr>
<?php }?>
</table>