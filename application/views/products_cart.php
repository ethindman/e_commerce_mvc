<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
	<!-- Normalize.CSS -->
	<link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
	<!-- jQuery 1.11.2 -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<!-- Custom Styles -->
	<link rel="stylesheet" href="../../assets/styles.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="row">
				<div class="box col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<h3>Check Out</h3>
				</div>
				<div class="box right col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<h3><a href="home">Home</a></h3>
				</div>
			</div>
		</div>
	  <div class="row">
			<div class="box col-lg-12 col-md-12 col-sm-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Qty</th>
							<th>Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php 			$items = $this->session->userdata('orders');

						foreach ($items as $key => $item) 
						{
							$query = "SELECT * FROM products WHERE id = ?";
							$result = $this->db->query( $query, array($item['id']))->row_array();
?>						<tr>
								<td><?= $item['quantity'] ?></td>
								<td><?= $result['name'] ?></td>
								<td>$<?= $result['price'] * $item['quantity']  ?></td>
								<td>
									<form action="remove" method="post">
										<button class="btn btn-danger">Delete</button>
										<input type="hidden" name="key" value="<?= $key ?>">
									</form>
								</td>
							</tr>
<?php 				}
?>						<tr>
								<td></td>
								<td>Total:</td>
								<td>$500</td>
								<td></td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>