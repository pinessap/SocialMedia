<?php  
session_start();
include "../../../backend/config/db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$pwd = test_input($_POST['password']);


	if (empty($username)) {
		header("Location: ../login.php?error=UserName is Required");
	}else if (empty($pwd)) {
		header("Location: ../login.php?error=Password is Required");
	}else {

		// Hashing the password
		// $pwd = md5($pwd);
        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
        	// the user name must be unique
        	$row = mysqli_fetch_assoc($result);
			$test=hash('sha256', $pwd);
			if(hash('sha256', $pwd) == $row['password']){
        	//if (password_verify($pwd, $row['password'])){
        		$_SESSION['name'] = $row['name'];
        		$_SESSION['id'] = $row['id'];
        		$_SESSION['role'] = $row['role'];
        		$_SESSION['username'] = $row['username'];
				$_SESSION['email'] = $row['email'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['salutation'] = $row['salutation'];
                $_SESSION['lname'] = $row['surname'];
                $_SESSION['password'] = $row['password'];

        		header("Location: ../home.php");

        	}else {
        		header("Location: ../login.php?error=Incorrect Username or password1");
        	}
        }else {
        	header("Location: ../login.php?error=Incorrect Username or password2");
        }

	}
	
}else {
	header("Location: ../login.php");
}