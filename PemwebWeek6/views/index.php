<!-- index.php di views -->
<!DOCTYPE html>
<html>
<head>
	<title>Week 06</title>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("cssjs.php"); ?>
</head>
<body>
	<!-- TOPNAV -->
	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<h4 style="color:grey"> [IF635] Web Programming </h4>
				</div>
				<button id="lgout" class="btn btn-outline-danger">Log Out&nbsp;<i class="fas fa-sign-out-alt"></i></button>
			</div>
		</nav>
	</header>

	<!-- Content table-->
	<div class="container">
		<div class="row">
		<table id="tb" class="table table-striped table-bordered w-100">
            <thead>
                <td></td>
                <td><strong>NIM</strong></td>
                <td><strong>First Name</strong></td>
                <td><strong>Last Name</strong></td>

            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <td></td>
                <td><strong>NIM</strong></td>
                <td><strong>First Name</strong></td>
                <td><strong>Last Name</strong></td>
            </tfoot>
        </table>
		</div>
	</div>

	<!-- LOGIN -->
	<div id="mdl" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div id="mdl_pv" class="modal-content">
                <div class="modal-header">
                    <h1>Log In
                </div>
                <div class="modal-body">
                    <!-- LOGIN FORM -->
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="usn">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="pwd">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="lgin" class="btn btn-primary">Login&nbsp;<i class="fas fa-sign-in-alt"></i></button>
                </div>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){
        	
            var sess_logged = <?php echo (isset($_SESSION["logged"])) ? true : "false"; ?>, 
            
                tb = $("#tb").DataTable({
                    ajax:{
                        type: "post",
                        url: "../controllers/StudentController.php",
                        dataType: "json",
                        data: {act: "getall"},
                        dataSrc: ""
                    },
                    columns: [
                        {
                            className: "details-control text-center",
                            orderable: false,
                            data: null,
                            defaultContent: "<i class='fas fa-plus-circle text-primary'></i>"
                        }, 
                        {data: "nim"}, 
                        {data: "fname"},
                        {data: "lname"}
                    ],
                    order: [[1, "asc"]]
                }),
                usn = $("#usn"), //login form -> username
                pwd = $("#pwd"), //login form -> password
                mdl = $("#mdl").modal({ //universal modal
                    show: sess_logged == 1 ? false : true,
                    backdrop: "static",
                    keyboard: false,
                }).on("shown.bs.modal", function(){
                    usn.focus();
                }),
                mdl_pv = $("#mdl_pv");

         
            $("#lgin").on("click", function(){
                $.ajax({
                    method: "post",
                    url: "../controllers/UserController.php",
                    dataType: "json",
                    data: {
                        act: "login",
                        usn: usn.val(),
                        pwd: pwd.val()
                    },
                    beforeSend: l_swal(),
                    success: function(r){
                        if(r.s == true){
                            mdl.modal("hide");
                            swal({
                                type: "success",
                                title: "Logged in",
                                text: r.t
                            })
                        }
                        else{
                            swal({
                                type: "error",
                                title: "Error",
                                text: r.t
                            })
                        }
                    }
                })
            })


    
            $('#tb tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = tb.row(tr);
        
                if (row.child.isShown() ) {
                    row.child.hide();
                    tr.removeClass('shown');
                    tr.find('svg').attr('data-icon', 'plus-circle');
                }
                else {
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                    tr.find('svg').attr('data-icon', 'minus-circle');
                }
            });
        }) 

       	
        function format (d) {
            return "<div class='ml-5'>" +
                "<div class='form-row'>Details for&nbsp;<u>" + d.fname + " " + d.lname + "</u></div><hr class='my-1'>" +
                "<div class='form-row'>" +
                "<div class='col-3'><b>- Description</b></div><div class='col-auto'>: " + d.desc + "</div>" +
                "</div>" +
                "<div class='form-row'>" +
                "<div class='col-3'><b>- Address</b></div><div class='col-auto'>: " + d.addr + "</div>" +
                "</div></div>";
        }

        
        $("#lgout").on("click", function(){
            $.ajax({
                type: "post",
                url: "../controllers/UserController.php",
                dataType: "json",
                data: {
                    act: "logout"
                },
                beforeSend: l_swal(),
                success: function(r){
                    s_swal("Logged out.", function(){
                        l_swal();
                        location.reload();
                    });
                }
            })
        })

    </script>
</body>
</html>