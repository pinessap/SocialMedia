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

    <div class="card">
        <h4>Groups</h4>
    </div>
    <div class="card">
        <div class="container" id="make_group">
            <input class="fr_gr_input" type="text" id="gr_name" name="gr_name" placeholder="enter new group name">
            <br>
            <button class="standardbtn" type="submit" id="input_btn">create group</button>
            <button class="standardbtn" type="button" id="g_list_btn">show groups</button>
            <button class="standardbtn" type="button" id="add_fr_btn">add friend to group</button>

            <hr>
            <div class="display_fr_gr" id="mk_group"></div>

            <div class="display_fr_gr" id="group_list"></div>

            <div class="display_fr_gr" id="add_friends"></div>
            <hr>

        </div>
    </div>

</body>

</html>