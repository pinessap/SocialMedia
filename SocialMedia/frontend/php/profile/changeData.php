<?php
session_start();

require '../../backend/config/db_conn.php';

/*$username = $row['username'];             //alte Daten
    $email = $row['email'];
    $anr = $row['salutation'];
    $fname = $row['name'];
    $lname = $row['surname'];
    $password = $row['password'];*/

$username = $_SESSION['username'];             //alte Daten
$email = $_SESSION['email'];
$fname = $_SESSION['name'];
$lname = $_SESSION['lname'];
$password = $_SESSION['password'];


if (isset($_POST['submitnew'])) {
    $uid = $_SESSION['id'];
    //echo $uid;



    if (isset($_POST['new_uname']) && !empty($_POST['new_uname'])) {     //username
        $username = $_POST["new_uname"];


        //check if username taken
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $res = mysqli_query($conn, $sql);
        if ($res && mysqli_num_rows($res) > 0) {
            header("Location: profile.php?error=username");
            die();
        } else {
            $query = "UPDATE users SET username='$username' WHERE id = '$uid'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['username'] = $username;
            } else {
                header("Location: profile.php?error=username");
                die();
            }
        }
    }
    if (isset($_POST['new_email']) && !empty($_POST['new_email'])) {     //email
        $email = $_POST["new_email"];
        $query = "UPDATE users SET email='$email' WHERE id = '$uid'";
        $result = mysqli_query($conn, $query);
        if ($result) {
        } else {
            header("Location: profile.php?error=email");
            die();
        }
    }
    if (isset($_POST['new_fname']) && !empty($_POST['new_fname'])) {    //vorname
        $fname = $_POST["new_fname"];
        $query = "UPDATE users SET name='$fname' WHERE id = '$uid'";
        $result = mysqli_query($conn, $query);
        if ($result) {
        } else {
            header("Location: profile.php?error=name");
            die();
        }
    }
    if (isset($_POST['new_lname']) && !empty($_POST['new_lname'])) {     //nachname
        $lname = $_POST["new_lname"];
        $query = "UPDATE users SET surname='$lname' WHERE id = '$uid'";
        $result = mysqli_query($conn, $query);
        if ($result) {
        } else {
            header("Location: profile.php?error=surname");
            die();
        }
    }
    if (isset($_POST['old_pwd']) && isset($_POST['new_pwd'])) {          //password, beides muss eingegeben werden
        if (!empty($_POST['old_pwd']) && !empty($_POST['new_pwd'])) {
            //retrieve hashpwd from database 
            $sql1 = "SELECT password FROM users WHERE id = '$uid'";

            $res1 = mysqli_query($conn, $sql1);
            if ($res1 && mysqli_num_rows($res1) > 0) {
                $user_data = mysqli_fetch_assoc($res1);
                $hashedpwd = $user_data['password'];                        //eingabe wird in hash umgewandelt     

                if (hash('sha256', $_POST['old_pwd']) == $hashedpwd) {        //eingabe altes passwort muss mit dem aus datenbank übereinstimmen
                    $password = $_POST["new_pwd"];
                    $newhashedpwd = hash('sha256', $password);                                      //new password
                    $query = "UPDATE users SET password='$newhashedpwd' WHERE id = '$uid'";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                    } else {
                        header("Location: profile.php?error=password");
                        die();
                    }
                } else {
                    header("Location: profile.php?error=password");
                    die();
                }
            } else {
                header("Location: profile.php?error=password");
                die();
            }
        } else if (!empty($_POST['old_pwd']) || !empty($_POST['new_pwd'])) {
            header("Location: profile.php?error=edit");
            die();
        }
    }

    header("Location: profile.php?success");
}




?>

<!DOCTYPE html>
<html lang="de">

<head>
    <script src="../js/del_account.js" type="text/javascript"></script>
</head>

<body>
    <?php
    $session_uid = $_SESSION['id'];
    ?>
    <p id="session_uid" hidden><?php echo $session_uid; ?></p>


    <div class="card">
        <h4>Change Information</h4>
    </div>
    <div class="card">
        <div class="container">
            <form action="" method="POST">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $username; ?></th>
                            <td><input type="text" class="form-control" id="new_uname" name="new_uname" placeholder="new username"></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $email; ?></th>
                            <td><input type="text" class="form-control" id="new_email" name="new_email" placeholder="new email"></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $fname; ?></th>
                            <td><input type="text" class="form-control" id="new_fname" name="new_fname" placeholder="new name"></td>
                        </tr>
                        <tr>
                            <th scope="row"><?php echo $lname; ?></th>
                            <td><input type="text" class="form-control" id="new_lname" name="new_lname" placeholder="new surname"></td>
                        </tr>
                        <tr>
                            <th scope="row">●●●●●●●</th>
                            <td><input type="password" class="form-control" id="old_pwd" name="old_pwd" placeholder="type in current password"></td>
                        </tr>
                        <tr>
                            <th scope="row">type in new password</th>
                            <td><input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="new password"></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" name="submitnew" id="submitnew" class="standardbtn">Save Changes</button>


                <button class="standardbtn" data-bs-toggle="modal" data-bs-target="#deleteModal" type="button">Delete Profile</button>

                <!-- Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body" style="text-align: center">
                                Are you sure you want to delete your account?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="standardbtn2" id="del_acc">Yes, delete my Account</button>
                                <button type="button" class="standardbtn2" data-bs-dismiss="modal">No, keep my account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>


    <?php
    //include 'scripts.php';
    ?>



</body>

</html>