<!DOCTYPE html>
<html>
<head>
	<title>Pemweb Week 4</title>
	<?php include 'cdn.php'; ?>
	<script type="text/javascript">
		$(document).ready( function () {
		    $('#myTable').DataTable();
		});
	</script>
</head>
<body>
	<div class="container">
		<div style="float: right;">
			<a href="add.php" class="btn btn-primary">Add Student</a>
		</div>
		<table id="myTable" class="table table-bordered table-striped">
			<thead>
				<th>#</th>
				<th>Student ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php  
					$host = 'localhost';
					$username = 'root';
					$password = '';
					$dbName = 'northwind';

					$conn = new mysqli($host, $username, $password, $dbName);

					if ($conn) {
						$query = "SELECT * FROM employees";
						$result = $conn->query($query);
						$idx = 1;
						while($row = $result->fetch_assoc()){
							echo '<tr>';
								echo '<td>'.$idx.'</td>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row['first_name'].'</td>';
								echo '<td>'.$row['last_name'].'</td>';
								echo '<td>
									<form action="deletestudent.php" method="post">
										<input type="hidden" name="id" value="'.$row['id'].'">
										<input type="submit" value="delete" class="btn btn-danger">
									<form>
									<form action="editstudent.php" method="post">
										<input type="hidden" name="id" value="'.$row['id'].'">
										<input type="submit" value="edit" class="btn btn-primary">
									<form>
									</td>';
							echo '</tr>';
							$idx++;
						}
					}
					else{
						echo 'Error DB Connection';
					}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>