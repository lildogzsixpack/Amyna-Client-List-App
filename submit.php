<?php
	$name = $_POST[name];
	$surname = $_POST[surname];
	$address = $_POST[address];
	$phone = $_POST[phone];
	$day = $_POST[element_1_1];
	$month = $_POST[element_1_2];
	$year = $_POST[element_1_3];
	$subs = $_POST[subscription];
	$med = $_POST[med];
	$date = $day."/".$month."/".$year;


	$con=mysqli_connect("localhost","form","******","form");

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	$result=mysqli_query($con,"INSERT INTO boxers (name, surname, address, phone, med, subs, date )
	VALUES ('$name', '$surname', '$address', '$phone', '$med', '$subs', '$date')");
	mysqli_close($con);

	if ($result == true)
		header("location: list.php");
	else 
		echo "boxer not added";
	
?>

