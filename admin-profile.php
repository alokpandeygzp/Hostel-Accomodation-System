<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for update email id
if ($_POST['update']) {
	$email = $_POST['emailid'];
	$aid = $_SESSION['id'];
	$udate = date('Y-m-d');
	$query = "update admin set email=?,updation_date=? where id=?";
	$stmt = $mysqli->prepare($query);
	$rc = $stmt->bind_param('ssi', $email, $udate, $aid);
	$stmt->execute();
	echo "<script>alert('Email id has been successfully updated');</script>";
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
	<link rel="stylesheet" href="css/addCources.css">

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


		<?php
		$aid = $_SESSION['id'];
		$ret = "select * from admin where id=?";
		$stmt = $mysqli->prepare($ret);
		$stmt->bind_param('i', $aid);
		$stmt->execute();
		$res = $stmt->get_result();
		while ($row = $res->fetch_object()) {
		?>
			<div class="page-content" style="margin-top: -185px; margin-bottom:-300px; margin-left: 100px;margin-right: 0px;padding:none; background-color:#00121ff7;">
				<div class="form-v9-content" style=" height: 680px;background-image: url('img/adminprofile.jpg')">
					<form class="form-detail" action="#" method="post">
						<center>
							<h1>Admin Profile Details</h1>
						</center>
						<br><br><br>

						<div class="form-group">
							<label class="control-label">Username </label>
							<div>
								<div>
									<input style="color: white; background-color:transparent; " type="text" value="<?php echo $row->username; ?>" disabled class="form-control"><span style="color: red;" class="help-block m-b-none">
										Username can't be changed.</span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label">Email</label>
							<div style="color: black;">
								<input style="color: white; background-color:transparent; " type="email" class="form-control" name="emailid" id="emailid" value="<?php echo $row->email; ?>" required="required">

							</div>
						</div>
						<br><br><br>
						<div class="form-row-last">
							<input class="register" type="submit" name="Cancel" value="Cancel">
							<input class="register" type="submit" name="update" value="Update Profile">
						</div>
					</form>
				</div>
			</div>

		<?php }  ?>


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
	<script>
		function checkAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'emailid=' + $("#emailid").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
	<script>
		function checkpass() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'oldpassword=' + $("#oldpassword").val(),
				type: "POST",
				success: function(data) {
					$("#password-availability-status").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</body>

</html>