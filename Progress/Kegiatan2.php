<!DOCTYPE html>
<html>
<head>
	<title>Students</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<script>
	//Buat nambah data
	function addData(){
		document.location.href = 'addData.php';
	};
	$(document).ready(function() {
		$('#myModal').modal({
			keyboard : false,
			show : true,
			backdrop : 'static'
		});
		$('#student').dataTable();
	});
</script>
<style>
.close {display:none;}
</style>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">[IF 635] Web Programming</a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#">Student</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<?php
		if(!isset($_COOKIE['status'])) {
			echo "";
		} else {
			if($_COOKIE['status'] == 'addSuccess')
				echo "New data added<br>";
			if($_COOKIE['status'] == 'deleteSuccess')
				echo "Data Deleted<br>";
			if($_COOKIE['status'] == 'deleteFail')
				echo "Fuck<br>";
		}
	?>
	<div class="col-8 offset-2 d-flex justify-content-end pb-2">
		<button id="btnStudentForm" class="btn btn-primary" value="student" onclick="addData()"><i class="fa fa-plus-circle"></i> Student</button>
	</div>
	<table id="student" class="table table-stripped table-bordered display">
		<thead>
			<tr>
				<th>Student ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$host = "localhost";
				
				$username = "root";
				
				$dbname = "student";
				
				$password = "";
				
				$db = new mysqli($host,$username,$password,$dbname);

				$query = "SELECT * FROM mhs";
				$result = $db->query($query);
				
				while ($row = $result->fetch_assoc()){
					echo "<tr>";
						echo "<td>" . $row['id'] . "</td>";
						echo "<td>" . $row['first_name'] . "</td>";
						echo "<td>" . $row['last_name'] . "</td>";
						echo "<td>";
						echo '<form action="delete.php" method="post">
								<input type="hidden" name="id" value="'.$row['id'].'">
								<input type="submit" value="delete" class="btn btn-danger">
							</form>';
							echo '<form action="updateData.php" method="post">
								<input type="hidden" name="id" value="'.$row['id'].'">
								<input type="hidden" name="first_name" value="'.$row['first_name'].'">
								<input type="hidden" name="last_name" value="'.$row['last_name'].'">
								<input type="submit" value="update" class="btn btn-primary">
							</form>';
						echo "</td>";
					echo "</tr>";
				}
				
				mysqli_free_result($result);
				mysqli_close($db);
			?>
		</tbody>
		<tfoot>
			<tr>
				<th>Student ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Actions</th>
			</tr>
		</tfoot>
	</table>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form class="col-12" id="login" method="post" action="login.php">
						<div class="form-group">
							<i class="fas fa-user"></i><input type="email" class="form-control" placeholder="Enter Your Email" name="email" id="email">
						</div>
						<div class="form-group">
							<i class="fas fa-lock"></i><input type="password" class="form-control" placeholder="Enter Your Password" name="password" id="password">
						</div>
						<button type="submit" id="lgin">Login</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			email = $("#email");
			password = $("#password");
			mdl = $("#mdl").modal({
                backdrop: "static",
                keyboard: false,
            });

			$("#lgin").on("click", function(){
				$.ajax({
					method: "post",
					url: "login.php",
					dataType: "json",
					data: {
						email: email.val(),
						password: password.val()
					},
					success: function(r){
						console.log(r);
						if(r.s == true){
							mdl.modal("hide"),
						}
						else{
							alert("Password / Email is incorrect");
						}
					}
				})
			})
		});
	</script>
</body>
</html>