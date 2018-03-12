<?php 
	session_start();
	include '../../logic/products/getProducts.php';
	$productsData = getProducts("../../data/products.xml");
	$loggedUser = "";
	if(isset($_SESSION['loggedUsername'])){
		$loggedUser = $_SESSION['loggedUsername'];
	}
	
	function find($id){
		$productsData = getProducts("../../data/products.xml");
		for($i=0; $i<count($productsData); $i++){
			if($productsData->product[$i]->id == $id){
				return strval($productsData->product[$i]->name);
			}
		}
	}
?>
<html>
	<head>
		<title>Home</title>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">
		var cart = [];
		var Item = function(id, name, quantity, price){
			this.id = id;
			this.name = name;
			this.quantity = quantity;
			this.price = price;
		}
		function addCart(id, name, quantity, price){
			for(var i in cart){
				if(cart[i].id === id){
					cart[i].quantity += quantity;
					alert("Already in cart. Increased amount by one");
					return;
				}
			}
			var item = new Item(id, name, quantity, price);
			cart.push(item);
			alert("Item added to cart");
		}
		function checkout(id, name, quantity, price){
			var checkOut = function(id, name, quantity, price) {
			    $.ajax({
			        url: '../../logic/invoices/setInvoices.php',
			        type: 'POST',
			        data: {id:id, name:name, quantity:quantity, price:price},
			        success: function(data) {
			            console.log(data); // Inspect this in your console
			        }
			    });
			};
		}
		function showCart(){
			var str = "Product ID \t Product Name \t Quantity \t Price \t Total Price\n";
			var sum = 0;
			for(var i=0; i<cart.length; i++){
				str += cart[i].id + " \t\t\t " + cart[i].name + " \t\t\t " + cart[i].quantity + " \t\t\t $" + cart[i].price + " \t\t\t $" + (cart[i].quantity*cart[i].price) +"\n";
				sum+= (cart[i].quantity*cart[i].price);
			}
			str += "\nGrand Total: $" + sum;
			if(sum == 0){
				str = "Empty Cart";
			}
			alert(str);
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
					<td width="20%"><input type="button" name="cart" value="Cart" onclick="showCart()"></td>
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
							&nbsp;<div id="checkout" style="color: Green"></div>
						</div>
					</td>
					<td align="center" valign="top" width="70%">
						<div id="products" align="left" valign="top">
							<table align="center" valign="top" width="100%">
								<?php
									$currentRow = 0;
									$closeRow = $currentRow + 3;
									for($i=0; $i<count($productsData); $i++){
										if($currentRow %3 == 0){
											echo "<tr>";
											$closeRow += 3;
										}
										echo "<td>";
											echo "<table border=\"1\">";
												echo "<tr><td height=\"150\" width=\"150\"><img src=\"\"/><br/>IMAGE</td></tr>";
												echo "<tr><td align=\"left\">";echo $productsData->product[$i]->name;echo "</td></tr>";
												echo "<tr><td align=\"left\">";echo "$".$productsData->product[$i]->price;echo "</td></tr>";
												echo "<tr><td><input type=\"button\" name=\"addCart\" onclick=\"addCart(";
												echo $productsData->product[$i]->id;echo ",'";
												echo $productsData->product[$i]->name;echo "',";
												echo 1; echo ",";
												echo $productsData->product[$i]->price;
												echo ")\" value=\"Add to Cart\"></td></tr>";
											echo "</table>";
										echo "</td>";

										if($currentRow == $closeRow){
											echo "</tr>";
											echo "<tr><td colsppan=\"3\">&nbsp;</td></tr>";
										}
										$currentRow++;
									}
								?>	
							</table>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>