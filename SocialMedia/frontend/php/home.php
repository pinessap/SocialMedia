<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    //session_start();
    require '../backend/config/db_conn.php';
    include 'header.php'
    ?>

    <script src="js/homescript.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../frontend/css/style.css" />

    <title>Home</title>
</head>

<body>

    <?php
    include 'navbar.php';

    $session_uid = $_SESSION['id'];
    $page = 'home';
    ?>
    <p id="session_uid" hidden><?php echo $session_uid; ?></p>

    <div class="card">
        <div class="title">Home</div>
    </div>
    <div class="card">
        <div class="grid-container">
            <div class="grid_item1">
                <div id="viewPosts">
                    My Feed
                    <hr>
                </div>
            </div>
            <div class="grid_item2">
                <div id="newPost">
                    New Post
                    <hr><?php include 'profile/newPost.php'; ?>
                </div>
            </div>
            <div class="grid_item3">
                <div id="viewFriends">
                    My Friends
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>

</html>