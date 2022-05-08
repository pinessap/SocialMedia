<?php
    require 'navbar.php';

    if (isset($_SESSION['id'])) {
        require 'db_conn.php';

        $username = $_SESSION['username'];
        $query = $conn->query("SELECT * FROM users WHERE username = '$username'");
        
        $row = $query->fetch_array();
?> 

<body>
    <br>
        

    <?php
    if(isset($_GET['mypage'])){
        include 'php/newpost.php';
        include 'php/viewposts.php';
    }
    

    if(isset($_GET['edit'])){
        include 'edit_profile.php';
    }

    if(isset($_GET['changepicture'])){
           include 'php/profilepicture.php';
    }
    
 

    if(isset($_GET['changeData'])){
        include 'php/changeData.php';
    }

    if(isset($_GET['success'])){
        if($_GET["success"] == "pic"){?>
            <br>
            <div class="container">                                                         
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Profile Picture was successful!</h4>
                </div>
            </div><br><?php
        }
        else{?>
            <br>
            <div class="container">                                                                 <!--erfolgreich--> 
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Data was successful!</h4>
                </div>
            </div><br><?php 
        }
    }
    if(isset($_GET["error"])) {
        if($_GET["error"] == "username"){?>
            <br>
            <div class="container">                                                         
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Username was unsuccessful!</h4>
                </div>
            </div><br><?php
        }
        if($_GET["error"] == "email"){?>
            <br>
            <div class="container">                                                            
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Email was unsuccessful!</h4>
                </div>
            </div><br><?php
        }
        if($_GET["error"] == "salutation"){?>
            <br>
            <div class="container">                                                           
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Salutation was unsuccessful!</h4>
                </div>
            </div><br><?php
        }
        if($_GET["error"] == "name"){?>
            <br>
            <div class="container">                                                        
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Name was unsuccessful!</h4>
                </div>
            </div><br><?php
        }
        if($_GET["error"] == "surname"){?>
            <br>
            <div class="container">                                                           
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Surname was unsuccessful!</h4>
                </div>
            </div><br><?php
        }
        if($_GET["error"] == "password"){?>
            <br>
            <div class="container">                                                              
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Password was unsuccessful!</h4>
                </div>
            </div><br><?php
        }
        if($_GET["error"] == "edit"){?>
            <br>
            <div class="container">                                                               
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Data was unsuccessful!</h4>
                </div>
            </div><br><?php
        }
        if($_GET["error"] == "pic"){?>
            <br>
            <div class="container">                                                              
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Profile Picture was unsuccessful!</h4>
                </div>
            </div><br><?php
        }
    }
    ?>

</body>

    <?php }
        require 'footer.php';
    ?>
</html>