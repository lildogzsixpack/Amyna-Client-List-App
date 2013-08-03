<?php
	$month[1] = $_POST[january];
	$month[2] = $_POST[february];
	$month[3] = $_POST[march];
	$month[4] = $_POST[april];
	$month[5] = $_POST[may];
	$month[6] = $_POST[june];
	$month[7] = $_POST[july];
	$month[8] = $_POST[august];
	$month[9] = $_POST[september];
	$month[10] = $_POST[octomber];
	$month[11] = $_POST[november];
	$month[12] = $_POST[december];

	for($i=1;$i<=12;$i++){
		$payments.= $month[$i] == "1" ? "1" : "0";
	}

	$payments=bindec($payments);

	$con=mysqli_connect("localhost","form","******","form");

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	$result=mysqli_query($con,"UPDATE boxers SET payments=$payments WHERE id=$_GET[id]");

	mysqli_close($con);
 	
 	if($result==true)
 		header("location: payments.php?id=$_GET[id]");


?>