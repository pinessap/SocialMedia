<?php
    session_start();

    require '../../backend/config/db_conn.php';


    $uploadDir = "../uploads/user/".$_SESSION['username']."/"; //Uploadordner für jeden User (username)
    

    if (file_exists($uploadDir)) {
        
        //echo "The file $uploadDir exists";
   } else {
        //echo "The file $uploadDir does not exist";
        mkdir($uploadDir);                              //falls Verzeichnis noch nicht existiert
   }

   
    if (isset($_POST['submitnew']) ) {
        $userid = $_SESSION['id'];                

        $fileName = $_FILES['profilepic']['name'];       //name der file
        $fileTmp = $_FILES['profilepic']['tmp_name'];     //temporary location
        $fileError = $_FILES['profilepic']['error'];      //evtl. errors

        $fileExt = explode('.', $fileName);             //dateiname wird in name und endung aufgeteilt 
        $fileActualExt = strtolower(end ($fileExt));    //dateiendung in klein gespeichert
        $allowed = array('jpg','jpeg','png');           //array an erlaubten dateiendungen

        if(in_array($fileActualExt, $allowed)) {    	                    //dateiendung erlaubt?
            if($fileError === 0) {                                      
                $fileNameNew = $fileName.".".$fileActualExt;             //einzigartiger dateiname
                $fileDestination = $uploadDir.$fileName;                 //ordner+dateiname
                

                move_uploaded_file($fileTmp, $fileDestination);             //bild wird von tmp zur destination verschoben
            } else {
                //echo"Fehler beim Hochladen der Datei!";
                header ("Location: profile.php?error=pic");
                die;
            }
        } else {
            //echo"Falscher Dateityp!";
            header ("Location: profile.php?error=pic");
            die;
        }

        $query = "SELECT * FROM profilepic WHERE user_id = '$userid'";
        $res = mysqli_query($conn, $query);

        if ($res && mysqli_num_rows($res) > 0){
            $sql = "UPDATE profilepic SET pic_path='$fileDestination' WHERE user_id='$userid'";
            $result = mysqli_query($conn, $sql);
        }
        else{
            $sql = "INSERT INTO profilepic (pic_path, user_id) VALUES ('$fileDestination','$userid')";
            $result = mysqli_query($conn, $sql);
   
        }
        //in datenbank speichern

        if($result) {
         
            header ("Location: profile.php?success=pic");
            die;
        }
        else {
            
            header ("Location: profile.php?error=pic");
            die;
            //echo $result;
        }

                                             
    }
    
    

?>

<!DOCTYPE html>
<html lang="de">
<head>
</head>
<body>
    <br>
    <hr>
    <br>
    <div class="container">
        <div class="form">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <hr>
                        <div class="form-group">
                            <label for="profilepic">Select Image File</label>
                            <input type="file" class="form-control" id="profilepic"  name="profilepic" required>
                        </div>
                        <hr>
                        <br>
                        <button type="submit" name="submitnew" id="submitnew" class="ticketbtn">Upload Picture</button>
                        </form>
                    </div>
    </div>
    <br><br><br>
    <hr>

                
        


</body>
</html>