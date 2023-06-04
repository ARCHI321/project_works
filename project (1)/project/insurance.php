<?php
include("connection.php");
$querry="select * from insurance";
$result=mysqli_query($con,$querry);
?>
<a href="add_insurance.php">ADD New Insurance</a>
<table>
<tr><td>Name</td><td>Minimum Premium</td><td>Action</td></tr>
<?php while($fetch=mysqli_fetch_object($result)){?>
<tr>
<td>
<?php echo $fetch->name?>
</td>
<td>
<?php echo $fetch->minp?>
</td>

<td>
<a href="edit_insurance.php?id1=<?php echo $fetch->in_id?>">Edit</a>
</td>
<td>
<a href="delete_insurance.php?id2=<?php echo $fetch->in_id?>">Delete</a>
</td>
</tr>
<?php }?>