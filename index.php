<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$emailreg = $_POST['emailreg'];
	$password = $_POST['password'];
	$stmt = $mysqli->prepare("SELECT email,password,id FROM userregistration WHERE (email=? || regNo=?) and password=? ");
	$stmt->bind_param('sss', $emailreg, $emailreg, $password);
	$stmt->execute();
	$stmt->bind_result($email, $password, $id);
	$rs = $stmt->fetch();
	$stmt->close();


	$_SESSION['id'] = $id;
	$_SESSION['login'] = $emailreg;
	// $uip = $_SERVER['REMOTE_ADDR'];
	// $ldate = date('d/m/Y h:i:s', time());
	

	if ($rs) {
		// $uid = $_SESSION['id'];
		// $uemail = $_SESSION['login'];
		// $ip = $_SERVER['REMOTE_ADDR'];
		// $geopluginURL = 'http://www.geoplugin.net/php.gp?ip=' . $ip;
		// $addrDetailsArr = unserialize(file_get_contents($geopluginURL));
		// $city = $addrDetailsArr['geoplugin_city'];
		// $country = $addrDetailsArr['geoplugin_countryName'];
		// $log = "insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
		// $mysqli->query($log);
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
	<meta name="theme-color" content="#3e454c">
	<title>Student Hostel Registration</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleLogin.css">

	<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="js/validation.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript">
		function valid() {
			if (document.registration.password.value != document.registration.cpassword.value) {
				alert("Password and Re-Type Password Field do not match  !!");
				document.registration.cpassword.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php'); ?>

		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">


						<div class="row">
							<div>
								<div>
									<div>

										<div class="container">
											<div class="screen">
												<div class="screen__content">
													<form action="" class="login" method="post">

														<center>
															<h2><b style="font-family:cursive">User Login</b> </h2>
														</center>
														<div class="login__field" style=" width: 400px;">

															<i class="login__icon fas fa-user"></i>
															<input type="text" placeholder="Email / Registration Number" name="emailreg" class="login__input" required="true">
														</div>
														<div class="login__field" style=" width: 400px;">
															<i class="login__icon fas fa-lock"></i>
															<input type="password" placeholder="Password" name="password" class="login__input" required="true">
														</div>
														<center>
															<div>
																<input type="submit" name="login" class="btn btn-block" value="Login" style="width: 240px; background-color: #b0a5e8; font-family:cursive; font-size:medium">
															</div>
														</center>

														<br><br>
														<div class="text-center text-light" style="color:black;">
															<a href="forgot-password.php" style="color:white;">Forgot password?</a>
														</div>
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
								</div>

							</div>
						</div>


					</div>
				</div>
			</div>
		</div>
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