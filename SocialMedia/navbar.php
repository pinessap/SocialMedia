<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="CSS\style.css"/>
      <script src="../js/bootstrap.bundle.js"></script>
      <script src="../js/popper.min.js"></script>
      <title>Header</title>
 </head>
 
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="Home.php">Social Media</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
        </ul>
        <!-- For Admin -->
	      <?php if ($_SESSION['role'] == 'admin') {?>
          
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href=".-.php">Chat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href=".-.php">Change Data</a>
          </li>
          </ul>
      </div>
            <ul class="nav navbar-nav navbar-right">
              <span style="margin-top: 8.5px;"><?=$_SESSION['username']?></span>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="register.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" name="logout-submit" href="php\logout.php">Logout</a>
              </li>
            </ul>
        <!-- FORE USERS -->
        <?php } else { ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="post.php">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href=".-.php">blob</a>
            </li>
          </ul>
        </div>

          <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" name="profile-submit" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" name="logout-submit" href="php\logout.php">Logout</a>
              </li>
            </ul>
            <?php } ?>      
      </div>
    </div>
  </nav>
</body>
</html>
<?php 
} else {?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="CSS\style.css"/>
      <title>Header</title>
 </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="Home.php">Social Media</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="FAQs.php">FAQs</a>
          </li>
        </ul>   
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" name="logoin-submit" href="login.php">Login</a>
              </li>
            </ul>
            </div>
    </div>
  </nav>
</body>
</html>
  <?php }?>
