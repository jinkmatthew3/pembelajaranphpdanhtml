 <!DOCTYPE html>
<html>
<head>
	<title>Hello World</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>
<script>
$(document).ready(function() {
    $('#produk').dataTable();
});
</script>
<body>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">[IF 635] Web Programming</a>
		</div>
		<div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#">Products</a></li>
			</ul>
		</div>
	</div>
</nav>

<?php

	$produk = array(
				array(
					"#" => "1",
					"Product_Name" => "Chai",
					"Qty" => "10 boxes x 20 bags",
					"Price" => "18",
					"Stock" => "39"
				),
				array(
					"#" => "2",
					"Product_Name" => "Chang",
					"Qty" => "24 - 12 oz bottles",
					"Price" => "19",
					"Stock" => "17"
				),
				array(
					"#" => "3",
					"Product_Name" => "Anissed Syrup",
					"Qty" => "12 - 550 ml bottles",
					"Price" => "10",
					"Stock" => "13"
				),
				array(
					"#" => "4",
					"Product_Name" => "Chef Anton's Cajun Seasoning",
					"Qty" => "48 - 6 oz jars",
					"Price" => "22",
					"Stock" => "53"
				),
				array(
					"#" => "5",
					"Product_Name" => "Chef Anton's Gumbo Mix",
					"Qty" => "36 boxes",
					"Price" => "21.35",
					"Stock" => "0"
				),
				array(
					"#" => "6",
					"Product_Name" => "Grandma's Boysenberry Spread",
					"Qty" => "12 - 8 oz jars",
					"Price" => "25",
					"Stock" => "120"
				),
				array(
					"#" => "7",
					"Product_Name" => "Uncle Bob's Organic Dried Pears",
					"Qty" => "12 - 1 lb pkgs",
					"Price" => "30",
					"Stock" => "15"
				),
				array(
					"#" => "8",
					"Product_Name" => "Northwoods Cranberry Sauce",
					"Qty" => "12 - 12 oz jars",
					"Price" => "40",
					"Stock" => "6"
				),
				array(
					"#" => "9",
					"Product_Name" => "Mishi Kobe Niku",
					"Qty" => "18 - 500 g pkgs",
					"Price" => "97",
					"Stock" => "29"
				),
				array(
					"#" => "10",
					"Product_Name" => "Ikura",
					"Qty" => "12 - 200 ml jars",
					"Price" => "31",
					"Stock" => "31"
				),
				array(
					"#" => "11",
					"Product_Name" => "Queso Canrales",
					"Qty" => "1 kg kg",
					"Price" => "21",
					"Stock" => "22"
				),
				array(
					"#" => "12",
					"Product_Name" => "Queso Manchego La Pastora",
					"Qty" => "10 - 500 g pkgs",
					"Price" => "38",
					"Stock" => "86"
				)
	);
	echo '<table id="produk" class="table table-stripped table-bordered display">'.
	"<thead>
	  <tr>
		<th>#</th>
		<th>Product Name</th>
		<th>Quantity per Unit</th>
		<th>Price</th>
		<th>Stock</th>
	  </tr>
	  </thead>";
	foreach($produk as $key ){
		echo "<tr>".
			"<td>".$key['#']."</td>".
			"<td>".$key['Product_Name']."</td>".
			"<td>".$key['Qty']."</td>".
			"<td>".$key['Price']."</td>".
			"<td>".$key['Stock']."</td>".
		"</tr>";
	}
	echo"<tfoot>
	  <tr>
		<th>#</th>
		<th>Product Name</th>
		<th>Quantity per Unit</th>
		<th>Price</th>
		<th>Stock</th>
	  </tr>
	  </tfoot>";
	echo "</table>"
?>

</body>
</html> 