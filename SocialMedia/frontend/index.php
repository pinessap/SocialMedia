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
    <link rel="stylesheet" href="../frontend/css/style.css"/>
    <title>Index</title>
</head>
<body>
    <?php
        $page="index";
        $_SESSION['page'] = $page;
        if($login == 1){
            //include 'php/navbar.php';
            include 'php/home.php';
        } else{
        ?>
        <div class="container">
            <div class="flex-container">
                <div class="item1" style="flex-grow: 1">
                
                <img class="login" src="img/leaf.png" alt="Leaf Logo"><div class="logo-container">
                    <img class="login2" src="img/logo_name.png" alt="Leaf Name">
                </div>
                </div>
                <div class="item2" style="flex-grow: 7">
                
                    <!-- <button id="login_btn"><a href="php/login.php">I have an account</button>
                    <button id="register_btn"><a href="php/register.php">I don't have an account</button>
                 --><?php
            include 'php/login.php';
        }?>
        </div>
            </div>
        </div>
    
    
</body>
</html>