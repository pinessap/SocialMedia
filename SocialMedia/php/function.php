<?php
    function emptyInputSignup($salutation, $email, $username, $pwd, $passwordRepeat, $name, $surname) {

        if (empty($salutation) ||empty($email) || empty($username) || empty($pwd) || empty($passwordRepeat) || empty($name) ||empty($surname)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }
    function invalidUid($username) {
    
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function pwdMatch($password, $passwordRepeat) {
        
        if ($password !== $passwordRepeat) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function uidExists($conn, $username) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../register.php?error=stmtfailed!");
                exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($resultData)) {
                return $row;
            }
            else {
                $result = false;
                return $result;
            }

    }

    function createUser($conn, $salutation, $email, $username, $pwd, $name, $surname) {
        $sql = "INSERT INTO users (salutation, email, username, password, name, surname) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=stmtfailed");
                    exit();
            }
            
            $hashedPwd = hash('sha256', $pwd);

            mysqli_stmt_bind_param($stmt, "ssssss", $salutation, $email, $username, $hashedPwd, $name, $surname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("Location: ../register.php?error=none");
            exit();
        }
