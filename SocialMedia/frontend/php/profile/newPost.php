<!DOCTYPE html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
$title = 'New Post';
//require '../backend/config/db_conn.php';
$page = $_SESSION['page'];
if ($page == 'index') {
    require 'php/log_reg/function.php';
} else if ($page == 'profile') {
    require 'log_reg/function.php';
}


//include "../navbar.php";
?>

<?php
if (isset($_POST['caption'])) { //When a caption is submitted

    $uploadDir = "uploads/user/" . $_SESSION['username'] . "/"; //Uploadordner für jeden User (username)


    if (file_exists($uploadDir)) {
        //echo "The file $uploadDir exists";
    } else {
        //echo "The file $uploadDir does not exist";
        mkdir($uploadDir);                              //falls Verzeichnis noch nicht existiert
    }




    //Variables definition
    $file_path = (!empty($_FILES['picture']['name'])) ? "../" . $uploadDir . strstr($_FILES["picture"]["name"], "." . pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION), true) . "_t.jpg" : NULL;
    $caption = $_POST['caption'];
    $uid = $_SESSION['id'];

    //Adds a post to the database
    $add_post_stmt = $conn->prepare("INSERT INTO posts (file_path, caption, `uid`) VALUES (?, ?, ?)");
    $add_post_stmt->bind_param("ssi", $file_path, $caption, $uid);
    $add_post_stmt->execute();
    $add_post_stmt->close();

    if (!empty($_FILES['picture']['name'])) { //When a picture is also submitted
        $tempName = $_FILES["picture"]["tmp_name"];
        $filename = $_FILES["picture"]["name"];
        //$dirName = "img/" . $_SESSION['username'];
        $dirName = $uploadDir;

        $allowed = array('jpg', 'PNG', 'png', 'jpeg', 'JPEG');
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);
        $filenameWithoutExt = strstr($filename, ".$filetype", true);

        if (!in_array($filetype, $allowed)) {
            $ok = false;
        } else {
            if (!file_exists($dirName)) {
                mkdir($dirName, 0777, true);
            }
            $ok = move_uploaded_file($tempName, "$dirName/$filename");
            //Creates a thumbnail
            makeThumbnails($uploadDir, "$dirName/$filename", $filenameWithoutExt, 1600, 1600);
        }
        $picture_path = "$dirName/$filename";

        //Selects the post ID
        $post_id_stmt = $conn->prepare("SELECT post_id FROM posts WHERE file_path = ? AND caption = ? AND `uid` = ?");
        $post_id_stmt->bind_param("ssi", $file_path, $caption, $uid);
        $post_id_stmt->execute();
        $post_id_stmt->bind_result($selected_post_id);

        //Fetches the post ID
        $post_id = 0;
        while ($post_id_stmt->fetch()) {
            $post_id = $selected_post_id;
        }
        $post_id_stmt->close();

        //Adds picture_path and post_id into the database
        $add_picture_stmt = $conn->prepare("INSERT INTO pictures (picture_path, post_id) VALUES (?, ?)");
        $add_picture_stmt->bind_param("si", $picture_path, $post_id);
        $add_picture_stmt->execute();
        $add_picture_stmt->close();
    }
    echo "<meta http-equiv='refresh' content='0'>";
}
?>

<body>
    <div class="post_form">
        <?php if (!isset($ok)) { ?>
            <form action="?" method="post" enctype="multipart/form-data">
                <div class="row-centred">
                    <div class="form-group col-sm-12">
                        <textarea class="form-control" name="caption" id="caption" rows="5" required placeholder="Caption..."></textarea>
                    </div>
                </div>
                <br>
                <div class="row-centred">
                    <div class="form-group col-sm-12-centred">
                        <input type="button" class="form-control fileupload" value="Upload a Picture" onclick="document.getElementById('picture').click();" />
                        <input style="display:none;" class="form-control" type="file" name="picture" id="picture" placeholder="Upload a Picture">
                    </div>
                </div>
                <!--<a href="../post.php" class="submit-btn">Go Back</a>-->
                <input type="submit" class="submit-btn" name="upload" id="upload" value="submit">
            </form>

            <?php //} else if ($ok) { 
            ?>
            <!--<h1>Post was added succesfully!</h1>  -->
            <!--<a href="../post.php" class="submit-btn">Go Back</a>-->
            <?php //} else { 
            ?>
            <!--<h1>Something went wrong!</h1>
                    <br>-->
            <!--<a href="../post.php" class="submit-btn">Go Back</a>-->
            <!--<br>
                    <h1> </h1>-->
        <?php } ?>
    </div>
</body>

</html>