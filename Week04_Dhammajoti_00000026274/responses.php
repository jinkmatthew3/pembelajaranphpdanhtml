<body>
	
<?php 
	$name;$captcha;
	if(isset($_POST['name'])) $name=$_POST['name'];
	if (isset($_POST['g-recaptcha-response'])) $captcha=$_POST['g-recaptcha-response'];
	if (!$captcha) {
		echo "<h2>Please check the captcha from</h2>";
		exit;
	}
	$str="https://www.google.com/recaptcha/api/siteverify?secret=6Ld8SZMUAAAAANFV4_QO-W41tNNBROTk0IpXkaLA"."&response=".$captcha."remoteip=".$_SERVER['REMOTE_ADDR'];
	$response=file_get_contents($str);
	$response_arr=(array)json_decode($response);

	if ($response_arr["success"]==false) 
		echo "<h2>You are spammer ! GET OUT</h2>";
	else
		echo "<h2>Hello ".$name."</h2>";
		echo "<h2>Thanks for submiting your name.</h2>";

	
 ?>	

</body>