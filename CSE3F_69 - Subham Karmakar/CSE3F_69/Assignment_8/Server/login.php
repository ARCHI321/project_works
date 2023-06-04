<!DOCTYPE html>
<html lang="en">

<?php include "./Components/Shared/header.php"; ?>

<body>

	<div id="wrapper">

		<div id="banner">
			<div class="container">
				<div class="title">
					<h2>SOFTWARE ENGINEERING LABORATORY</h2>
					<h2>ASSIGNMENT 6</h2>
				</div>
			</div>
		</div>

		<div id="page" class="container">
			<div class="title">
				<h4>Login</h4>
				<form style="margin: auto;" method="POST" action="handle_login.php" enctype="multipart/form-data">
                    <table style="margin: auto;">
                        <tr>
                            <td>Email Id</td>
                            <td><input type="text" name="email" value="" /></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" name="password" value="" /></td>
                        </tr>
                    </table>

					<input class="button-secondary" type="submit" name="login" value="LOGIN" />
                </form>
			</div>
		</div>

	</div>

	<?php include "./Components/Shared/footer.php" ?>

</body>

</html>