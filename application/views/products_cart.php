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
<?php 
		if(!$this->session->userdata('orders'))
		{
?>		<div class="alert alert-info alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			<strong>Hey!</strong> You don't appear to have anything in your cart. Why not <a href="home">add something</a>?
			</div>
<?php
		 	}
?>
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
						$total = 0;
						foreach ($items as $key => $item) 
						{
							$query = "SELECT * FROM products WHERE id = ?";
							$result = $this->db->query( $query, array($item['id']))->row_array();
							$price = $result['price'] * $item['quantity'];
							$total+=$price;
?>						<tr>
								<td><?= $item['quantity'] ?></td>
								<td><?= $result['name'] ?></td>
								<td>$<?= $price ?></td>
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
								<td>$<?= $total ?></td>
								<td></td>
							</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="box col-lg-6">
				<h3>Billing Information</h3>
				<form action="#" method="post">
				  <div class="form-group">
				    <label for="first_name">First Name:</label>
				    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
				  </div>
				  <div class="form-group">
				    <label for="last_name">Name:</label>
				    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
				  </div>
				  <div class="form-group">
				    <label for="address">Address:</label>
				    <input type="text" name="address" class="form-control" id="address" placeholder="ex. 1310 SW 147th Street">
				  </div>
				  <div class="form-group">
				    <label for="card_number">Card Number:</label>
				    <input type="number" name="card_number" class="form-control" id="card_number" placeholder="Card Number">
				  </div>
				  <button type="submit" class="btn btn-success">Order</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>