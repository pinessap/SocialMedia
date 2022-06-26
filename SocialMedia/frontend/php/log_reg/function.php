<?php

    function emptyInputSignup($email, $username, $pwd, $passwordRepeat, $name, $surname) {

        if (empty($email) || empty($username) || empty($pwd) || empty($passwordRepeat) || empty($name) ||empty($surname)) {
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

    function createUser($conn, $email, $username, $pwd, $name, $surname) {
        $sql = "INSERT INTO users (email, username, password, name, surname) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../register.php?error=stmtfailed");
                    exit();
            }
            
            $hashedPwd = hash('sha256', $pwd);

            mysqli_stmt_bind_param($stmt, "sssss", $email, $username, $hashedPwd, $name, $surname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("Location: ../register.php?error=none");
            exit();
        }

        function makeThumbnails($updir, $img, $id, $MaxWe=720, $MaxHe=480){
            $arr_image_details = getimagesize($img); 
            $width = $arr_image_details[0];
            $height = $arr_image_details[1];        
            
            $percent = 100;    
            if($width > $MaxWe) $percent = floor(($MaxWe * 100) / $width);    
            
                if(floor(($height * $percent)/100)>$MaxHe)  
                $percent = (($MaxHe * 100) / $height);
            
                if($width > $height) {
                    $newWidth=$MaxWe;
                    $newHeight=round(($height*$percent)/100);
                }else{
                    $newWidth=round(($width*$percent)/100);
                    $newHeight=$MaxHe;
                }
            
                //Can currently create thumbnails from 3 filetypes, even though only 2 are permitted
                if ($arr_image_details[2] == 1) {
                    $imgt = "ImageGIF";
                    $imgcreatefrom = "ImageCreateFromGIF";
                }
                if ($arr_image_details[2] == 2) {
                    $imgt = "ImageJPEG";
                    $imgcreatefrom = "ImageCreateFromJPEG";
                }
                if ($arr_image_details[2] == 3) {
                    $imgt = "ImagePNG";
                    $imgcreatefrom = "ImageCreateFromPNG";
                }
            
                if ($imgt) {
                    $old_image = $imgcreatefrom($img);
                    $new_image = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresized($new_image, $old_image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            
                   $imgt($new_image, $updir."/".$id."_t.jpg");
                    return;    
                }
            }        