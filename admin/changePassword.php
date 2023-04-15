<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_POST['changepwd'])) {
	$op = $_POST['oldpassword'];
	$np = $_POST['newpassword'];
	$ai = $_SESSION['id'];


	$sql = "SELECT password FROM admin where password=?";
	$chngpwd = $mysqli->prepare($sql);
	$chngpwd->bind_param('s', $op);
	$chngpwd->execute();
	$chngpwd->store_result();
	$row_cnt = $chngpwd->num_rows;;
	if ($row_cnt > 0) {
		$con = "update admin set password=? where id=?";
		$chngpwd1 = $mysqli->prepare($con);
		$chngpwd1->bind_param('si', $np, $ai);
		$chngpwd1->execute();
		$_SESSION['msg'] = "Password Changed Successfully !!";
	} else {
		$_SESSION['msg'] = "Old Password not match !!";
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
	<title>Admin Profile</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/adminStyleLogin.css">

	<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="js/validation.min.js"></script>
	<script type="text/javascript">
		function valid() {

			if (document.changepwd.newpassword.value != document.changepwd.cpassword.value) {
				alert("Password and Re-Type Password Field do not match  !!");
				document.changepwd.cpassword.focus();
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
		<div class="container" style="margin-top: -40px">
			<div class="screen">
				<div class="screen__content" style="margin-top:30%;">
					<form class="login" action="" method="post" style="padding-top: 0px;">
						<h1 class="text-center text-bold text-dark mt-4x" style="font-family:cursive; font-size:xx-large">Change Password</h1>
						<div class="login__field" style="width:400px;">
							<i class="login__icon fas fa-user"></i>
							<input type="password" value="" placeholder="Old Password" name="oldpassword" id="oldpassword" class="login__input" required="required">

						</div>

						<div class="login__field" style="width:400px;">
							<i class="login__icon fas fa-lock"></i>
							<input type="password" class="login__input" placeholder="New Password" name="newpassword" id="newpassword" value="" required="required">
						</div>

						<div class="login__field" style="width:400px;">
							<i class="login__icon fas fa-lock"></i>
							<input type="password" class="login__input" placeholder="Confirm Password" name="cpassword" id="cpassword" name="cpassword">
						</div>

						<center>
							<div>
								<input type="submit" name="changepwd" class="btn btn-block " value="Change Password" style="width: 240px; background-color: #b0a5e8; font-family:cursive; font-size:medium">
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