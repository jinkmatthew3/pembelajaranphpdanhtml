<!DOCTYPE html>
<html>
    <head>
        <title>Tugas 1</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <!-- Data Tables -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <body>
        <header class="pb-5">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">[IF635] Web programming</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Student<span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="row">
            <div class="col-8 offset-2 d-flex justify-content-end pb-2">
                <button id="btnStudentForm" type="submit" class="btn btn-primary" value="student"><i class="fa fa-plus-circle"></i> Student</button>
            </div>
            <div class="col-8 offset-2">
                <table id="student" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr class="font-weight-bold">
                            <th>#</th>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $host = "localhost"; // lokasi mysql
                            $username = "root"; // user untuk login
                            $password = ""; // password untuk login
                            $dbname = "northwind"; // database name
                            
                            $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
                            $query = "SELECT * FROM employees";
                            $result = $conn->query($query);
                            $i = 0;
                            foreach($result as $row){
                                $i++;
                                echo "<tr>";
                                    echo "<td>".$i."</td>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['first_name']."</td>";
                                    echo "<td>".$row['last_name']."</td>";
                                    echo "<td>";
                                        echo "<div>";
                                            echo "<button type='button' class='btn btn-default delete' data-id='".$row['id']."'><i class=\"fas fa-times\"></i></button>";
                                        echo "</div>";
                                        echo "<div>";
                                            echo "<button type='button' class='btn btn-default edit' data-id='".$row['id']."'><i class=\"fas fa-edit\"></i></button>";
                                        echo "</div>";    
                                    echo "</<td>";
                                echo "</tr>";
                            }
                            
                            $result = null;
                            $conn = null;
                        ?>
				    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold">
                            <td>#</td>
                            <td>Student ID</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Action</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                // tambah student
                $('#btnStudentForm').click(function(){
                    document.cookie = "type = add;";
                    document.location.href = 'tugas2.php';
                });

                // edit student
                var editStudent = function editData(studentID){
                    document.cookie = "type = edit;";
                    document.cookie = "studentid = "+studentID;
                    document.location.href = 'tugas2.php';
                }
                // set event listener on click for each edit button
                $('.edit').each(function(i, obj) {
                    this.addEventListener('click', function(){
                        editStudent(this.dataset.id); // send student id parameter from data-id attribute in html
                    });
                });


                // delete student
                var deleteStudent = function deleteData(studentID){
                    document.cookie = "studentid = "+studentID;
                    document.location.href = 'delete.php';
                }
                // set event listener on click for each delete button
                $('.delete').each(function(i, obj) {
                    this.addEventListener('click', function(){
                        deleteStudent(this.dataset.id); // send student id parameter from data-id attribute in html
                    });
                });

                var table = $('#student').DataTable();
                
            });
        </script>
    </body>
</html>
