<?php 
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    -->
    <link rel="stylesheet" href="../css/style.css"/>
    <title>Register</title>
</head>
<body>
	<section class="container">
        
        <div class="register">
            <h1>Register</h1>   
            <?php
                if(isset($_GET["error"])) {?>
                <div class="alert alert-danger" role="alert"><?php
                    if ($_GET["error"] == "emptyinput") {
                        echo '<p>Fill in all the fields!</p>'; 
                    }
                    else if ($_GET["error"] == "invaliduid"){
                        echo '<p>Invalid username !</p>'; 
                    }
                    else if ($_GET["error"] == "invalidemail"){
                        echo '<p>Invalid e-mail!</p>'; 
                    }
                    else if ($_GET["error"] == "passworddontmatch"){
                        echo '<p>Your passwords do not match!</p>'; 
                    }
                    else if ($_GET["error"] == "usernametaken"){
                        echo '<p>Username is already taken!</p>'; 
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo '<p>Something went wrong!</p>'; 
                    }
                    else if ($_GET["error"] == "sqlerror") {
                        echo '<p>Something went wrong!</p>'; 
                    }
                    else if ($_GET["error"] == "none") {
                        echo '<p>Registered successful!</p>'; 
                    } 
                ?></div><?php
                }
            ?>
        <form action="log_reg/manageRegister.php" method="post">
            <p>Please fill in this form to create an account.</p>
            <hr>
            <label for="salutation">Salutation</label></br>
            <select id="salutation" name="salutation">
                <option disabled selected>select</option>
                <option value="Ms">Ms</option>
                <option value="Mr">Mr</option>
                <option value="Mx">Mx</option></select><br>

            <label for="fname">Name</label>
            <input type="text" id="fname" name="name" placeholder="Name"/>
            <label for="lname">Surname</label>
            <input type="text" id="lname" name="surname" placeholder="Surname"/>
            <hr>
            <!-- <label for="address">Adress</label>
            <input type="text" id="address" name="address" placeholder="Street" required/>
            <input type="number" id="address" name="address" placeholder="Housenumber" required/>
            <input type="text" id="address" name="address" placeholder="City" required/>
            <input type="number" pattern="[0-9]{5}" size="4" id="address" name="address" placeholder="Postal code" required/><br>
            <hr>  -->
            
                <label for="email">Email</label>
                <input type="text" placeholder="Enter Email" name="email" id="email">
                <label for="username">Username</label>
                <input type="text" placeholder="Enter Username" name="username" id="username">
                <label for="password">Password</label>
                <input type="password" placeholder="Enter Password" name="password" id="password">
                <label for="pwd-repeat">Repeat Password</label>
                <input type="password" placeholder="Repeat Password" name="password-repeat" id="passwprd-repeat">
                <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button type="submit" name="register-submit" class="registerbtn">Register</button>
                <p>Already have an account? <a href="../index.php">Log in</a>.</p>
                <a href="home.php"><button type="button" class="cancelbtn">Cancel</button></a>
            </form>  
        </div>
    </section>
</body>

<?php 
    //require 'footer.php';
?> 
    
</html>