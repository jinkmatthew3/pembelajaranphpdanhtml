<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Week 3</title>
	<link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> --></head>

<body>
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <h4 style="color : grey;">[IF635] Web Programming</h4>
        </div>
        <ul class="nav navbar-nav navbar-right ">
          <li class="active"><a href="#">Students</a></li>
        </ul>
      </div>
    </nav>
  </header>
    <div class="container">
      <?php
        $host = "localhost";
        $username = "root";
        $dbname = "pemweb";
        $password = "";
        $db = new mysqli($host, $username, $password, $dbname);

        $query = "SELECT * FROM ms_mahasiswa";
        $result = $db->query($query);

        $students = [];
        while($row = $result->fetch_assoc()){
          array_push($students, $row);
        }
        $json = json_encode($students);
        mysqli_free_result($result);
        mysqli_close($db);

    ?>
    <table id="tableStudents" border="1" rules="all" class="table table-striped table-bordered display"  style="width: 75%">
  		<thead>
  			<tr>
          <th><b> Nim </b></th>
  				<th><b> Nama </b></th>
  				<th><b> Alamat </b></th>
          <th><b> # </b></th>
  			</tr>
  		</thead>
      <tbody>
        <script>
          $(document).ready(function(){
            let db = <?php echo $json ?>;
            // console.log(db);
            $('#tableStudents').DataTable({
              "data" :  db,
              "rowId" : "nim",
              "columns": [
                  { "data": "nim" },
                  { "data": "nama" },
                  { "data": "alamat" },
                  {
                      "className":      'details-control delete',
                      "orderable":      false,
                      "data":           null,
                      "defaultContent": "<button style='margin :auto;'>delete</button>",
                  }
              ],
              "order": [[1, 'asc']]
            });


            $( '.delete' ).click(function() {
              let id = $(this).closest('tr').attr('id');
              $.post( "delete.php", { nim : id })
              .done(function() {
                location.reload();
              });
              console.log(id);
            });
          })
          </script>
    	</tbody>
      <tfoot>
  			<tr>
  				<td><b> Nim </b></td>
  				<td><b> Nama </b></td>
  				<td><b> Alamat </b></td>
          <td><b> # </b></td>
  			</tr>
  		</tfoot>
    </table>
  </div>
  <h1 style="text-align:center;">Tambah Data Mahasiswa</h3>
  <br>
  <div class="container" style="width:25%">
    <form method="post" action="savedata.php">
    Nim :<br><input type="" name="nim" class="form-control" /><br />
    Nama : <br><input type="text" name="nama" class="form-control" /><br />
    Alamat : <br><input type="text" name="alamat" class="form-control" /><br />
    <button type="submit" class="btn btn-primary form-control">Submit</button>
    </form>
  </div>
</body>
</html>
