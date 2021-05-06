<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<div id="form">
		<form action="verify.php" method="post">		
			<div class="reg">
				<p>REGISTRATION</p>	
			</div>
			<div class="user">
				<p>Username: </p>
				<input type="text" name="username" placeholder="Username" autocomplete="off"/>		
			</div>
			<div class="pass">
				<p>Password: </p>
				<input type="password" name="password" placeholder="Password" />				
			</div>
			<div class="mail">
				<p>Email: </p>
				<input type="text" name="email" placeholder="Email" autocomplete="off"/>
			</div>
			<div class="cpass">
				<p>Confirm Password: </p>
				<input type="password" name="cpassword" placeholder="Confirm Password" />
			</div>
			<div class="button" >
			<input type="submit" id="btn" name="submit" value="Sign up" />
			</div>
			<div class="lnk">
			    <a href="index.php">Log In</a>
			<?php if (isset($_GET['success'])) { ?>
               <p class="sc"><?php echo $_GET['success']; ?></p>
         	<?php } ?>


			 <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     		<?php } ?> 
     		
     		  
			</div>
		</form>
	</div>
</body>
</html>