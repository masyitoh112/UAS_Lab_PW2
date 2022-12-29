<?php
session_start();
include './koneksi.php'
	?>
<!DOCTYPE html>
<html>

	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a81368914c.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>

	<body>
		<img class="wave" src="img/wave.png">
		<div class="container">
			<div class="img">
				<img src="img/bg.svg">
			</div>
			<div class="login-content">
				<form action="" method="POST">
					<img src="img/avatar.svg">
					<h2 class="title">Welcome</h2>
					<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
						<div class="div">
							<h5>Username</h5>
							<input type="text" class="input" name="username">
						</div>
					</div>
					<div class="input-div pass">
						<div class="i">
							<i class="fas fa-lock"></i>
						</div>
						<div class="div">
							<h5>Password</h5>
							<input type="password" class="input" name="password">
						</div>
					</div>
					<a href="#">Forgot Password</a>
					<a href="singup.php">Sign up</a>
					<input type="submit" name="submit" class="btn" value="Login"> <?php
                    if (isset($_POST['submit'])) {
	                    $user = mysqli_real_escape_string($con, $_POST['username']);
	                    $pass = mysqli_real_escape_string($con, $_POST['password']);
	                    $check = mysqli_query($con, "SELECT * FROM pengguna WHERE username = '" . $user . "'");
	                    if (mysqli_num_rows($check) > 0) {
		                    $d = mysqli_fetch_object($check);
		                    if (md5($pass) == $d->password) {
			                    $_SESSION['status_login'] = true;
			                    $_SESSION['uid'] = $d->id;
			                    $_SESSION['uname'] = $d->nama;
			                    $_SESSION['ulevel'] = $d->level;
			                    echo "<script> window.location = 'admin/index.php' </script>";
		                    } else {
			                    echo '<div class = "alert-error">Password salah</div>';
		                    }
	                    } else {
		                    echo '<div class="alert-error">data tidak ditemukan</div> ';
	                    }
                    }

                    ?>
				</form>
			</div>
		</div>
		<script type="text/javascript" src="js/main.php"></script>
	</body>

</html>