<!DOCTYPE html>
<html>
<head>
	<title> Tugas Pendahuluan</title>
	<!-- Bootstrap -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Data Tables -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>
<script>
$(document).ready(function() {
    $('#produk').dataTable();
});
</script>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<h4 style="color:grey">[IF635]Web Programming</h4>
				</div>
				<ul class="navbar-nav">
					<li class="navbar-right active"><a href="#"> Employees </a></li>
				</ul>
			</div>
		</nav>
	</header>
	<table id="produk" class="table table-stripped table-bordered display">
		<thead>
			<tr>
				<th> # </th>
				<th> Product Name </th>
				<th> Quantity Per Unit </th>
				<th> Price </th>
				<th> Stock </th>
			</tr>
		</thead>
		<tbody>
			<?php
				$host = "localhost";
				
				$username = "root";
				
				
				$dbname = "northwind";
				
				$dsn = "mysql:dbname=northwind;host=localhost";
				
				$password = "";
				
				$conn = new PDO($dsn, $username, $password);
				
				$query = "SELECT * FROM products LIMIT 12";
				$result = $conn->query($query);
				
				foreach ($result as $row){
					echo "<tr>";
						echo "<td>" . $row['1'] . "</td>";
						echo "<td>" . $row['3'] . "</td>";
						echo "<td>" . $row['9'] . "</td>";
						echo "<td>" . $row['6'] . "</td>";
						echo "<td>" . $row['8'] . "</td>";
					echo "</tr>";
				}
				
				$result = null;
				$conn = null;
			?>
		</tbody>
		<tfoot>
			<tr>
				<td> # </td>
				<td> Product Name </td>
				<td> Quantity Per Unit </td>
				<td> Price </td>
				<td> Stock </td>
			</tr>
		</tfoot>
	</table>
</body>
</html>