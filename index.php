<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="form">
		<form action="login.php" method="post" >
		<div class="log">Login</div>
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>			


		<div class="user">
			<input type="text" name="username" placeholder="Username" autocomplete="off"/>
		</div>
		<div class="pass">
			<input type="password" name="password" placeholder="Password" />
		</div>
		<div class="button" >
			<input type="submit" id="btn" name="submit" value="Login" />
		</div>
		<div class="lnk">
			<a href="registration.php">I don't have account yet</a>
		</div>
		</div>
		</form>
</body>
</html>