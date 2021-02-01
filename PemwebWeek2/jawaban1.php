 <!DOCTYPE html>
<html>
<title>Hello World</title>
<body>

<?php

	$negara = array(
				"India" => array(
								"ibuKota" => "New Delhi",
								"kodeTel" => "91",
								"mataUang" => "INR"
						),
				"Indonesia" => array(
								"ibuKota" => "Jakarta",
								"kodeTel" => "62",
								"mataUang" => "IDR"
						),
				"Japan" => array(
								"ibuKota" => "Tokyo",
								"kodeTel" => "81",
								"mataUang" => "JPY"
						)
	
	);
	
	foreach($negara as $key => $item){
		  echo "<b><i>" .
		  $item['ibuKota'] . 
		  "</b></i> is a capital city of <b>" . 
		  $key ."</b>. <u>".
		  $key.
		  "'s calling code is ".
		  $item['kodeTel'].
		  " and has \"".
		  $item['mataUang'].
		  "\" as currency code.</u></br>";
		}
	
?>

</body>
</html> 