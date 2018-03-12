<?php
	include 'getInvoices.php';
	if (isset($_POST['id']) || isset($_POST['name']) || isset($_POST['quantity']) || isset($_POST['price'])) {

        setInvoice($_POST['id'], $_POST['name'], $_POST['quantity'], $_POST['price']);

        function setInvoice($id, $name, $quantity, $price){
		session_start();
		$id = "";
		$name = "";
		$price = "";
		$quantity = "";

		if(intval($price) > 0){
			$invoicesData = new DomDocument("1.0", "UTF-8");
			$invoicesData->load("../../data/invoices.xml");

			$rootTag = $invoicesData->getElementsByTagName("invoices")->item(0);
				$invoiceTag = $invoicesData->createElement("invoice");
					$usernameTag = $invoicesData->createElement("username", $_SESSION['loggedUsername']);
					$productsTag = $invoicesData->createElement("products");
						$productTag = $invoicesData->createElement("product");
							$idPTag = $invoicesData->createElement("id", $id);
							$nameTag = $invoicesData->createElement("name", $name);
							$priceTag = $invoicesData->createElement("price", $price);
							$quantityTag = $invoicesData->createElement("quantity", $quantity);
							$productTag->appendChild($idTag);
							$productTag->appendChild($nameTag);
							$productTag->appendChild($priceTag);
							$productTag->appendChild($quantityTag);
						$productsTag->appendChild($productTag);
					$invoiceTag->appendChild($productsTag);
			
			$rootTag->appendChild($invoiceTag);
			$invoicesData->save("../../data/invoices.xml");

			echo "<h1>Checkout Successfull.</h1><br/>";
			echo "<h3>You'll be redirected to home page in 3 second.</h3>";
			header("refresh:10;url=../../views/user/index.php");
		}

    }
	
	}
?>