<html>
	<head>
		<title>Register Yourself</title>
	</head>

	<body>
		<div id="logo" align="center">
			<h1>LOGO<br/><hr size="3"/></h1>
		</div>
		<div id="registrationform">
			<form action="../logic/authenticate/register.php" method="post">
				<fieldset>
					<legend align="center"><h3>Register for an account</h3></legend>
					<table align="center" valign="top">
						<tr>
							<td><strong>Name</strong></td>
							<td><strong>:</strong></td>
							<td><input type="text" name="name" placeholder="Enter name"></td>
						</tr>
						<tr>
							<td><strong>Username</strong></td>
							<td><strong>:</strong></td>
							<td><input type="text" name="username" placeholder="Enter username"></td>
						</tr>
						<tr>
							<td><strong>Password</strong></td>
							<td><strong>:</strong></td>
							<td><input type="password" name="password" placeholder="Enter password"></td>
						</tr>
						<tr>
							<td><strong>Confirm Password</strong></td>
							<td><strong>:</strong></td>
							<td><input type="password" name="confirmpassword" placeholder="Retype password"></td>
						</tr>
						<tr>
							<td colspan="3" align="center"><input type="submit" name="register" value="Register"></td>
						</tr>
						<tr>
							<td colspan="3" align="center"><a href="login.php">Already have an account !! Login here</a></td>
						</tr>
					</table>
				</fieldset>
			</form>
		</div>
	</body>
</html>