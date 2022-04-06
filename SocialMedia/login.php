<?php require 'navbar.php';?> 

<body>
	<section class="container">
	<form action="php/loginfunction.php" method="post">
		<h1>Login</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
			  <hr>

				<label for="uname"><b>Username</b></label>
				<input type="text" name="username" id="username" placeholder="Enter Username">
					
				<label for="pwd"><b>Password</b></label>
				<input type="password" id="password" name="password"placeholder="Enter Password">
				<hr>
			<button type="login-submit">Login</button>
			<label><input type="checkbox" checked="checked" name="remember"> Remember me</label>
			<p>Don't have an account? <a href="register.php">Register Here</a>.</p>
		<a href="Home.php"><button type="button" class="cancelbtn">Cancel</button></a>
		</div>
	</form>
	</section>
</body>

</html>