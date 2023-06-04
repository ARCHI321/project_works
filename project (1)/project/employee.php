<?php
include("connection.php");
$querry="select * from employee";
$result=mysqli_query($con,$querry);
?>


<a href="add_employee.php">Add New Employee</a>
<a href="insurance.php">View Insurances</a>
<table>
<tr><td>Name</td><td>Email ID</td><td>Contact No</td><td>Action</td></tr>
<?php while($fetch=mysqli_fetch_object($result)){?>
<tr>
<td>
<?php echo $fetch->name?>
</td>
<td>
<?php echo $fetch->email?>
</td>
<td>
<?php echo $fetch->contact_no?>
</td>
<td>
<a href="edit_employee.php?id1=<?php echo $fetch->empid?>">Edit</a>
</td>
<td>
<a href="delete_employee.php?id2=<?php echo $fetch->empid?>">Delete</a>
</td>
</tr>
<?php }?>




</table>

