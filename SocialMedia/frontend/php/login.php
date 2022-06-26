<?php
//require 'navbar.php';
?>
<!--<body>-->
<link rel="stylesheet" href="../css/style.css" />
<div class="container">
	<form action="php/log_reg/loginfunction.php" method="post">
		<!-- <h1>Login</h1> -->
		<?php if (isset($_GET['error'])) { ?>
			<div class="alert" role="alert">
				<?= $_GET['error'] ?>
			</div>
		<?php } ?>
		<hr>

		<label for="uname"><b>Username</b></label>
		<input type="text" class="login_input" name="username" id="username" placeholder="Enter Username">
		<br>
		<label for="pwd"><b>Password</b></label>
		<input type="password" class="login_input" id="password" name="password" placeholder="Enter Password">
		<hr>
		<button class="standardbtn" type="login-submit">Login</button>
		<!--<label><input type="checkbox" checked="checked" name="remember"> Remember me</label>-->
		<p>Don't have an account? <a class="reglog" href="php/register.php">Register Here</a>.</p>
		<!-- <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a> -->
</div>
</form>
<!--</body>

</html>-->