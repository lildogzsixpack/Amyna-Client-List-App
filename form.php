
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
			<script type="text/javascript" src="view.js"></script>
<link rel="stylesheet" type="text/css" href="css.css" media="all">
<script type="text/javascript" src="calendar.js"></script>
<br>
<title>Form</title>
<meta charset="utf8">
	</head>
<body>

<h2><strong>Φόρμα Εγγραφής Αθλητή</strong></h2>

<form action="submit.php" method="post">
<table border="0" align="center">
<tr><td><strong>Όνομα:</strong></td><td><input type="text" name="name"/></td></tr><br>
<tr><td><strong>Επίθετο:</strong></td><td><input type="text" name="surname"/></td></tr><br>
<tr><td><strong>Διεύθυνση:</strong></td><td><input type="text" name="address"/></td></tr>
<tr><td><strong>Τηλέφωνο:</strong></td><td><input type="text" name="phone"/></td></tr></table><br>

		
		<label class="description" for="element_1"><strong>Ημερομηνία Εγγραφής</strong> </label>
		<span>
			<input id="element_1_1" name="element_1_1" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_1"></label>
		</span>
		<span>
			<input id="element_1_2" name="element_1_2" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_1_2"></label>
		</span>
		<span>
	 		<input id="element_1_3" name="element_1_3" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_1_3"></label>
		</span>
<span id="calendar_1">
			<img id="cal_img_1" class="datepicker" src="calendar.gif" alt="Pick a date.">	
		</span>
		<script type="text/javascript">
			Calendar.setup({
			inputField	 : "element_1_3",
			baseField    : "element_1",
			displayArea  : "calendar_1",
			button		 : "cal_img_1",
			ifFormat	 : "%B %e, %Y",
			onSelect	 : selectDate
			});
		</script>
	<table align="center">	<br>	
		<p><strong>Συνδρομή</strong></p>
		<tr><td><input type="radio" name="subscription" value="year" /></td><td>Χρόνος</td></tr>
		<tr><td><input type="radio" name="subscription" value="six months"/></td><td>Εξαμηνιαία</td></tr>
		<tr><td><input type="radio" name="subscription" value="three months"/></td><td>Τρίμηνη</td></tr>
		<tr><td><input type="radio" name="subscription" value="month"/></td><td>Μηνιαία</td></tr>
	</table>
		<p><strong>Ιατρικό Ιστορικό / Παρατηρήσεις </strong></p>
		<textarea rows="5" cols="30" name="med"></textarea> <br>
		<input type="submit" value="Submit" name="submit" class="myButton" />&nbsp<a href="list.php"><input type="button" value="Back" class="myButton"></a>

	</form><br><br><br><br>

<a href="logout.php"><input type="BUTTON" value="Logout" class="myButton2"></a>
</body>
</html>