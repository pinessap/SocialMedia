<?php
$page = "profile";
$_SESSION['page'] = $page;
//require 'navbar.php';
require '../../backend/config/db_conn.php';

if (isset($_SESSION['id'])) {
    require '../../backend/config/db_conn.php';

    $username = $_SESSION['username'];
    $query = $conn->query("SELECT * FROM users WHERE username = '$username'");

    $row = $query->fetch_array();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>


    <?php
    include 'header.php';
    ?>
    <link rel="stylesheet" href="../css/style.css" />


    <title>Profile</title>
</head>

<body>


    <?php
    include 'navbar.php';


    if (isset($_GET['mypage'])) {
        include 'profile/showprofile.php';
    }


    if (isset($_GET['edit'])) {
        include 'profile/edit_profile.php';
    }

    if (isset($_GET['changepicture'])) {
        include 'profile/profilepicture.php';
    }



    if (isset($_GET['changeData'])) {
        include 'profile/changeData.php';
    }

    if (isset($_GET['success'])) {
        if ($_GET["success"] == "pic") { ?>
            <br>
            <div class="container">
                <div class="alert " role="alert">
                    <h4>Changing Profile Picture was successful!</h4>
                </div>
            </div><br><?php
                    } else { ?>
            <br>
            <div class="container">
                <!--erfolgreich-->
                <div class="alert" role="alert">
                    <h4>Changing Data was successful!</h4>
                </div>
            </div><br><?php
                    }
                }
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "username") { ?>
            <br>
            <div class="container">
                <div class="alert" role="alert">
                    <h4>Changing Username was unsuccessful!</h4>
                </div>
            </div><br><?php
                    }
                    if ($_GET["error"] == "email") { ?>
            <br>
            <div class="container">
                <div class="alert" role="alert">
                    <h4>Changing Email was unsuccessful!</h4>
                </div>
            </div><br><?php
                    }
                    if ($_GET["error"] == "name") { ?>
            <br>
            <div class="container">
                <div class="alert" role="alert">
                    <h4>Changing Name was unsuccessful!</h4>
                </div>
            </div><br><?php
                    }
                    if ($_GET["error"] == "surname") { ?>
            <br>
            <div class="container">
                <div class="alert" role="alert">
                    <h4>Changing Surname was unsuccessful!</h4>
                </div>
            </div><br><?php
                    }
                    if ($_GET["error"] == "password") { ?>
            <br>
            <div class="container">
                <div class="alert" role="alert">
                    <h4>Changing Password was unsuccessful!</h4>
                </div>
            </div><br><?php
                    }
                    if ($_GET["error"] == "edit") { ?>
            <br>
            <div class="container">
                <div class="alert" role="alert">
                    <h4>Changing Data was unsuccessful!</h4>
                </div>
            </div><br><?php
                    }
                    if ($_GET["error"] == "pic") { ?>
            <br>
            <div class="container">
                <div class="alert" role="alert">
                    <h4>Changing Profile Picture was unsuccessful!</h4>
                </div>
            </div><br><?php
                    }
                }
                        ?>
</body>

</html>