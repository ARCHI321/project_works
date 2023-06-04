<!DOCTYPE html>
<html lang="en">

<?php 
	include "./Components/Shared/header.php";
?>

<body>

	<div id="wrapper">

		<div id="banner">
			<div class="container">
				<div class="title">
					<h2>SOFTWARE ENGINEERING LAB</h2>
				</div>
			</div>
		</div>

		<div id="page" class="container">
			<div class="title">
				<button class="button-primary" onclick="document.location='./Server/index.php'">Admin</button>
				<button class="button-primary" onclick="document.location='./Client/index.php'">Client</button>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>
