<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        require '../../backend/config/db_conn.php';
        include 'header.php'
    ?>
    
    <script src="../js/friendscript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/style.css"/>

    <title>Friends</title>
</head>
<body>
    <?php
        $page = 'friends';
       include 'navbar.php';
        $session_uid = $_SESSION['id'];
    ?>
    <p id="session_uid" hidden><?php echo $session_uid; ?></p>

    <div class="container" id="search_friends">
        <input type="text" id="search_user" name="search_user">
        <button type="submit" id="search_btn">Search for username</button>
        <br>
    </div>
    

    <div class="container" id="friend_request">
        <button type="button" id="fr_req_btn">Show friend requests</button>  
        <br>
    </div>

    <div class="container" id="see_friends">
        <button type="button" id="see_fr_btn">Show friends</button>

    </div>
    
    
</body>
</html>

