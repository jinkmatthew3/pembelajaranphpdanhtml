<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
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
    <div class="container">
        <div class="row">
            <form id="student_form" class="col" action="insert.php" method="post" style="margin: auto 20px;">
                <div class="form-group">
                    <label for="InputStudentID">Student ID</label>
                    <input type="text" class="form-control" id="InputStudentID" name="studentid" placeholder="Student Id" required>
                </div>
                <div class="form-group">
                    <label for="InputFirstName">First Name</label>
                    <input type="text" class="form-control" id="InputFirstName" name="firstname" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label for="InputLastName">Last Name</label>
                    <input type="text" class="form-control" id="InputLastName" name="lastname" placeholder="Last Name" required>
                </div>
                <button type="submit" id="btnSubmit" class="btn btn-primary" value="submit">Submit</button>
            </form>
            <div class="col">
            </div>
            <div class="col">
            </div>
        </div>
    </div>
</body>
</html>