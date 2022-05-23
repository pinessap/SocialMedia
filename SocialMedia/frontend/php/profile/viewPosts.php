<!DOCTYPE html>
<?php
//session_start();
$title = 'View Posts';
require '../../backend/config/db_conn.php';
//include "../navbar.php"; 

$userid = $_SESSION['id'];
?>

<div class="container">
    <?php
    //Selects the information from the database for the table
    $sql = "SELECT post_id, file_path, caption, `datetime` FROM posts WHERE uid=$userid ORDER BY `datetime` DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($post_id, $file_path, $caption, $datetime);
    ?>
    <div class="row-centred">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Post ID</th>
                    <th scope="col">Bild</th>
                    <th scope="col">Caption</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($stmt->fetch()) { //Fetches information, to then echo it into the table
                    echo "<tr>";
                    echo "<td>" . $post_id . "</td>";
                    if (isset($file_path)) {
                        echo "<td><img src='$file_path' alt='picture' class='img-thumbnail'></td>";
                    }
                    echo "<td>" . $caption . "</td>";
                    echo "<td>" . $datetime . "</td>";
                    echo "</tr>";
                }
                $stmt->close(); ?>
            </tbody>
        </table>
    </div>
    <br>
    <!--<a href="../post.php" class="submit-btn">Go Back</a>-->
    <br>
    <h1> </h1>
</div>