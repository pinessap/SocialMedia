<?php
$username = $_GET["username"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    require '../../backend/config/db_conn.php';
    include 'header.php'
    ?>

    <script src="../js/showUserscript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/style.css" />


    <title><?php echo $username ?></title>
</head>

<body>
    <?php
    $page = 'friends';
    include 'navbar.php';
    $session_uid = $_SESSION['id'];
    ?>
   <p id="session_uid" hidden><?php echo $session_uid; ?></p>
    <p id="fr_username" hidden><?php echo $username; ?></p>

    <div class="card">
            <div class="grid_item6">
                <div id="friend_profile"></div>
                <br><br><br><hr>
                <div id="friend_posts"></div>
            </div>
    </div>
</body>
</html>