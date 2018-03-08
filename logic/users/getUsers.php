<?php
	function getUsers(){
		$usersData = simplexml_load_file("../../data/users.xml") or die("Error: cannot create object");
		return $usersData;
	}
?>