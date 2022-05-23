<?php 
    //require_once '../backend/config/db_conn.php';
   session_start();
   //include "../backend/config/db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   
        $login = 1;
   } else{
       $login = 0;
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'php/header.php';
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Home</title>
</head>
<body>
    <?php
        $page="index";
        $_SESSION['page'] = $page;
        if($login == 1){
            //include 'php/navbar.php';
            include 'php/home.php';
        } else{
            include 'php/login.php';
        }
        
    ?>
    
</body>
</html>