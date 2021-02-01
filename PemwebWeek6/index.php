<!DOCTYPE html>
<html>
<head>
	<title>Week 06-Challenge</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <script src="assets/js/swal2.js"></script>
</head>
<body>
	<!-- ini buat loading web -->
	<script>
        swal({
            title: "Redirecting..",
            onBeforeOpen: function(){
                swal.showLoading();
            }
        })

        setTimeout(function(){
            location.href = "controllers/UserController.php?act=view";
        }, 1500);
    </script>
</body>
</html>