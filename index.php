<!DOCTYPE html >
<html>

<head>
	<title>Game Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="body_bg">
	<div align="center">

		<h3>Game Login</h3>
		<form id="login-form" method="post" action="checkUser.php">
			<table border="0.5">
				<tr>
					<td><label for="user_id">Username</label></td>
					<td><input type="text" name="user_id" id="user_id"></td>
				</tr>
				<tr>
					<td><label for="user_pass">Password</label></td>
					<td><input type="password" name="user_pass" id="user_pass"/></td>
				</tr>

				<tr>

					<td><input type="submit" value="Submit" />
				</tr>
			</table>
		</form>
	</div>
</body>

</html>
