<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>EUVBS</title>
		<link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
		//begin a session
		session_start();
		require('connector.php');
		
		if (isset($_POST['username']) and isset($_POST['password'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$pass = hash('sha256', $password);
			
			$query = "SELECT * FROM `users` WHERE user_name='$username' and password='$pass'";
			
			$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
			$count = mysqli_num_rows($result);
			
			if ($count == 1){
				$_SESSION['username'] = $username;
				header("Location: home.php");
			}
			else{
				$error = "Invalid Password or Username.";
				echo "<script>alert('$error');</script>";
			}
		}
		
		if (isset($_SESSION['username'])){
			$username = $_SESSION['username'];
			echo "<script>alert('$username you are logged in');</script>";
		}
        ?>
		
		<form class="form-signin" method="POST">
			<h2 class="form-signin-heading">LOGIN</h2>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">USERNAME</span>
				<input type="text" name="username" class="form-control" placeholder="Username" required><br><br>
			</div>
			<label for="inputPassword" class="sr-only">PASSWORD</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required><br><br>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button><br><br>
			<a class="btn btn-lg btn-primary btn-block" href="register.php">Click here to register</a>
		</form>
    </body>
</html>