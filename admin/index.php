<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$stmt = $mysqli->prepare("SELECT username,email,password,id FROM admin WHERE (userName=?|| email=?) and password=? ");
	$stmt->bind_param('sss', $username, $username, $password);
	$stmt->execute();
	$stmt->bind_result($username, $username, $password, $id);
	$rs = $stmt->fetch();
	$_SESSION['id'] = $id;
	// $uip = $_SERVER['REMOTE_ADDR'];
	// $ldate = date('d/m/Y h:i:s', time());
	if ($rs) {
		header("location:dashboard.php");
	} else {
		echo "<script>alert('Invalid Username/Email or password');</script>";
	}
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin login</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/adminStyleLogin.css">
</head <body>
<?php include('includes/header.php'); ?>
<div class="ts-main-content">
	<?php include('includes/sidebar.php'); ?>
	<div class="container">
		<div class="screen">
			<div class="screen__content" style="margin-top:50%;">
				<form class="login" action="" method="post" style="padding-top: 0px;">
					<h1 class="text-center text-bold text-dark mt-4x" style="font-family:cursive; font-size:xx-large">Admin Login</h1>
					<div class="login__field" style="width:400px;">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" name="username" placeholder="Username / Email">
					</div>
					<div class="login__field" style="width:400px;">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Password" name="password">
					</div>

					<center>
						<div>
							<input type="submit" name="login" class="btn btn-block " value="Login" style="width: 240px; background-color: #b0a5e8; font-family:cursive; font-size:medium">
						</div>
					</center>


				</form>
			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>

</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>
</body>

</html>