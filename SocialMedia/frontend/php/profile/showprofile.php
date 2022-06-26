<?php
session_start();
require '../../backend/config/db_conn.php';
//include 'header.php';
$username = $_SESSION['username'];
?>

<head>

    <script src="../js/profilescript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/style.css" />
    <title>My Page</title>
</head>

<body>
    <?php

    $session_uid = $_SESSION['id'];
    ?>
    <p id="uid" hidden><?php echo $session_uid; ?></p>
    <p id="username" hidden><?php echo $username; ?></p>

    <div class="card">
        <h4>My Profile</h4>
    </div>
 
    <div class="card">
        <div class="grid-container">
            <div class="grid_item4">
                <div id="my_profile"></div>
                <br><br><br><br>
                <hr>
                <div id="my_posts"></div>
            </div>
            <div class="grid_item5">
                <div id="friendlist">My Friends
                    <hr>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>

</html>