<?php 
	include 'logic/products/getProducts.php';
	$productsData = getProducts("data/products.xml");
?>
<html>
	<head>
		<title>Home</title>
	</head>
	<script type="text/javascript">
		function addCart(id){
			window.location.href = "views/login.php";
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
					<td width="20%"><a href="views/login.php">Login</a></td>
					<td width="20%"><a href="views/register.php">Register</a></td>
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
												echo $productsData->product[$i]->id;
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