<?php
	function getInvoices($url){
		$invoicesData = simplexml_load_file($url) or die("Error: cannot create object");
		return $invoicesData;
	}
?>