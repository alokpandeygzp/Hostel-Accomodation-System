<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if (isset($_POST['submit'])) {
	$coursecode = $_POST['cc'];
	$coursesn = $_POST['cns'];
	$coursefn = $_POST['cnf'];

	$query = "insert into  courses (course_code,course_sn,course_fn) values(?,?,?)";
	$stmt = $mysqli->prepare($query);
	$rc = $stmt->bind_param('sss', $coursecode, $coursesn, $coursefn);
	$stmt->execute();
	echo "<script>alert('Course has been added successfully');</script>";
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
	<title>Add Courses</title>
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

			<div class="page-content" style="margin-top: -168px; margin-bottom:-300px; margin-left: 0px;margin-right: 0px;padding:none; background-color:#424141;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="form-v9-content" style=" height: 680px;background-image: url('img/addbookw.jpg')">
					<form class="form-detail" action="#" method="post">
						<center>
							<h1>Add Courses</h1>
						</center>
						<br><br><br>

						<div class="form-group">
							<label class="control-label">Course Code </label>
							<div>
								<input type="text" style="background-color:transparent;color: white;" value="" name="cc" class="form-control" style="color:#ffffff;">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label">Course Name (Short)</label>
							<div>
								<input type="text" style="background-color:transparent;color: white" class="form-control" name="cns" id="cns" value="" required="required">

							</div>
						</div>
						<div class="form-group">
							<label class="control-label">Course Name(Full)</label>
							<div>
								<input type="text" style="background-color:transparent;color: white" class="form-control" name="cnf" value="">
							</div>
						</div>
						<div class="form-row-last">
							<input class="register" type="submit" name="submit" value="Add course">
						</div>
					</form>
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

	</script>
</body>

</html>