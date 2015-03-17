<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products Listing</title>
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
		if($this->session->flashdata('success'))
		{
?>		<div class="alert alert-success alert-dismissible" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  			<strong>Nice!</strong> <?= $this->session->flashdata('success'); ?>
			</div>
<?php
		 	}
?>
			<div class="row">
				<div class="box col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<h3>Products</h3>
				</div>
				<div class="box right col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<h3><a href="cart">Your Cart (<?= count($this->session->userdata('orders')) ?>)</a></h3>
				</div>
			</div>
		</div>
	  <div class="row">
			<div class="box col-lg-12 col-md-12 col-sm-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<!-- START LOOP -->
<?php 		foreach ($products as $product) 
					{
?>					<tr>
							<td><?= $product['name'] ?></td>
							<td>$<?= $product['price'] ?></td>
							<td>
								<form action="add" method="post">
									<select name="quantity" class="form-control">
<?php 							for($i=1;$i<=20;$i++) 
										{
?>										<option value="<?= $i; ?>"><?= $i; ?></option>
<?php								}
?>
									</select>
							</td>
							<td>
								<button type="button" class="btn btn-danger">Left</button>
								<input type="hidden" name="id" value="<?= $product['id'] ?>">
								</form>
							</td>
						</tr>
<?php				}
?>						
<!-- END OF LOOP -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>