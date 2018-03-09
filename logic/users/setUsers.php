<?php
	function setUsers($username, $password, $name, $type){
		$usersData = new DomDocument("1.0", "UTF-8");
		$usersData->load("../../data/users.xml");

		$rootTag = $usersData->getElementsByTagName("users")->item(0);
		$userTag = $usersData->createElement("user");
			$usernameTag = $usersData->createElement("username", $username);
			$passwordTag = $usersData->createElement("password", $password);
			$nameTag = $usersData->createElement("name", $name);
			$typeTag = $usersData->createElement("type", $type);
		$userTag->appendChild($usernameTag);
		$userTag->appendChild($passwordTag);
		$userTag->appendChild($nameTag);
		$userTag->appendChild($typeTag);
		
		$rootTag->appendChild($userTag);
		$usersData->save("../../data/users.xml");
	}
?>