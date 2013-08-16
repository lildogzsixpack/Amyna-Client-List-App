<?php
	$con=mysqli_connect("localhost","form","*****","form");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	if(isset($_GET['del']))
	{
		$sql = "DELETE FROM boxers WHERE id={$_GET['del']}";
		$result= mysqli_query($con, $sql);

		if ($result==true)
		{
			header("location: list.php");
		}
		else
			echo "Cannot delete boxer";
	}
	mysqli_close($con);
	

?>