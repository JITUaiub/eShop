<?php
	session_start();
	include '../../logic/products/getProducts.php';
	$productsData = getProducts("../../data/products.xml");
	$loggedUser = "";
	if(isset($_SESSION['loggedUsername'])){
		$loggedUser = $_SESSION['loggedUsername'];
	}
	$maxProductId = 0;
	for($i=0; $i<count($productsData); $i++){
		if(intval($productsData->product[$i]->id) > $maxProductId){
			$maxProductId = intval($productsData->product[$i]->id);
		}
	}
?>
<html>
	<head>
		<title>Add Product</title>
	</head>
	<script type="text/javascript">
		function validate(){
			var id = document.forms["addProductForm"]["id"];
			var name = document.forms["addProductForm"]["name"];
			var price = document.forms["addProductForm"]["price"];

			var errorMsg = document.getElementById("errorMsg");

			if(id.value == "" || name.value == "" || price.value == ""){
				errorMsg.textContent = "All fields required.";
				return false;
			}else{
				errorMsg.textContent = "";
				return true;
			}
		}
	</script>
	<body>
		<div id="logo" align="center">
			<a href="index.php"><h1>LOGO<br/></h1></a>
			<hr size="3"/>
		</div>
		<div id="navMenu">
			<table width="100%">
				<tr align="center" valign="top">
					<td width="20%">&nbsp;</td>
					<td width="20%"><a href="index.php">LATEST PRODUCTS</a></td>
					<td width="20%">Welcome <a href="profile.php"><?php echo $loggedUser;?></a></td>
					<td width="20%"><a href="../../index.php">Logout</a></td>
					<td width="20%">&nbsp;</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
			</table>
		</div>
		<div id="container">
			<table width="80%" align="center" valign="top">
				<tr>
					<td align="center" valign="top" width="30%">
						<div id="filter">
							<table border="1" cellpadding="0" cellspacing="0">
								<tr><td width="200" ><h3>SHOP</h3></td></tr>
								<tr><td width="200"  height="40">Category</td></tr>
								<tr><td width="200"  height="40">Price Range</td></tr>
								<tr><td width="200"  height="40">Shipping</td></tr>
							</table>
							&nbsp;
							<table border="1" cellpadding="0" cellspacing="0">
								<tr><td width="200" align="center">OFFER HUT</td></tr>
							</table>
							<br/><a href="addproduct.php">Add new Product</a>
						</div>
					</td>
					<td align="center" valign="top" width="70%">
						<div id="addProducts" align="left" valign="top">
							<fieldset>
								<legend><h3>Add new Product</h3></legend>
								<form action="../../logic/products/setProducts.php" onsubmit="return validate()" method="post" name="addProductForm">
									<table align="center" valign="top">
										<tr><td colspan="3" align="center"><div id="errorMsg" style="color: RED"></div></td></tr>
										<tr>
											<td><strong>ID</strong></td>
											<td><strong>:</strong></td>
											<td><input type="text" name="id" value="<?php echo intval($maxProductId) + 1;?>" readonly></td>
										</tr>
										<tr>
											<td><strong>Name</strong></td>
											<td><strong>:</strong></td>
											<td><input type="text" name="name" placeholder="Enter Product Name"></td>
										</tr>
										<tr>
											<td><strong>Price</strong></td>
											<td><strong>:</strong></td>
											<td><input type="text" name="price" placeholder="Enter Product Price"></td>
										</tr>
										<tr>
											<td colspan="3" align="center"><input type="submit" name="addProduct" value="Add Product"></td>
										</tr>
									</table>
								</form>
							</fieldset>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>