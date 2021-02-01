<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
	<?php include 'cdn.php'; ?>
</head>
<body>
	<div class="container">
		<form id="form_student" action="" method="post">
		  <div class="form-group">
		    <label for="Student ID">Student ID</label>
		    <input type="text" class="form-control" name="student_id" placeholder="Enter student ID">
		  </div>
		  <div class="form-group">
		    <label for="firstname">First Name</label>
		    <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
		  </div>
		  <div class="form-group">
		    <label for="lastname">Last Name</label>
		    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
		  </div>
		  <div class="form-group">
		    <label for="desc">Description</label>
		    <textarea class="form-control" name="desc" placeholder="Enter Description"></textarea>
		  </div>
		  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		  <a href="index.php" class="btn btn-seconday">Cancel</a>
		</form>
	</div>
</body>
</html>


<?php 
	if (isset($_POST['submit'])) {
		if(isset($_POST['student_id']) && isset($_POST['first_name']) && isset($_POST['last_name'])){
			$id = $_POST['student_id'];
			$fname = $_POST['first_name'];
			$lname = $_POST['last_name'];
		
			$query = "INSERT INTO students(student_id, first_name, last_name) VALUES ('$id', '$fname', '$lname')";

			$host = 'localhost';
			$username = 'root';
			$password = '';
			$dbName = 'pemweb';
			$conn = new mysqli($host, $username, $password, $dbName);
			if(mysqli_query($conn, $query)){
				header("Location: index.php");
			}
			else{
				echo 'Error';
			}

		}
		else{
			echo 'All field must not be empty';
		}
	}
?>