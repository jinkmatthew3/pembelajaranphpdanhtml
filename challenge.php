<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<title>Student</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">


 
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script>
		$(document).ready(function() {
		    $('#example').DataTable();
		} )
	function hapus(id){
		location.href="del.php?id="+id;
	}
	function edit(id,fname,lname,desc){
		location.href="edit.php?id="+id+"&fname="+fname+"&lname="+lname+"&desc="+desc;
	}
</script>
</head>
<body>
	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<h4 style="color:grey"> [IF635] Web Programming</h4>
				</div>
				<ul class="navbar-nav">
					<li class="navbar-right">
                            <button type="button" id="btnLogout" class="btn btn-danger" value="submit">Logout</button>
                     <li>
				</ul>
			</div>
		</nav>
	</header>
	<table id="example" class="table table-striped table-bordered" style="width:100%">
		<thead>
			<tr>
				<th> Student ID</th>
				<th> First Name</th>
				<th> Last Name </th>
				<th> Description </th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody>
			<?php
				//lokasi mysql
				$host = "localhost";

				//user untuk login
				$username = "root";

				//nama database
				$dbname = "student";

				//pass untuk autentikasi
				$password = "";


				$db = new mysqli($host, $username, $password, $dbname);
				$query = "SELECT * FROM mhs LIMIT 12";
				$result = $db->query($query);

				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
						echo "<td>" . $row['StudentID'] . "</td>";
						echo "<td>" . $row['FirstName'] . "</td>";
						echo "<td>" . $row['LastName'] . "</td>";
						echo "<td>" . $row['Description'] . "</td>";
						$id=$row['StudentID'];
						$firstname = $row['FirstName'];
						$lastname = $row['LastName'];
						$desc = $row['Description'];
						echo "<td><input type='button' onclick='hapus($id)' value='delete'></td>";		
			?>
			<td><input type='button' onclick="edit('<?php echo $id ?>','<?php echo $firstname ?>','<?php echo $lastname ?>','<?php echo $desc ?>')" value='edit'></td></tr><?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<td> Student ID </td>
				<td> First Name</td>
				<td> Last Name </td>
				<td> Description </td>
				<td>Action</td>
			</tr>
		</tfoot>
	</table>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Sign In</h4>
		      </div>
		      <div class="modal-body">
		        <form action="cek.php" method="post">
						  <div class="form-group">
						    <label for="email">Email:</label>
						    <input type="email" name="email" class="form-control" id="email">
						  </div>
						  <div class="form-group">
						    <label for="pwd">Password:</label>
						    <input type="password" name="pwd" class="form-control" id="pwd">
						  </div>
						  <button type="submit" class="btn btn-primary">Sign In</button>
						</form> 
		      </div>
		    </div>

	 	</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#myModal').modal({
				keyboard : false,
				<?php 
                        if(isset($_SESSION['showmodal'])){
                            if($_SESSION['showmodal'])
                                echo "show: true,";
                            else
                                echo "show: false,";
                        }
                        else{
                            echo "show: true,";
                        }
                    ?>
				backdrop : 'static'
			})

			 $('#btnLogout').click(function(){
                    <?php
                        session_destroy();
                    ?>
                    location.reload();
                });
		})
	</script>
</body>
</html>