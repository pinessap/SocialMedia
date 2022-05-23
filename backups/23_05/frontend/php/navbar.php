<?php 
   //session_start();
 
?>
<!--<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
      <title>Header</title>
 </head>
 
<body>-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Social Media</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <?php if($page == 'index'){ ?>
              <a class="nav-link active" aria-current="page" href="">Home</a>
            <?php } else{ ?>
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            <?php } ?>
          </li>
        </ul>
        <!-- For logged in user -->
	      <?php if (isset($_SESSION['username']) && isset($_SESSION['id'])) {?>
          <!--<div class="collapse navbar-collapse" id="navbarSupportedContent" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="post.php">Posts</a>
              </li>
            </ul>
          </div>-->
          <div class="collapse navbar-collapse" id="navbarSupportedContent" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <?php if ($page == 'index'){ ?>
                  <a class="nav-link active" aria-current="page" href="php/friends.php">Friends</a>
                <?php } else { ?>
                   <a class="nav-link active" aria-current="page" href="">Friends</a>
                  <?php } ?>
                
              </li>
            </ul>
          </div>

            <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Profile
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <?php if ($page == 'index'){ ?>
                <li><a class="dropdown-item" href="php/profile.php?mypage">Own Page</a></li>
                <?php } else { ?>
                  <li><a class="dropdown-item" href="profile.php?mypage">Own Page</a></li>
                  <?php } ?>
              <?php if ($page == 'index'){ ?>
                <li><a class="dropdown-item" href="php/profile.php?edit">Settings</a></li>
                <?php } else { ?>
                  <li><a class="dropdown-item" href="profile.php?edit">Settings</a></li>
                  <?php } ?>
                
                
                <li><hr class="dropdown-divider"></li>
                <?php if ($page == 'index'){ ?>
                  <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
                <?php } else { ?>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                  <?php } ?>
              </ul>
            </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" name="logout-submit" href="#">         </a>
              </li>
              </ul>
            <?php } ?>      
      </div>
    </div>
  </nav>
<!--</body>
</html>-->
