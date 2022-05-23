<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <?php if ($page == 'index') { ?>
            <a class="nav-link active" aria-current="page" href="">Home</a>
          <?php } else { ?>
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          <?php } ?>
        </li>

        <li class="nav-item">
          <?php if ($page == 'index') { ?>
            <a class="nav-link active" aria-current="page" href="php/friends.php">Friends</a>
          <?php } elseif ($page == 'profile') { ?>
            <a class="nav-link active" aria-current="page" href="friends.php">Friends</a>
          <?php } else { ?>
            <a class="nav-link active" aria-current="page" href="friends.php">Friends</a>
          <?php } ?>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <?php if ($page == 'index') { ?>
              <li><a class="dropdown-item" href="php/profile.php?mypage">Own Page</a></li>
            <?php } else { ?>
              <li><a class="dropdown-item" href="profile.php?mypage">Own Page</a></li>
            <?php } ?>
            <?php if ($page == 'index') { ?>
              <li><a class="dropdown-item" href="php/profile.php?edit">Settings</a></li>
            <?php } else { ?>
              <li><a class="dropdown-item" href="profile.php?edit">Settings</a></li>
            <?php } ?>

            <li>
              <hr class="dropdown-divider">
            </li>
            <?php if ($page == 'index') { ?>
              <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
            <?php } else { ?>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            <?php } ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>