<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add mess
if (isset($_POST['submit'])) {
	$messName = $_POST['mn'];
	$messType = $_POST['mt'];
	$price = $_POST['ppm'];

	$query = "insert into mess (messName,messType,price) values(?,?,?)";
	$stmt = $mysqli->prepare($query);
	$rc = $stmt->bind_param('ssi', $messName, $messType, $price);
	$stmt->execute();
	echo "<script>alert('Mess has been added successfully');</script>";
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
	<title>Add Mess</title>
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
</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid" style="padding: 0px;">

				<div class=" row">

					<div class="page-content" style="margin-top: -185px; margin-bottom:-300px; margin-left: 0px;margin-right: 0px;padding:none; background-color:#424141;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
						<div class="form-v9-content" style=" height: 680px; background-image: url('img/addmess.jpg')">
							<form class="form-detail" action="#" method="post">
								<center>
									<h1>Add Mess</h1>
								</center>
								<br><br><br>
								<div class="form-group">
									<label class="control-label">Mess Name </label>
									<div>
										<input type="text" value="" name="mn" style="background-color:transparent;color: white" class="form-control">
									</div>


								</div>

								<div class="form-group">
									<label class="control-label">Mess Type</label>
									<div>
										<Select name="mt" class="form-control" style="border-radius: 25px; background-color:transparent; color:white" id="mt" value="" required="required">
											<option value="" style="background-color:#313a57">Select Mess Type</option>
											<option value="Veg" style="background-color:#313a57">Veg</option>
											<option value="Non Veg" style="background-color:#313a57">Non Veg</option>
										</Select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">Price Per Month</label>
									<div>
										<input type="text" class="form-control" style="background-color:transparent;color: white" name="ppm" value="">
									</div>
								</div>



								<div class="form-row-last">
									<input class="register" type="submit" name="submit" value="Add Mess">
								</div>
							</form>
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

		</script>
</body>

</html>