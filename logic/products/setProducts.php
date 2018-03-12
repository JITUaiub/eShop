<?php
	$id = "";
	$name = "";
	$price = "";
	if(isset($_POST['id']) || isset($_POST['name']) || isset($_POST['price'])){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$price = $_POST['price'];
	}

	if(intval($price) > 0){
		$productsData = new DomDocument("1.0", "UTF-8");
		$productsData->load("../../data/products.xml");

		$rootTag = $productsData->getElementsByTagName("products")->item(0);
		$productTag = $productsData->createElement("product");
			$idTag = $productsData->createElement("id", $id);
			$nameTag = $productsData->createElement("name", $name);
			$priceTag = $productsData->createElement("price", $price);
		$productTag->appendChild($idTag);
		$productTag->appendChild($nameTag);
		$productTag->appendChild($priceTag);
		
		$rootTag->appendChild($productTag);
		$productsData->save("../../data/products.xml");

		echo "<h1>Product added Successfull.</h1><br/>";
		echo "<h3>You'll be redirected to previous page in 2 second.</h3>";
		header("refresh:9;url=../../views/admin/addProduct.php");
	}else{
		header("location: ../../views/admin/addProduct.php");
	}
?>