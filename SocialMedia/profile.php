<?php
    require 'navbar.php';

    if (isset($_SESSION['id'])) {
        require 'db_conn.php';

        $username = $_SESSION['username'];
        $query = $conn->query("SELECT * FROM users WHERE username = '$username'");
        
        $row = $query->fetch_array();
?> 



<body>
	<section class="container">

		<div class="imgcontainer">
		<img src="img\avatar.png" alt="Avatar" class="avatar">
		</div>
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
	    </form>
	</section>

    <?php
 

        if(isset($_GET['changeData'])){
            include 'php/changeData.php';
        }
        if(isset($_GET['success'])){?>
            <br>
            <div class="container">                                                                 <!--erfolgreich--> 
                <div class="alert alert-secondary" role="alert">
                    <h4 style="color:rgb(72,72,72);">Changing Data was successful!</h4>
                </div>
            </div><br><?php
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
        }
        
        
    ?>
</body>

<?php }
    require 'footer.php';?>
</html>