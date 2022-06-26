<?php
if(isset($_POST['register-submit'])){

    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

       
    include "../../../backend/config/db_conn.php";
    require 'function.php';


    
    if (emptyInputSignup($email, $username, $pwd, $passwordRepeat, $name, $surname) !== false) {
        header("Location: ../register.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("Location: ../register.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: ../register.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd, $passwordRepeat) !== false) {
        header("Location: ../register.php?error=passwordsdontmatch");
        exit();
    }
    if (uidExists($conn, $username) !== false) {
        header("Location: ../register.php?error=usernametaken");
        exit();
    }
    
    createUser($conn, $email, $username, $pwd, $name, $surname);
        
}
else {
    header("Location: ../register.php");
    exit();
}