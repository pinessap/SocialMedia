<?php
if (!isset($_SESSION['id'])) {
    session_start();
}


require '../../backend/config/db_conn.php';


$userid = $_SESSION['id'];


$sql = "SELECT pic_path FROM profilepic WHERE user_id = '$userid'";
$res = mysqli_query($conn, $sql);

if ($res->num_rows > 0) {
    while ($row_p = $res->fetch_assoc()) {
        $p_pic = $row_p["pic_path"];

        //die;
    }
} else {
    //echo "Error in ".$sql."<br>".$conn->error;
    $p_pic = "../img/avatar.png";
    //die;
}
?>
<div>
        <img src="<?php echo $p_pic ?>" alt="Avatar" class="profilePicture"><div class="profile-username"><?php echo htmlspecialchars($row['username']);  ?></div>
</div>