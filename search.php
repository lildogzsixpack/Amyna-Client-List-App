<?php 
	session_start();
	
	if (!isset($_SESSION[username])) {
		header("location: formlogin.php");
		exit();
		
	}
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Αναζήτηση</title>
	<link rel="stylesheet" type="text/css" href="css.css" media="all">
	<meta charset="utf8">
</head>
<body>

	<form action="search.php" method="GET">
		<input type="text" name="term" size="50"> 
		<input type="submit" value="Search" class="myButton">
		<a href="list.php"><input type="button" value="Back" class="myButton2"></a> <br><br><br>
	</form>

	
	<div class="list" >
		<table align="center">
		
			<tr>
				<th>Κωδικός Αθλητή</th><th>Επίθετο</th><th>Όνομα</th><th>Διεύθυνση</th><th>Τηλέφωνο</th><th>Συνδρομή</th><th>Ημερομηνία Εγγραφής</th><th>Ιατρικό Ιστορικό</th>
			</tr>
<?php
  	$con=mysqli_connect("localhost","form","*****","form");
	if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
  	mysqli_set_charset($con, "utf8");
  	$term = $_GET['term'];
  	$sql = mysqli_query ($con,"SELECT * FROM boxers WHERE name LIKE '%$term%' OR surname LIKE '%$term%' OR phone LIKE '%$term%' OR code LIKE '%$term%' ORDER BY surname ASC");
  	

  	while($row = mysqli_fetch_array($sql))
 			{
  				echo "<tr><td>$row[code]</td><td>$row[surname]</td><td>$row[name]</td><td>$row[address]</td><td>$row[phone]</td><td>$row[subs]</td>
  				<td>$row[date]</td><td>$row[med]</td><td><a href=\"payments.php?id=$row[id]\">Payments</a></td><td><a id=\"delete\"href=\"del.php?del=$row[id]\" onclick=\"verify()\">Delete</a></td></tr>";
  			
  			}

			mysqli_close($con);

  	
?>

	</table>
</div>
</body>
</html>