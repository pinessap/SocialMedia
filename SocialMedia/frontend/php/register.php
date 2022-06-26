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
    <link rel="stylesheet" href="../css/style.css" />
    <title>Register</title>
</head>

<body>

    <div class="register">
        <!-- <h1>Register</h1>    -->
        <?php
        if (isset($_GET["error"])) { ?>
            <div class="alert" role="alert"><?php
                                            if ($_GET["error"] == "emptyinput") {
                                                echo '<p>Fill in all the fields!</p>';
                                            } else if ($_GET["error"] == "invaliduid") {
                                                echo '<p>Invalid username !</p>';
                                            } else if ($_GET["error"] == "invalidemail") {
                                                echo '<p>Invalid e-mail!</p>';
                                            } else if ($_GET["error"] == "passworddontmatch") {
                                                echo '<p>Your passwords do not match!</p>';
                                            } else if ($_GET["error"] == "usernametaken") {
                                                echo '<p>Username is already taken!</p>';
                                            } else if ($_GET["error"] == "stmtfailed") {
                                                echo '<p>Something went wrong!</p>';
                                            } else if ($_GET["error"] == "sqlerror") {
                                                echo '<p>Something went wrong!</p>';
                                            } else if ($_GET["error"] == "none") {
                                                echo '<p>Registered successfully!</p>';
                                            }
                                            ?></div><?php
                                                }
                                                    ?>
        <div class="container">
            <div class="flex-container-2">
                <div class="item1_register" style="flex-grow: 1">

                    <img src="../img/leaf.png" alt="Leaf Logo">
                    <div class="logo-container">
                        <img src="../img/logo_name.png" alt="Leaf Name">
                    </div>
                </div>
                <div class="item2_register" style="flex-grow: 7">


                    <form action="log_reg/manageRegister.php" method="post">
                        <!-- <p>Please fill in this form to create an account.</p>
            <hr> -->
                        <ul class="reg">
                            <hr>
                            <li>
                                <label for="fname"><b>Name</b></label>
                                <input type="text" class="register_input" id="fname" name="name" placeholder="Name" />
                            </li>
                            <li>
                                <label for="lname"><b>Surname</b></label>
                                <input type="text" class="register_input" id="lname" name="surname" placeholder="Surname" /><br>
                            </li>
                            <li>
                                <label for="email"><b>Email</b></label>
                                <input type="text" class="register_input" placeholder="Enter Email" name="email" id="email">
                            </li>
                            <li>
                                <label for="username"><b>Username</b></label>
                                <input type="text" class="register_input" placeholder="Enter Username" name="username" id="username"><br>
                            </li>
                            <li>
                                <label for="password"><b>Password</b></label>
                                <input type="password" class="register_input" placeholder="Enter Password" name="password" id="password">
                            </li>
                            <li>
                                <label for="pwd-repeat"><b>Repeat Password</b></label>
                                <input type="password" class="register_input" placeholder="Repeat Password" name="password-repeat" id="passwprd-repeat">
                            </li>
                            <hr>
                        </ul>
                        <!--<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>-->
                        <button type="submit" name="register-submit" class="standardbtn">Register</button>
                        <!-- <button type="submit" name="register-submit" class="registerbtn" data-bs-toggle="modal"
                data-bs-target="#registerModal" type="button">Register</button> -->
                        <!-- <button class="submit-btn" data-bs-toggle="modal" data-bs-target="#registerModal" type="button">Register</button> -->

                        <!-- Modal -->
                        <!-- <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align: center">
                                Upload a profile picture!
                            </div>
                            <div class="modal-footer">
                                <a href="php/edit_profile.php"><button type="button" class="submit-btn" data-bs-dismiss="modal">Ok!</button></a>
                                <a href="php/home.php"><button type="button" class="submit-btn" data-bs-dismiss="modal">Skip</button></a>
                            </div>
                        </div>
                    </div>
                </div> -->
                        <p>Already have an account? <a class="reglog" href="../index.php">Log in</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
//require 'footer.php';
?>

</html>