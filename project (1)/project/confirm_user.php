<?php
include("connection.php");
if(isset($_POST['check']))
{
	$querry="select * from user";
	$result=mysqli_query($con,$querry);
	$flag=1;
	while($fetch=mysqli_fetch_object($result))
	{
		$c=$_POST['password2'];
		$d=strval($fetch->password);
		if(strcmp($c,$d)==0)
		{
			$flag=0;
			break;
		}
	}
	if($flag==0)
	{
		header("location:premium.php");
	}
	else
		echo "Incorrect password or password does not exist";
	
	
}


?>

<html>
<form method="post" action="">
<p>Please confirm your password</p><input type="text" name="password2" value="">
<input type="submit" name="check" value="Confirm">
</form>
</html>