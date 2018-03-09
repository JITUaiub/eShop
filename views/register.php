<html>
	<head>
		<title>Register Yourself</title>
	</head>
	<script type="text/javascript">
		function validate(){
			var username = document.forms["registrationform"]["username"];
			var password = document.forms["registrationform"]["password"];
			var confirmpassword = document.forms["registrationform"]["confirmpassword"];
			var name = document.forms["registrationform"]["name"];
			var errorMsg = document.getElementById("errorMsg");

			if(username.value == "" || password.value == "" || confirmpassword.value == "" || name.value == ""){
				errorMsg.textContent = "All fields required.";
				return false;
			}else if(password.value != confirmpassword.value){
					errorMsg.textContent = "Passwords didn't matched";
				return false;
			}else{
				errorMsg.textContent = "";
				return true;
			}
		}
	</script>
	<body>
		<div id="logo" align="center">
			<a href="../index.php"><h1>LOGO<br/></h1></a>
			<hr size="3"/>
		</div>
		<div id="registrationform">
			<form action="../logic/authenticate/register.php" onsubmit="return validate()" method="post" name="registrationform">
				<fieldset>
					<legend align="center"><h3>Register for an account</h3></legend>
					<table align="center" valign="top">
						<tr><td colspan="3"><div align="center" style="color: RED" id="errorMsg"></div></td></tr>
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