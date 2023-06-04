<?php
include("Connection.php");

$querry="select * from stream";
$result = mysqli_query($con,$querry);
if(isset($_REQUEST['del']))
{
	$querry="delete from stream where c_id='".$_REQUEST['del']."'";
	mysqli_query($con,$querry);
	header("location:stream.php");
}
?>
<a href="add_stream.php">ADD STREAMS</a>
<table>
<tr>
<td>Stream ID</td>
<td>Name</td>
<td>Action</td>
</tr>
<?php while($fetch = mysqli_fetch_object($result)) { ?>
<tr>
<td>
<?php echo $fetch->c_id; ?>
</td>
<td>
<?php echo $fetch->c_name; ?>
</td>
<td>
<a href="edit_stream.php?id=<?php echo $fetch->c_id; ?>">Edit</a>
</td>
<td>
<a href="stream.php?del=<?php echo $fetch->c_id; ?>">Delete</a>
</td>
</tr>
<?php }?>
</table>