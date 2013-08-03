
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css.css" media="all">
		<title>Log In</title>
		<meta charset="utf8">
	</head>
	<body>
		<fieldset>
			<legend><strong>Please log in</strong></legend>
				<form action="list.php" method="post">
				<table align="center">
					<tr><td><label for="user"><strong> Username:</strong></label></td><td><input type="text" name="username" id="user"/></td></tr> <br><br>
					<tr><td><label for="pass"><strong>Password:</strong></label></td><td><input type="password" name="password" id="pass"/></td></tr></table><br>
				<input type="submit" value="Login" name="login" id="login" class="myButton"  />

			</form><br>
		</fieldset>
		<?php
			if (isset($_GET[wrong]))
			{
				echo "<strong><font color = \"red\" >Wrong username or password</font></strong><br/>";
			}


		?>
		
	</body>
</html>
