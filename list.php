<?php
	session_start();
	$username = $_POST[username];
	$password = sha1($_POST[password]);

	if (!isset($_SESSION[username]))
	{

		$con=mysqli_connect("localhost","form","*******","form");
		if (mysqli_connect_errno())
  		{
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}

		$result = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND pass='$password'");
	
		$rows = mysqli_num_rows($result);

		mysqli_close($con);
		if ($rows == 0)
		{
			header("location: formlogin.php?wrong");
		}
		else
		{
			$_SESSION[username] = $username;
		}
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript">
			function verify()
			{	
				var conf = confirm ("Είστε σίγουρος ότι θέλετε να σβήσετε τον συγκεκριμένο αθλητή ?");
				if (conf === false)
				{
					document.getElementById('delete').href="list.php";
					return false;
				}
				else
				{
					return true;
				}
			}
		</script>
		<link rel="stylesheet" type="text/css" href="css.css" media="all">
		<title>Boxers List</title>
		<meta charset="utf8">
	</head>
	<body>
	<div class="list" >
		<table align="center">
			<tr>
				<th>Όνομα</th><th>Επίθετο</th><th>Διεύθυνση</th><th>Τηλέφωνο</th><th>Συνδρομή</th><th>Ημερομηνία Εγγραφής</th><th>Ιατρικό Ιστορικό</th>
			</tr>
			
			<?php
			
			$con=mysqli_connect("localhost","form","*******","form");
			if (mysqli_connect_errno())
  			{
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  			}

			$result = mysqli_query($con,"SELECT * FROM boxers");
			


			while($row = mysqli_fetch_array($result))
 			{
  				echo "<tr><td>$row[name]</td><td>$row[surname]</td><td>$row[address]</td><td>$row[phone]</td><td>$row[subs]</td>
  				<td>$row[date]</td><td>$row[med]</td><td><a href=\"payments.php?id=$row[id]\">Payments</a></td><td><a id=\"delete\"href=\"del.php?del=$row[id]\" onclick=\"verify()\">Delete</a></td></tr>";
  			}

			mysqli_close($con);

			?>
				
		
		</table>
		</div>
		<br><br>
		<a href="http://arisaris.no-ip.org/form.php"><input type="BUTTON" value="Νέος Αθλητής" class="myButton"></a> <br><br><br><br><br>
		<a href="logout.php"><input type="BUTTON" value="Logout" class="myButton2"></a>
	</body>
</html>
