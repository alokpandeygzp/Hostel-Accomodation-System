<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for add courses
if (isset($_POST['submit'])) {
	$seater = $_POST['seater'];
	$hostelName = $_POST['hostelName'];
	$roomno = $_POST['rmno'];
	$fees = $_POST['fee'];
	$sql = "SELECT room_no,hostelName FROM rooms where room_no=? and hostelName=?";
	$stmt1 = $mysqli->prepare($sql);
	$stmt1->bind_param('is', $roomno, $hostelName);
	$stmt1->execute();
	$stmt1->store_result();
	$row_cnt = $stmt1->num_rows;

	if ($row_cnt > 0) {
		echo "<script>alert('Room already exists');</script>";
	} else {
		$query = "insert into  rooms (hostelName,seater,room_no,fees) values(?,?,?,?)";
		$stmt = $mysqli->prepare($query);
		$rc = $stmt->bind_param('siii', $hostelName, $seater, $roomno, $fees);
		$stmt->execute();
		echo "<script>alert('Room has been added successfully');</script>";
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
	<title>Create Room</title>
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


				<?php if (isset($_POST['submit'])) { ?>
					<p style="color: red"><?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
				<?php } ?>



				<div class="page-content" style="margin-top: -168px; margin-bottom:-300px; margin-left: 0px;margin-right: 0px;padding:none; background-color:#424141;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
					<div class="form-v9-content" style="background-image: url('img/addroom.jpg');">
						<form style="z-index: 10;" class="form-detail" action="#" method="post">
							<center>
								<h1>Add Room</h1>
							</center>
							<br><br><br>

							<div class="form-group">
								<div>
									<Select name="hostelName" class="form-control" style="border-radius: 25px; background-color:transparent; color:white" required>
										<option value="" style="background-color:#313a57">Select Hostel</option>
										<option value="A" style="background-color:#313a57">A</option>
										<option value="B" style="background-color:#313a57">B</option>
										<option value="C" style="background-color:#313a57">C</option>
										<option value="D" style="background-color:#313a57">D</option>
										<option value="E" style="background-color:#313a57">E</option>
										<option value="F" style="background-color:#313a57">F</option>
										<option value="G" style="background-color:#313a57">G</option>
										<option value="LH" style="background-color:#313a57">LH</option>
										<option value="MBH1" style="background-color:#313a57">MBH1</option>
										<option value="MBH2" style="background-color:#313a57">MBH2</option>
										<option value="PG I" style="background-color:#313a57">PG I</option>
										<option value="PG II" style="background-color:#313a57">PG II</option>
										<option value="IH" style="background-color:#313a57">International</option>
									</Select>

								</div>

							</div>

							<div class="form-group">
								<label class="control-label"> </label>
								<div>
									<Select name="seater" class="form-control" id="fee" style="border-radius: 25px;  background-color:transparent; color:white" required>
										<option value="" style="background-color:#313a57">Select Seater</option>
										<option value="1" style="background-color:#313a57">Single Seater</option>
										<option value="2" style="background-color:#313a57">Two Seater</option>
										<option value="3" style="background-color:#313a57">Three Seater</option>
										<option value="4" style="background-color:#313a57">Four Seater</option>
										<option value="5" style="background-color:#313a57">Five Seater</option>
									</Select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Room No.</label>
								<div>
									<input type="text" class="form-control" style="  background-color:transparent; color:white" name="rmno" id="rmno" value="" required="required">
								</div>
							</div>


							<div class="form-group">
								<label class="control-label">Price</label>
								<div>
									<input type="text" style="  background-color:transparent; color:white" class="form-control" name="fee" id="fee" value="" required="required">

								</div>
							</div>


							<div class="form-row-last">
								<input class="register" type="submit" name="submit" value="Create Room ">
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