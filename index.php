<?php
include 'config.php';
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
if (isset($_SESSION['username'])) {
    header('location:welcome.php');
}
if (isset($_POST['submit'])) {
    $user = ($_POST['username']);
    $pass = ($_POST['password']);
    $encryptedpswd = md5($_POST['password']);
    // print_r($_POST); exit;
    $sql = "SELECT * FROM users WHERE username = '$user' and password = '$encryptedpswd' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    //   print_r($sql);
    //   exit;
    if ($count == 1) {
        echo "<h1><center> Login successful </center></h1>";
        $_SESSION['username'] = $row['username'];
        header("Location:welcome.php");
    } else {
        echo "Username or Password is Wrong";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="container">
		<div class="sign-up-container">
			<div class="login-signup">
				<a href="register.php" id = "signup"><button>Sign up</button></a>
			</div>
			<div class="signup-align col-md-12">
				<form name="login" action="welcome.php" method="post" autocomplete="on">
					<div class="signup-heading">LOGIN</div>
				    <div class="row">
						<div class="inline-block">
							<div class="form-label">
								Username<span class="required error" id="username-info"></span>
							</div>
							<input class="" type="text" name="username" value = ""
								id="user_name">
						</div>
					</div>
					<div class="row">
						<div class="inline-block">
							<div class="form-label">
								Password<span class="required error" id="login-password-info"></span>
							</div>
							<input class="" type="password"
								name="password" value = "" id="pass_word">
						</div>
					</div>
					<div class="row">
						<input class="btn btn-dark" type="submit" name="submit"
							id="login-btn" value="Submit">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- <script>
		
	</script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>