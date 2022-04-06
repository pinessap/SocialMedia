<?php
    //session_start();

    require 'db_conn.php';
    
    $username = $row['username'];             //alte Daten
    $email = $row['email'];
    $anr = $row['salutation'];
    $fname = $row['name'];
    $lname = $row['surname'];
    $password = $row['password'];

    if (isset($_POST['submitnew'])) {
        $uid = $_SESSION['id'];
        //echo $uid;
      
        

        if(isset($_POST['new_uname']) && !empty($_POST['new_uname'])) {     //username
            $username = $_POST["new_uname"];


             //check if username taken
            $sql = "SELECT * FROM users WHERE username = '$username'";
        
            $res = mysqli_query($conn, $sql);
            if ($res && mysqli_num_rows($res) > 0){
                header ("Location: profile.php?error=username");
                die();
            }
            else{
                $query = "UPDATE users SET username='$username' WHERE id = '$uid'";
                $result = mysqli_query($conn, $query);
                if($result) {  
                    $_SESSION['username'] = $username;
                } else {
                    header ("Location: profile.php?error=username");
                    die();
                }
            }
            
        }
        if(isset($_POST['new_email']) && !empty($_POST['new_email'])) {     //email
            $email = $_POST["new_email"];
            $query = "UPDATE users SET email='$email' WHERE id = '$uid'";
            $result = mysqli_query($conn, $query);
            if($result) {  
            } else {
                header ("Location: profile.php?error=email");
                die();
            }
        }
        if(isset($_POST['new_anr']) && !empty($_POST['new_anr'])) {         //anrede/gender
            $anr = $_POST["new_anr"];
            $query = "UPDATE users SET salutation='$anr' WHERE id = '$uid'";
            $result = mysqli_query($conn, $query);
            if($result) {  
            } else {
                header ("Location: profile.php?error=salutation");
                die();
            }
        }
        if(isset($_POST['new_fname']) && !empty($_POST['new_fname'])) {    //vorname
            $fname = $_POST["new_fname"];
            $query = "UPDATE users SET name='$fname' WHERE id = '$uid'";
            $result = mysqli_query($conn, $query);
            if($result) {  
            } else {
                header ("Location: profile.php?error=name");
                die();
            }
        }
        if(isset($_POST['new_lname']) && !empty($_POST['new_lname'])) {     //nachname
            $lname = $_POST["new_lname"];
            $query = "UPDATE users SET surname='$lname' WHERE id = '$uid'";
            $result = mysqli_query($conn, $query);
            if($result) {  
            } else {
                header ("Location: profile.php?error=surname");
                die();
            }
        }
        if(isset($_POST['old_pwd']) && isset($_POST['new_pwd'])) {          //password, beides muss eingegeben werden
            if(!empty($_POST['old_pwd']) && !empty($_POST['new_pwd'])){
                //retrieve hashpwd from database 
                $sql1 = "SELECT password FROM users WHERE id = '$uid'";  
            
                $res1 = mysqli_query($conn, $sql1);
                if ($res1 && mysqli_num_rows($res1) > 0){
                    $user_data = mysqli_fetch_assoc($res1); 
                    $hashedpwd = $user_data['password'];                        //eingabe wird in hash umgewandelt     
                    
                    if(hash('sha256', $_POST['old_pwd']) == $hashedpwd){        //eingabe altes passwort muss mit dem aus datenbank übereinstimmen
                        $password = $_POST["new_pwd"];
                        $newhashedpwd = hash('sha256', $password);                                      //new password
                        $query = "UPDATE users SET password='$newhashedpwd' WHERE id = '$uid'";
                        $result = mysqli_query($conn, $query);
                        if($result) {  
                        } else {
                            header ("Location: profile.php?error=password");
                            die();
                        }
                    }
                    else{
                        header ("Location: profile.php?error=password");
                        die();
                    }
                }
                else {
                    header ("Location: profile.php?error=password");
                    die();
                }
            }
            else{
                header ("Location: profile.php?error=edit");
                die();

            }
        }

        header ("Location: profile.php?success");
    }
    

    

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>
        
    </title>
    <?php
            //include 'head.php';
    ?>
</head>
<body>
    <br>
    <hr>
    <br>

    <div class="container">
                <h3>Daten </h3>
                <div class="form">
                    <form action="" method="POST">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $username;?></th>
                                    <td><input type="text" class="form-control" id="new_uname" name="new_uname" placeholder="new username"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $email;?></th>
                                    <td><input type="text" class="form-control" id="new_email" name="new_email" placeholder="new email"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $anr;?></th>
                                    <td><input type="text" class="form-control" id="new_anr" name="new_anr" placeholder="Ms/Mr/Mx"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $fname;?></th>
                                    <td><input type="text" class="form-control" id="new_fname" name="new_fname" placeholder="new name"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?php echo $lname;?></th>
                                    <td><input type="text" class="form-control" id="new_lname" name="new_lname" placeholder="new surname"></td>
                                </tr>
                                <tr>
                                    <th scope="row">●●●●●●●</th>
                                    <td><input type="password" class="form-control" id="old_pwd" name="old_pwd" placeholder="old password"></td>
                                </tr>
                                <tr>
                                    <th scope="row">neues Passwort wiederholen</th>
                                    <td><input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="new password"></td>
                                </tr>
                            </tbody>
                        </table> 
                        <button type="submit" name="submitnew" id="submitnew" class="ticketbtn">Save Changes</button>
                    </form>  
                </div>    
            </div>           
    
    <?php
        //include 'scripts.php';
    ?>                   
        


</body>
</html>