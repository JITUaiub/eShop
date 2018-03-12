<?php
	function getProducts($url){
		$productsData = simplexml_load_file($url) or die("Error: cannot create object");
		return $productsData;
	}
?>