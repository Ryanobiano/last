<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
   
     <button onclick="document.location='login.php'">LOGOUT</button>
     
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>