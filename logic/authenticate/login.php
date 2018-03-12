<?php
	session_start();
	include '../users/getUsers.php';
	$username = "";
	$password = "";

	if(isset($_POST["username"]) || isset($_POST["password"])){
		$username = $_POST["username"];
		$password = $_POST["password"];
	}

	$usersData = getUsers();
	$loginStatus = false;

	for($i=0; $i<count($usersData); $i++){
		if($usersData->user[$i]->username == $username){
			if($usersData->user[$i]->password == $password){
				if($usersData->user[$i]->type == "admin"){
					$_SESSION['loggedUsername'] = $username;
					$loginStatus = true;
					header("location: ../../views/admin/index.php");
				}else{
					$_SESSION['loggedUsername'] = $username;
					$loginStatus = true;
					header("location: ../../views/user/index.php");
				}
			}	
		}	
	}
	if(!$loginStatus){
		echo "<h1>Invalid login credential or access.</h1><br/>";
		echo "<h3>You'll be redirected to login page in 3 second.</h3>";
		header("refresh:3;url=../../views/login.php");
	}
?>