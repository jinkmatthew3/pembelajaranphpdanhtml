<?php 
					//lokasi sql
					$host = "localhost";

					//user yang digunakan buat login
					$username = "root";

					//nama database yang digunakan
					$dbname = "northwind";

					//password nya 
					$password = "";
					$json_array = array();


					//object database nya 
					$db = new mysqli($host, $username, $password, $dbname);

					$query = "SELECT * FROM employees";
					$result = $db->query($query);

					while($row = $result->fetch_assoc()){
						$json_array[] = array(
				            "id" => $row["id"],
				             "first_name" => $row["first_name"],
				             "last_name" => $row["last_name"],
				             "address" => $row["address"],
				             "city" => $row["city"],
				             "job_title" => $row["job_title"],
				             "home_phone" => $row["home_phone"]
				         );	
					}

					echo json_encode($json_array);

					/*echo '<pre>';
						print_r($json_array);
					echo '</pre>';*/

					mysqli_free_result($result);
					mysqli_close($db);
			?>