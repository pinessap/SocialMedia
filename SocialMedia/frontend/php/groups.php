<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    require '../../backend/config/db_conn.php';
    include 'header.php'
    ?>

    <script src="../js/groupscript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/style.css" />

    <title>Groups</title>
</head>

<body>
    <?php
    $page = 'groups';
    include 'navbar.php';
    $session_uid = $_SESSION['id'];
    ?>
    <p id="session_uid" hidden><?php echo $session_uid; ?></p>

    <div class="container" id="make_group">
        <input type="text" id="gr_name" name="gr_name" placeholder="enter group name">
        <button type="submit" id="input_btn">Make group</button>
        <br>
    </div>


    <div class="container">
        <button type="button" id="g_list_btn">Show groups</button>

        <div id="group_list"></div>
    </div>

    <div class="container">
        <button type="button" id="add_fr_btn">Add friend to group</button>

        <div id="add_friends"></div>

    </div>


</body>

</html>