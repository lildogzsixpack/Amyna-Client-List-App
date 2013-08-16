<?php
	$name = $_POST[name];
	$surname = $_POST[surname];
	$address = $_POST[address];
	$code = $_POST[code];
	$phone = $_POST[phone];
	$day = $_POST[element_1_1];
	$month = $_POST[element_1_2];
	$year = $_POST[element_1_3];
	$subs = $_POST[subscription];
	$med = $_POST[med];
	$date = $day."/".$month."/".$year;


	$con=mysqli_connect("localhost","form","*****","form");

	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  	mysqli_set_charset($con, "utf8");

  	$name = mysqli_real_escape_string($con, $name);
	$surname = mysqli_real_escape_string($con, $surname);
	$address = mysqli_real_escape_string($con, $address);
	$phone = mysqli_real_escape_string($con, $phone);
	$code = mysqli_real_escape_string($con, $code);
	$day = mysqli_real_escape_string($con, $day);
	$month = mysqli_real_escape_string($con, $month);
	$year = mysqli_real_escape_string($con, $year);
	$subs = mysqli_real_escape_string($con, $subs);
	$med = mysqli_real_escape_string($con, $med);

  	$sql = "INSERT INTO boxers (name, surname, address, code, phone, med, subs, date )VALUES ('$name', '$surname', '$address', '$code', '$phone', '$med', '$subs', '$date')";
	$result=mysqli_query($con, $sql);
	mysqli_close($con);
	if ($result == true)
		header("location: list.php");
	else 
		echo "boxer not added";
	
?>

