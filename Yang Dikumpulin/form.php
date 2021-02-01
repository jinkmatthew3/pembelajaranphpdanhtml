<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tugas Challenge</title>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="swal2.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<h4 class="navbar-brand" href="challenge.php">[IF635] Web Programming</a>
			</div>
		</div>
    </nav>
    <div class="container">
        <h1>INSERT NEW STUDENT</h1>
        <div class="form-row">
            <label>NIM</label>
            <input class="form-control" type="text" name="snim" id="snim" placeholder="NIM Mahasiswa">
        <div>
        <div class="form-row">
            <label>First Name</label>
            <input class="form-control" type="text" name="sfirst_name" id="sfirst_name" placeholder="Nama Depan">
        <div>
        <div class="form-row">
            <label>Last</label>
            <input class="form-control" type="text" name="slast_name" id="slast_name" placeholder="Nama Belakang">
        <div>
        <div class="form-row">
            <div class="form-group col-4">
                <label>Deskripsi</label>
                <textarea class="form-control" type="text" name="sdeskripsi" id="sdeskripsi" placeholder="Data Mahasiswa"></textarea>
            </div>
        </div>
        <button id="btnSave" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Insert</button>
        <button id="btnCancel" class="btn btn-light">Cancel</button>
    </div>

    <script>
        //Insert
        $("#btnSave").on("click",function(){
            $.ajax({
                type: "post",
                url: "putdata.php",
                dataType: "json",
                data:{
                    nim: $("#snim").val(),
                    firstname: $('#sfirst_name').val(),
                    lastname: $('#slast_name').val(),
                    deskripsi: $('#sdeskripsi').val()
                },
                beforeSend: function(){
                    swal({
                        
                        title: "Loading..",
                        onBeforeOpen: () => {swal.showLoading();}
                    })
                },
                success: function(r){
                    if(r == true){
                        swal({
                            type: "success",
                            title: "Success",
                            html: "Mahasiswa baru telah dimasukkan",
                            showCloseButton: false
                        })
                        .then(function(z){
                            location.href="challenge.php";
                        });
                    }
                    else{
                        swal({
                            type: "error",
                            title: "Error.",
                            showCloseButton: false
                        });
                    }
                }
            })
        })
        //Cancel
        $("#btnCancel").on("click",function(){location.href="challenge.php"})
    </script>
</body>
</html>