<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Wekk03 Challenge</title>
        <link rel="stylesheet" href="bs4.css"/>
        <link rel="stylesheet" href="dt.css"/>
        <script src="jq.js"></script>
        <script src="bs4.js"></script>
        <script src="dt.js"></script>
        <script src="fa.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- Data Tables -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        
    </head>
    <body>
        <style>
            td.details-control {
                cursor: pointer;
            }
        </style>

        <!-- TOPNAV -->
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

         <!-- CONTENT -->
        <div class="container">
            <table id="tb" class="table table-striped table-bordered w-100">
                <thead> 
                        <td></td>
                        <td> # </td>
                        <td> Last Name </td>
                        <td> Job Title </td>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        
        <script>
            
            $(document).ready(function(){
                var tb = $("#tb").DataTable({
                    ajax: {
                        url: "getdata.php",
                        type: "get",
                        dataType: "json",
                        dataSrc: ""
                    },
                    columns: [
                        {
                            className: "details-control text-center",
                            orderable: false,
                            data: null,
                            defaultContent: "<i class='fas fa-plus-circle text-primary'></i>"
                        }, 
                        {data: "id"}, 
                        {data: "last_name"},
                        {data: "job_title"}
                    ],
                    order: [[1, "asc"]]
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
                    "<div class='form-row'>Full Name :  " + d.first_name + ' ' + d.last_name + "</div><hr class='my-1'>" +
                    "<div class='form-row'>Address :  " + d.address + "</div><hr class='my-1'>" +
                    "<div class='form-row'>Email Address: " + d.email_address + "</div><hr class='my-1'>" + //karena ga ada birthdate jadi diganti email address
                    "<div class='form-row'>City :  " + d.city + "</div><hr class='my-1'>" +
                    "<div class='form-row'>Home Phone :  " + d.home_phone + "</div><hr class='my-1'>" + // karena ga ada extension jadi di ganti home_phone
                    "</div>";   
            }
        </script>  
    </body> 
</html>
