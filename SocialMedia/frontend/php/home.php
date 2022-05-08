<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include 'header.php'
    ?>

    <script src="../js/homescript.js" type="text/javascript"></script>
    <title>Home</title>
</head>
<body>
    
    <?php
        include 'navbar.php';
        include 'profile/newPost.php';
        $session_uid = $_SESSION['id'];
    ?>
    <p id="session_uid" hidden><?php echo $session_uid; ?></p>

    <div class="container" id="homepage">
        
    </div>
    
    
</body>
</html>

