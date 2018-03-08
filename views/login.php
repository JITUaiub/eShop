<html>
	<head>
		<title>Login</title>
	</head>
	<script type="text/javascript">
		function validate(){
			var username = document.forms["loginform"]["username"];
			var password = document.forms["loginform"]["password"];
			var errorMsg = document.getElementById("errorMsg");
			if(username.value == "" || password.value == ""){
				errorMsg.textContent = "Username or Password cannot be empty !!";
				return false;
			}else{
				errorMsg.textContent = "";
				return true;
			}
		}
	</script>
	<body>
		<div id="logo" align="center">
			<h1>LOGO<br/><hr size="3"/></h1>
		</div>
		<div id="loginform">
			<form action="../logic/authenticate/login.php" method="post" onsubmit="return validate()" name="loginform">
				<fieldset>
					<legend align="center"><h3>Login Here</h3></legend>
					<table align="center" valign="top">
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
						<tr><td colspan="3"><div id="errorMsg" style="color: RED" align="center"></div></td></tr>
						<tr>
							<td colspan="3" align="center"><input type="submit" name="login" value="Login"></td>
						</tr>
						<tr>
							<td colspan="3" align="center"><a href="register.php">New member !! Register for an account</a></td>
						</tr>
					</table>
				</fieldset>
			</form>
		</div>
	</body>
</html>