<?php 
session_start(); 
include "database.php";

if (isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['username']) && isset($_POST['cpassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['email']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['cpassword']);
	$name = validate($_POST['username']);

	$user_data = 'email='. $uname. '&username='. $name;


	if (empty($name)) {
		header("Location: registration.php?error=Enter a Username!&$user_data");
	    exit();
	}else if(empty($uname)){
        header("Location: registration.php?error=Enter an Email!&$user_data");
	    exit();  
	}else if(filter_var($uname, FILTER_VALIDATE_EMAIL) == false){
						header("Location: registration.php?error=Enter a valid Email Address!&$user_data");
							exit();
	}else if(empty($pass)){
        header("Location: registration.php?error=Enter a Password!&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: registration.php?error=Verify your password!&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: registration.php?error=Password doesn't match!&$user_data");
	    exit();
	}

	if($pass !== $re_pass){
        header("Location: registration.php?error=Password doesn't match!&$user_data");
	    exit();
	}
	else if (strlen($pass)<=8){
		header("Location: registration.php?error=Password needs atleast 8 characters&$user_data");
			exit();
		}
		
		else if(!preg_match("#[A-Z]+#",$pass)) {
			header("Location: registration.php?error=Password needs 1 UPPER CASE&$user_data");
				exit();
			}
			else if(!preg_match("#[a-z]+#",$pass)){
			header("Location: registration.php?error=Password needs 1 lower case&$user_data");
				exit();
			}
			else if(!preg_match("#[0-9]+#",$pass)){
				header("Location: registration.php?error=Password needs a Number&$user_data");
					exit();
				}
				elseif(!preg_match("#[\W]+#",$pass))  {
					header("Location: registration.php?error=Password needs Special Character&$user_data");
						exit();
					}
				


	else{

        //$pass = md5($pass);
	    $sql = "SELECT * FROM users WHERE name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: registration.php?error=The username is already registered!&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(email, password, name) VALUES('$uname', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: registration.php?success=Congratulations! Account successfully created!");
	         exit();
           }else {
	           	header("Location: registration.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: registration.php");
	exit();
}

