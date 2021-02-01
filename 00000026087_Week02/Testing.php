<?php
	echo "I'm \" not \" a girl<br>I'm a woman" ;
	echo 'That is Mario\\\'s cat<br> Her name is <strong>Maria</strong>' ;
?>

<?php

	for($i = 1; $i <= 50; $i++){
		if($i % 3 == 0 && $i % 5 == 0){
			$desc = 'ping pong';
		}
		else if($i % 3 == 0){
			$desc = 'pong';
		}
		else if($i % 5 == 0){
			$desc = 'ping';
		}
		else{
			$desc = 'dum';
		}
		echo ("$i - $desc<br>");
	}

?>