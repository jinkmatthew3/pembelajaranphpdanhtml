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
    <div class="row">
        <div class="col-sm-10"></div>
        <button id="addBtn" class="btn btn-primary"> &#43; Student</button>
    </div>
    <div class="container">
		<table id="tb" class="display table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th> #</th>
					<th> Student ID</th>
					<th> First Name</th>
                    <th> Last Name</th>
                    <th> Action </th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
                    <th> #</th>
					<th> Student ID </th>
					<th> First Name </th>
                    <th> Last Name</th>
                    <th> Action </th>
				</tr>
			</tfoot>
		</table>
	</div>
    <!-- LOGIN MODAL -->
    <div id="mdlLogin" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1> Log In
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="loginemail">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="loginpass">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnLogin" class="btn btn-primary">Login</button>
                </div>
            </div>
        </div>
    </div>



    <!-- EDIT MODAL -->
    <div id="mdl" class="modal fade">
        <div class="modal-dialog">
            <div id="mdl_pv" class="modal-content">

            </div>
        </div>
    </div>

    <script>
        //IMPORT DB

        var mdl = $("#mdl");
        var table = $("#tb").DataTable({
            ajax:{
                url:"getdata.php",
                type:"get",
                dataType:"json",
                dataSrc:""
            },
            columns: [
                { data: "Nomer"},
                { data: "MahasiswaNIM"},
                { data: "MahasiswaFirstName"},
                { data: "MahasiswaLastName"},
                { data: null }
            ],
            columnDefs:[
                {
                    targets: 4,
                    data: null,
                    defaultContent: "<button class='btn btn-warning text-white eb'><i class='fas fa-edit'></i></button>" +
                        "<button class='btn btn-danger db'><i class='fas fa-times-circle'></i></button>",
                    width: 80
                }
            ],
            processing: true
        }),
        //ATUR MODAL LOGIN
        loginemail = $("#loginemail");
        loginpassword = $("#loginpass");
        mdlLogin = $("#mdlLogin").modal({
            backdrop: "static",
            keyboard: false,
        }).on("shown.bs.modal",function(){
            email.focus();
        });

        //LOGIN BUTTON HANDLER
        $("#btnLogin").on("click",function(){
            $.ajax({
                method: "post",
                url: "login.php",
                dataType: "json",
                data:{
                    loginemail: loginemail.val(),
                    loginpassword: loginpassword.val()
                },
                beforeSend:function(){
                    swal({
                        title: "Logging in...",
                        onBeforeOpen: () => {swal.showLoading();} 
                    })
                },
                success: function(r){
                    //console.log(r);
                    if(r.s == true){
                        mdlLogin.modal("hide"),
                        swal({
                            type: "success",
                            title: "Logged in",
                            text: r.t
                        })
                    }
                    else{
                        swal({
                            type: "error",
                            tyiyle: "Error :(",
                            text: r.t
                        })
                    }
                }
            })
        })

        //CREATE, pindah ke page form
        $("#addBtn").on("click",function(){location.href="form.php"})
        
        //EDIT BUTTON HANDLER
        $("#tb tbody").on("click",".eb",function(){
            let data = table.row($(this).parents("tr")).data();
            $.ajax({
                type: "get",
                url: "editdata.php",
                dataType: "json",
                data: {nim: data.MahasiswaNIM},
                beforeSend:function(){
                   swal({
                      title: "Loading..",
                       onBeforeOpen: () => {swal.showLoading();}
                   })
                },
                success: function(r){
                    //console.log(r);
                    $("#mdl_pv").load("editform.php",function(){
                        snim.val(r.nim);
                        sfname.val(r.first_name);
                        slname.val(r.last_name);
                        sdes.val(r.description);
                        mdl.modal();
                        swal.close();
                    });
                }
            })
        });

        //DELETE, button handler
        $("#tb tbody").on("click", "td .db", function(){
            let data = table.row( $(this).parents("tr") ).data();

            swal({
                type: "warning",
                html: "Hapus Data?",
                showCancelButton: true
            })
            .then(function(res){
                if(res.value){
                    $.ajax({
                        type: "post",
                        url: "deldata.php",
                        dataType: "json",
                        data: {nim: data.MahasiswaNIM},
                        beforeSend: function(){
                            swal({
                                title: "Loading..",
                                onBeforeOpen: () => {swal.showLoading();}
                            })
                        },
                        success: function(r){
                            console.log(r);
                            if( r == true){
                                swal({
                                    type: "success",
                                    title: "Success",
                                    html: "<b>" + data.MahasiswaNIM + "</b> has been deleted.",
                                    showCancelButton: false
                                });
                                table.ajax.reload();
                            }
                            else{
                                swal({
                                    type: "error",
                                    title: "Error.",
                                    showCancelButton: false
                                });
                            }
                        }
                    })
                }
            });
        });
    </script>
</body>
</html>
