<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wekk -3 BOOSQ</title>
    <link rel="stylesheet" href="bs4.css"/>
    <link rel="stylesheet" href="dt.css"/>
    <script src="jq.js"></script>
    <script src="bs4.js"></script>
    <script src="dt.js"></script>
    <script src="fa.min.js"></script>
	
</head>
<body>
	<style>
        td.delete {
            cursor: pointer;
        }
    </style>

    <!--TOPNAV BUNG-->
	<header>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<h4 style="color:grey"> [IF635] Web Programming </h4>
				</div>
				<ul class="navbar-nav">
					<li class="navbar-right active">
						<a href="#"> Employees </a>
					</li>
				</ul>
			</div>
		</nav>
	</header>

	<!--TABLE BUNG-->
	<div class="container">
		<table id="tb" class="table table-striped table-bordered w-100">
			<thead>
				<!--<th>-->
					<td></td>
					<td> # </td>
					<td> Last Name </td>
					<td> Job Title </td>
				<!--</th>-->
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<!--<th>-->
					<td></td>
					<td> # </td>
					<td> Last Name </td>
					<td> Job Title </td> 
				<!--</th>-->
			</tfoot>
		</table>
	</div>
	
	<script>
		function format (d) {
            return "<div class='ml-5'>" +
                "<div class='form-row'>Full Name :  " + d.first_name + ' ' + d.last_name + "</div><hr class='my-1'>" +
                "<div class='form-row'>Address :  " + d.address + "</div><hr class='my-1'>" +
                "<div class='form-row'>City :  " + d.city + "</div><hr class='my-1'>" +
                "<div class='form-row'>Home Phone :  " + d.home_phone + "</div><hr class='my-1'>" + 
                "</div>";

               /* INI GAK BISA DIPAKE --return 
			'<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' + 
				'<tr>' + 
					'<td> Full Name : </td>' + 
					'<td>' + d.first_name + ' ' + d.last_name + '</td>' 
				'</tr>' +
				'<tr>' +  
				'<td> Birth Date : </td>' + 
					'<td>' + d.address  + '</td>' 
				'</tr>' +
				'<tr>' +  
				'<td> City : </td>' + 
					'<td>' + d.city  + '</td>' 
				'</tr>' +
				'<tr>' +  
				'<td> Home Phone : </td>' + 
					'<td>' + d.home_phone  + '</td>' 
				'</tr>' +
			'</table>';*/
        }
		
		$(document).ready(function(){
			//supaya nerima data pas awal
            fetch_data();
        });
		
		//untuk nerima data
		function fetch_data(){
			console.log('show data');
			var tb = $("#tb").DataTable({
                ajax: {
                    url: "isijson.php",
                    type: "get",
                    dataType: "json",
                    dataSrc: ""
                },
                columns: [
                    {
                        className: "delete text-center",
                        orderable: false,
                        data: null,
                        defaultContent: "<i class='fas fa-trash text-primary'></i>"//icon deletenya
                    }, 
                    {className: "ids",
						data: "id"},
                    {data: "last_name"},
                    {data: "job_title"}
                ],
                order: [[1, "asc"]]
            });
		};
		
		// $('.delete').click(function(){
			// alert('test');
			// var id = $(this).find('.ids');
			// alert('hello from ', id);
		// })
		
		//untuk menghapus data
		$(document).on('click','.delete',function(){
			//supaya dapet idnya
			var id = $(this).siblings('.ids').text();
			//alert(id);
			//console.log("id = ",id);
			if(confirm("are you sure want to remove this ?"))
			{
				$.ajax({
					url:"delete.php",
					method:"post",
					data:{id:id},
					success:function(data)
					{
						$('#alert_message').html('div class="alert alert-success">'+data+'</div>');
						
						location.reload();
						
					}
				})
			}
		});
		
			
		</script> 
</body>
</html>