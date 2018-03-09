<?php
	include '../users/setUsers.php';
	$username = "";
	$password = "";
	$name = "";

	if(isset($_POST["username"]) || isset($_POST["password"]) || isset($_POST["name"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$name = $_POST["name"];
	}
	
	if($username != "" || $password != "" || $name != ""){
		setUsers($username, $password, $name, "customer");
		echo "<h1>Registration Successfull.</h1><br/>";
		echo "<h3>You'll be redirected to login page in 3 second.</h3>";
		header("refresh:3;url=../../views/login.php");
	}else{
		header("location: ../../views/register.php");
	}
?>