<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require '../../backend/config/db_conn.php';
include 'header.php';
?>

<head>
    <script src="../js/chatscript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/style.css" />
    <title>Chat</title>
    <?php
    $page = 'chat';
    include 'navbar.php';
    $session_uname = $_SESSION['username'];
    $session_uid = $_SESSION['id'];
    $gid = $_GET['groupID'];
    ?>
</head>

<body>
    <p id="session_uname" hidden><?php echo $session_uname; ?></p>
    <p id="session_uid" hidden><?php echo $session_uid; ?></p>
    <p id="gid" hidden><?php echo $gid; ?></p>
    
    <div class="card">
        <div id="messages"></div>
    
    <form class="chat_form">
        <input type="text" id="message" class="chat_input" autofocus placeholder="Type a message...">
        <input type="submit" id="chat_btn" class="chat_btn" value="Send">
    </form>
    </div>

</body>

</html>