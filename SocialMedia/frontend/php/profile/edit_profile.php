<!DOCTYPE html>
<?php
session_start();

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




<div class="card">
    <h4>My Profile</h4>
</div>
<div class="card">
    <?php include 'showprofilepic.php'; ?>
    <hr>
    <a href="profile.php?changepicture"><button class="editbtn" name='change-submit' type="button">edit Profile Picture</button></a>
    <hr>
    <section class="container">
        <div class="profileData">
            <p>Name: <?php echo htmlspecialchars($row['name']);  ?></p>
        </div>
        <div class="profileData">
            <p>Surname: <?php echo htmlspecialchars($row['surname']);  ?></p>
        </div>
        <div class="profileData">
            <p>Username: <?php echo htmlspecialchars($row['username']);  ?></p>
        </div>
        <div class="profileData" s>
            <p>Email: <?php echo htmlspecialchars($row['email']);  ?></p>
        </div>
    </section>
    <hr>
    <form action=" " method="post">
        <a href="profile.php?changeData"><button class="editbtn" name='change-submit' type="button">change Data</button></a>
    </form>

</div>

<?php
//}
?>