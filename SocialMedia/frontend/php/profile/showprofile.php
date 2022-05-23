<?php
session_start();
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../js/profilescript.js" type="text/javascript"></script>

</head>

<body>
    <?php
    $session_uid = $_SESSION['id'];
    ?>
    <p id="uid" hidden><?php echo $session_uid; ?></p>
    <p id="username" hidden><?php echo $username; ?></p>

    <div class="container" id="my_profile"></div>

    <div class="container">
        <div class="row-centred">
            <table class="table" id="my_posts">
                <tbody>

                </tbody>
            </table>
        </div>
    </div>


</body>

</html>