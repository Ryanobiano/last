<?php
session_start(); 
include "database.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=Input a Username!");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Input a Password!");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE name='$uname' AND password='$pass'";
		

		$result = mysqli_query($conn, $sql);
		

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				$sql2 = "SELECT * FROM users WHERE name='$uname' ";
				$result2 = mysqli_query($conn, $sql2);
				if(mysqli_num_rows($result2) <= 0){
					$row = mysqli_fetch_assoc($result2);
					header("Location: index.php?error=Username does not Exist try again.");
					exit();
				}
			}
		}else{
			header("Location: index.php?error=Password didn't match!");
	        exit();
		}
	}
}else{
	header("Location: index.php");
	exit();
}
			