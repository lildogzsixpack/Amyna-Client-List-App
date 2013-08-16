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
		<link rel="stylesheet" type="text/css" href="css.css" media="all">
		<title>Λίστα Αθλητών</title>
		<meta charset="utf8">
	</head>
	<body>
	<form method="POST" action="submitpayments.php<?php echo "?id=$_GET[id]";?>" >
	<div class="list" >
		<table align="center">
			<tr>
				<th>Επίθετο</th><th>Όνομα</th><th>Ιανουάριος</th><th>Φεβρουάριος</th><th>Μάρτιος</th><th>Αρπρίλιος</th>
				<th>Μάιος</th><th>Ιούνιος</th><th>Ιούλιος</th><th>Αύγουστος</th><th>Σεπτέμβρης</th><th>Οκτώμβρης</th><th>Νοέμβρης</th>
				<th>Δεκέμβρης</th>
			</tr>
			
			<?php
			
			$con=mysqli_connect("localhost","form","*****","form");
			if (mysqli_connect_errno())
  			{
  				echo "Failed to connect to MySQL: " . mysqli_connect_error();
  			}
  			mysqli_set_charset($con, "utf8");
			$result = mysqli_query($con,"SELECT * FROM boxers WHERE id='$_GET[id]'");
	
			while($row = mysqli_fetch_array($result))
 			{
 				$payments=decbin($row[payments]);
 				$len=strlen($payments);

 				if($len<12){
 					for($i=0;$i<12-$len;$i++)
 						$payments="0".$payments;
 				}

 				for ($i=0;$i<=11;$i++) {
 				   	if($payments[$i]=="1")
 				   		$payment[$i]="checked"; 
				}
				mysqli_set_charset($con, "utf8");
  				echo "<tr><td>$row[surname]</td><td>$row[name]</td>
  				<td><input type=\"checkbox\" name=\"january\" class=\"css-checkbox\" value=\"1\" $payment[0]/></td>
  				<td><input type=\"checkbox\" name=\"february\" class=\"css-checkbox\" value=\"1\" $payment[1]/></td>
  				<td><input type=\"checkbox\" name=\"march\" class=\"css-checkbox\" value=\"1\" $payment[2]/></td>
  				<td><input type=\"checkbox\" name=\"april\" class=\"css-checkbox\" value=\"1\" $payment[3]/></td>
  				<td><input type=\"checkbox\" name=\"may\" class=\"css-checkbox\" value=\"1\" $payment[4]/></td>
  				<td><input type=\"checkbox\" name=\"june\" class=\"css-checkbox\" value=\"1\" $payment[5]/></td>
  				<td><input type=\"checkbox\" name=\"july\" class=\"css-checkbox\" value=\"1\" $payment[6]/></td>
  				<td><input type=\"checkbox\" name=\"august\" class=\"css-checkbox\" value=\"1\" $payment[7]/></td>
  				<td><input type=\"checkbox\" name=\"september\" class=\"css-checkbox\" value=\"1\" $payment[8]/></td>
  				<td><input type=\"checkbox\" name=\"octomber\" class=\"css-checkbox\" value=\"1\" $payment[9]/></td>
  				<td><input type=\"checkbox\" name=\"november\" class=\"css-checkbox\" value=\"1\" $payment[10]/></td>
  				<td><input type=\"checkbox\" name=\"december\" class=\"css-checkbox\" value=\"1\" $payment[11]/></td></tr>
  				";
  				
  			}

			mysqli_close($con);

			?>
				
		
		</table>
		</div><br>
		<input type="submit" value="Save" class="myButton2">&nbsp<a href="list.php"><input type="button" value="Back" class="myButton2"></a> <br><br><br>
		<a href="logout.php"><input type="BUTTON" value="Logout" class="myButton2"></a>

		</form>
	</body>
</html>