<?php
	$title="Delete Products";
	require_once('../model/productModel.php');
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$product = getProductById($id);
		if($product) {
			if(isset($_POST['delete'])) {
				$result = deleteProduct($id);
				if($result) {
					header('Location: view.php');
					exit();
				} else {
					echo "Failed to delete product.";
				}
			}
		} else {
			echo "Product not found.";
		}
	} else {
		echo "Invalid request.";
		exit();
	}
?>


	<h1>Delete Product</h1>

	<nav>
		<a href="home.php">Back</a> |
	</nav>
	
	<br>
	<div>
		<form method="post" action="">
			<input type="hidden" name="id" value="<?=$product['id']?>">
			<table border="1">
				<tr>
					<td>Name</td>
					<td><?= isset($product['name']) ? $product['name'] : '' ?></td>
				</tr>
				<tr>
					<td>Buying Price</td>
					<td><?= isset($product['buying_price']) ? $product['buying_price'] : '' ?></td>
				</tr>
				<tr>
					<td>Selling Price</td>
					<td><?= isset($product['selling_price']) ? $product['selling_price'] : '' ?></td>
				</tr>
				<tr>
					<td></td>
					<td><h3>Are you sure you want to delete this product?</h3></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="delete" value="Confirm"></td>
				</tr>
			</table>
		</form>
	</div>

	<br>
	<br>

<?php
	include 'footer.php';
?>
