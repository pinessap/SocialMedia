<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    require '../../backend/config/db_conn.php';
    include 'header.php'
    ?>

    <script src="../js/friendscript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/style.css" />

    <title>Friends</title>
</head>

<body>
    <?php
    $page = 'friends';
    include 'navbar.php';
    $session_uid = $_SESSION['id'];
    ?>
    <p id="session_uid" hidden><?php echo $session_uid; ?></p>

    <div class="card">
        <h4>Friends</h4>
    </div>
    <div class="card">
        <div class="container" id="search_friends">
            <input class="fr_gr_input" type="text" id="search_user" name="search_user" placeholder="search for friends">
            <br>
            <button class="standardbtn" type="submit" id="search_btn">search for username</button>
            <button class="standardbtn" type="button" id="fr_req_btn">show friend requests</button>
            <button class="standardbtn" type="button" id="see_fr_btn">show friends</button>
            <hr>
            <div class="display_fr_gr" id="friend_search"></div>

            <div class="display_fr_gr" id="friend_request"></div>

            <div class="display_fr_gr" id="see_friends"></div>
            <hr>
        </div>
    </div>

</body>

</html>