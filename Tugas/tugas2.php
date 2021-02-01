<!DOCTYPE html>
<html>
    <head>
        <title>Student Form</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <!-- Data Tables -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

        <script src="https://www.google.com/recaptcha/api.js"></script>
    </head>
    <body>
        <?php
            $type = 'add';
            if(!isset($_COOKIE['type'])){ // jika cookie belum di set (cuma sebagai error handling kalo langsung buka file ini)
                setcookie('type', $type); // set default value (add)
            }
            else{
                $type = $_COOKIE['type'];
            }

            if($type == 'edit'){
                $studentid = $_COOKIE['studentid'];

                $host = "localhost"; // lokasi mysql
                $username = "root"; // user untuk login
                $password = ""; // password untuk login
                $dbname = "mahasiswa"; // database name
                
                $conn = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
                $query = $conn->query("SELECT * FROM siswa WHERE studentid=$studentid");
                foreach($query as $row){
                    $firstname = $row['first_name'];
                    $lastname = $row['last_name'];
                    $description = $row['description'];
                }
            }
        ?>
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

        <form id="student_form" class="col-4" action="studentResponses.php" method="post" style="margin: auto 20px;">
            <div class="form-group">
                <label for="InputStudentID">Student ID</label>
                <input type="text" class="form-control" id="InputStudentID" name="studentid" placeholder="Student Id" 
                        value="<?php if($type == 'edit') echo $studentid; ?>" required>
            </div>
            <div class="form-group">
                <label for="InputFirstName">First Name</label>
                <input type="text" class="form-control" id="InputFirstName" name="firstname" placeholder="First Name"
                        value="<?php if($type == 'edit') echo $firstname; ?>" required>
            </div>
            <div class="form-group">
                <label for="InputLastName">Last Name</label>
                <input type="text" class="form-control" id="InputLastName" name="lastname" placeholder="Last Name"
                        value="<?php if($type == 'edit') echo $lastname; ?>" required>
            </div>
            <div class="form-group">
                <label for="InputDescription">Description</label>
                <textarea class="form-control" id="InputDescription" name="description" rows="3" placeholder="Description" required><?php if($type == 'edit') echo $description; ?></textarea>
            </div>
            <div class="g-recaptcha" data-sitekey="6LcbD5MUAAAAAMXNI9VcuYdguAvvg8tWOX3c2EEI" style="margin-bottom: 10px;"></div>
            <?php
                if($type == 'edit'){
                    echo "<button type=\"submit\" id=\"btnEdit\" class=\"btn btn-primary\" value=\"edit\">Edit</button>";
                }
                else{
                    echo "<button type=\"submit\" id=\"btnSubmit\" class=\"btn btn-primary\" value=\"submit\">Submit</button>";
                }
            ?>
            
            <button type="reset" id="btnReset" class="btn btn-secondary" value="reset">Reset</button>
            <button type="button" id="btnCancel" class="btn btn-danger" value="button">Cancel</button>
        </form>

        <script>
            $(document).ready(function(){
                // jika button cancel di klik
                $('#btnCancel').click(function(){
                    document.location.href = 'tugas1.php';
                });

                
            });
        </script>
    </body>
</html>
