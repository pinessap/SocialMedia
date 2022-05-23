<!DOCTYPE html>
<?php
session_start();
include 'showprofilepic.php';

if (isset($_SESSION['id'])) {
    require '../../backend/config/db_conn.php';

    $username = $_SESSION['username'];
    $query = $conn->query("SELECT * FROM users WHERE username = '$username'");

    $row = $query->fetch_array();
}
/* $userid = $_SESSION['id'];

        $sql = "SELECT pic_path FROM profilepic WHERE user_id = '$userid'";
        $res = mysqli_query($conn, $sql);

        

        if ($res->num_rows > 0) {
                while($row_p = $res->fetch_assoc()) {
                $p_pic = $row_p["pic_path"];

                //die;
            }
        }
        else {
            //echo "Error in ".$sql."<br>".$conn->error;
            $p_pic = "../img/avatar.png";
            //die;
        }
    */

?>



<section class="container">
    <h4>My Profile</h4>
    <hr>
    <div>
        <p>Saluation: <?php echo htmlspecialchars($row['salutation']);  ?></p>
    </div>
    <div>
        <p>Name: <?php echo htmlspecialchars($row['name']);  ?></p>
    </div>
    <div>
        <p>Surname: <?php echo htmlspecialchars($row['surname']);  ?></p>
    </div>
    <div>
        <p>Username: <?php echo htmlspecialchars($row['username']);  ?></p>
    </div>
    <div>
        <p>Email: <?php echo htmlspecialchars($row['email']);  ?></p>
    </div>
    <hr>
    </div>

    <form action=" " method="post">
        <a href="profile.php?changeData"><button class="ticketbtn" name='change-submit' type="button">Change</button></a>
        <a href="profile.php?changepicture"><button class="ticketbtn" name='change-submit' type="button">Upload Profile Picture</button></a>
    </form>
</section>


<?php
//}
?>