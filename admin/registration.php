<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();
//code for registration
if (isset($_POST['submit'])) {
	$roomno = $_POST['room'];
	$hostelName = $_POST['hostelName'];
	$seater = $_POST['seater'];
	$feespm = $_POST['fpm'];
	$messName = $_POST['messName'];
	$stayfrom = $_POST['stayf'];
	$duration = $_POST['duration'];
	$course = $_POST['course'];
	$regno = $_POST['regno'];
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$contactno = $_POST['contact'];
	$emailid = $_POST['email'];
	$emcntno = $_POST['econtact'];
	$gurname = $_POST['gname'];
	$gurrelation = $_POST['grelation'];
	$gurcntno = $_POST['gcontact'];
	$caddress = $_POST['address'];
	$ccity = $_POST['city'];
	$cstate = $_POST['state'];
	$cpincode = $_POST['pincode'];
	$paddress = $_POST['paddress'];
	$pcity = $_POST['pcity'];
	$pstate = $_POST['pstate'];
	$ppincode = $_POST['ppincode'];
	$query = "insert into  registration(hostelName,roomno,seater,feespm,stayfrom,duration,course,regno,firstName,middleName,lastName,gender,contactno,emailid,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,corresCIty,corresState,corresPincode,pmntAddress,pmntCity,pmnatetState,pmntPincode,messName) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	$stmt = $mysqli->prepare($query);
	$rc = $stmt->bind_param('siiisissssssisississsisssis', $hostelName, $roomno, $seater, $feespm, $stayfrom, $duration, $course, $regno, $fname, $mname, $lname, $gender, $contactno, $emailid, $emcntno, $gurname, $gurrelation, $gurcntno, $caddress, $ccity, $cstate, $cpincode, $paddress, $pcity, $pstate, $ppincode, $messName);
	$stmt->execute();
	echo "<script>alert('Student Succssfully register');</script>";
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
	<link rel="stylesheet" href="css/bookHostelDesign.css">
	
	<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
	<script type="text/javascript" src="js/validation.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script>
		function getSeater(val) {

			$.ajax({
				type: "POST",
				url: "get_seater.php",
				data: 'roomid=' + val,
				success: function(data) {
					//alert(data);
					$('#seater').val(data);
				}
			});

			$.ajax({
				type: "POST",
				url: "get_seater.php",
				data: 'rid=' + val,
				success: function(data) {
					//alert(data);
					$('#fpm').val(data);
				}
			});
		}

		function getPrice(val) {
			$.ajax({
				type: "POST",
				url: "getPrice.php",
				data: 'messName=' + val,

				success: function(data) {
					// alert(data);
					$('#price').val(data);
				}
			});
		}


		function getRooms(val) {
			$.ajax({
				type: "POST",
				url: "getRooms.php",
				data: 'hostelName=' + val,

				success: function(data) {
					var kk = data.split(' ');
					$('#room').html(kk);
				}
			});
		}
	</script>

</head>

<body>
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/sidebar.php'); ?>
		<div class="content-wrapper" style="height: 680px;">

			<form method="post" action="" class="form-horizontal" style=" margin-top:1.3%;">
				<?php
				$uid = $_SESSION['login'];
				$stmt = $mysqli->prepare("SELECT emailid FROM registration WHERE emailid=? || regno=? ");
				$stmt->bind_param('ss', $uid, $uid);
				$stmt->execute();
				$stmt->bind_result($email);
				$rs = $stmt->fetch();
				$stmt->close();
				if ($rs) { ?>
					<h3 style="color: red" align="center">Hostel already booked by you</h3>
					<div align="center">
						<div class="col-md-4">&nbsp;</div>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-body bk-success text-light">
									<div class="stat-panel text-center">

										<div class="stat-panel-number h1 ">My Room</div>

									</div>
								</div>
								<a href="room-details.php" class="block-anchor panel-footer text-center">See All &nbsp; <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				<?php } else { ?>
					<button class="tablink" onclick="openPage('RoomInfo', this, '#41839f')" id="defaultOpen">Room Info</button>
					<button class="tablink" onclick="openPage('PersonalInfo', this, '#41839f')">Personal Info</button>
					<button class="tablink" onclick="openPage('AddressInfo', this, '#41839f')">Guardian Info</button>
					<button class="tablink" onclick="openPage('PermanentAddress', this, '#41839f')">Permanent Address</button>


					<div id="RoomInfo" class="tabcontent" style="height: 690px;">
						<div class="form-group">
							<label class="col-sm-2 control-label">Select Hostel </label>
							<div class="col-sm-8">
								<Select name="hostelName" class="form-control" onChange="getRooms(this.value);" required>
									<option value="">Select Hostel</option>
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
									<option value="E">E</option>
									<option value="F">F</option>
									<option value="G">G</option>
									<option value="LH">LH</option>
									<option value="MBH1">MBH1</option>
									<option value="MBH2">MBH2</option>
									<option value="PG I">PG I</option>
									<option value="PG II">PG II</option>
									<option value="IH">International</option>
								</Select>
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Room no. </label>
							<div class="col-sm-8">
								<select name="room" id="room" class="form-control" onChange="getSeater(this.value);" onBlur="checkAvailability()" required>

									<option value="<?php echo ':room'; ?>"> <?php echo ':room'; ?></option>
									<option value="" selected>Select Room</option>
								</select>
								<span id="room-availability-status" style="font-size:12px;"></span>

							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Seater</label>
							<div class="col-sm-8">
								<input type="text" name="seater" id="seater" class="form-control" readonly="true">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Fees Per Month</label>
							<div class="col-sm-8">
								<input type="text" name="fpm" id="fpm" class="form-control" readonly="true">
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Mess Name </label>
							<div class="col-sm-8">
								<select name="messName" id="messName" class="form-control" onChange="getPrice(this.value);" required>
									<option value="">Select Mess</option>

									<?php $query = "SELECT * FROM mess";
									$stmt2 = $mysqli->prepare($query);
									$stmt2->execute();
									$res = $stmt2->get_result();
									while ($row = $res->fetch_object()) {
									?>
										<option value="<?php echo $row->messName; ?>"> <?php echo $row->messName; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>



						<div class="form-group">
							<label class="col-sm-2 control-label">Price Per Month</label>
							<div class="col-sm-8">
								<input type="text" name="price" id="price" class="form-control" readonly="true">
							</div>
						</div>



						<div class="form-group">
							<label class="col-sm-2 control-label">Stay From</label>
							<div class="col-sm-8">
								<input type="date" name="stayf" id="stayf" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Duration</label>
							<div class="col-sm-8">
								<select name="duration" id="duration" class="form-control">
									<option value="">Select Duration in Month</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
						</div>


					</div>
					<div id="PersonalInfo" class="tabcontent" style="height:690px;">


						<div class="form-group">
							<label class="col-sm-2 control-label">Course </label>
							<div class="col-sm-8">
								<select name="course" id="course" class="form-control" required>
									<option value="">Select Course</option>
									<?php $query = "SELECT * FROM courses";
									$stmt2 = $mysqli->prepare($query);
									$stmt2->execute();
									$res = $stmt2->get_result();
									while ($row = $res->fetch_object()) {
									?>
										<option value="<?php echo $row->course_fn; ?>"><?php echo $row->course_fn; ?>&nbsp;&nbsp;(<?php echo $row->course_sn; ?>)</option>
									<?php } ?>
								</select>
							</div>
						</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Registration No : </label>
								<div class="col-sm-8">
									<input type="text" name="regno" id="regno" class="form-control" value="<?php echo $row->regNo; ?>">
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-2 control-label">First Name : </label>
								<div class="col-sm-8">
									<input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row->firstName;?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Middle Name : </label>
								<div class="col-sm-8">
									<input type="text" name="mname" id="mname" class="form-control" value="<?php echo $row->middleName;?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Last Name : </label>
								<div class="col-sm-8">
									<input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row->lastName; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Gender : </label>
								<div class="col-sm-8">
									<input type="text" name="gender" value="<?php echo $row->gender; ?>" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Contact No : </label>
								<div class="col-sm-8">
									<input type="text" name="contact" id="contact" value="<?php echo $row->contactNo;?>" class="form-control">
								</div>
							</div>


							<div class="form-group">
								<label class="col-sm-2 control-label">Email id : </label>
								<div class="col-sm-8">
									<input type="email" name="email" id="email" class="form-control" value="<?php echo $row->email;?>">
								</div>
							</div>
					</div>
					<div id="AddressInfo" class="tabcontent" style="height: 690px;">

					<div class="form-group">
							<label class="col-sm-2 control-label">Emergency Contact: </label>
							<div class="col-sm-8">
								<input type="text" name="econtact" id="econtact" class="form-control" required="required">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Guardian Name : </label>
							<div class="col-sm-8">
								<input type="text" name="gname" id="gname" class="form-control" required="required">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Guardian Relation : </label>
							<div class="col-sm-8">
								<input type="text" name="grelation" id="grelation" class="form-control" required="required">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Guardian Contact no : </label>
							<div class="col-sm-8">
								<input type="text" name="gcontact" id="gcontact" class="form-control" required="required">
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Address : </label>
							<div class="col-sm-8">
								<textarea rows="5" name="address" id="address" class="form-control" required="required"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">City : </label>
							<div class="col-sm-8">
								<input type="text" name="city" id="city" class="form-control" required="required">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">State </label>
							<div class="col-sm-8">
								<select name="state" id="state" class="form-control" required>
									<option value="">Select State</option>
									<?php $query = "SELECT * FROM states";
									$stmt2 = $mysqli->prepare($query);
									$stmt2->execute();
									$res = $stmt2->get_result();
									while ($row = $res->fetch_object()) {
									?>
										<option value="<?php echo $row->State; ?>"><?php echo $row->State; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Pincode : </label>
							<div class="col-sm-8">
								<input type="text" name="pincode" id="pincode" class="form-control" required="required">
							</div>
						</div>


					</div>
					<div id="PermanentAddress" class="tabcontent" style="height: 690px;">




						<div class="form-group">
							<label class="col-sm-5 control-label">Permanent Address same as Correspondense address : </label>
							<div class="col-sm-4" style="padding-top:1%;">
								<input type="checkbox" name="adcheck" value="1" />
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Address : </label>
							<div class="col-sm-8">
								<textarea rows="5" name="paddress" id="paddress" class="form-control" required="required"></textarea>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">City : </label>
							<div class="col-sm-8">
								<input type="text" name="pcity" id="pcity" class="form-control" required="required">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">State </label>
							<div class="col-sm-8">
								<select name="pstate" id="pstate" class="form-control" required>
									<option value="">Select State</option>
									<?php $query = "SELECT * FROM states";
									$stmt2 = $mysqli->prepare($query);
									$stmt2->execute();
									$res = $stmt2->get_result();
									while ($row = $res->fetch_object()) {
									?>
										<option value="<?php echo $row->State; ?>"><?php echo $row->State; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Pincode : </label>
							<div class="col-sm-8">
								<input type="text" name="ppincode" id="ppincode" class="form-control" required="required">
							</div>
						</div>


						<div class="col-sm-6 col-sm-offset-4">
							<button class="btn btn-default" type="submit" style="width: 25%;">Cancel</button>
							<input type="submit" name="submit" Value="Register" class="btn btn-primary" style="width: 25%;">
						</div>
			</form>
		<?php } ?>
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
<script type="text/javascript">
	$(document).ready(function() {
		$('input[type="checkbox"]').click(function() {
			if ($(this).prop("checked") == true) {
				$('#paddress').val($('#address').val());
				$('#pcity').val($('#city').val());
				$('#pstate').val($('#state').val());
				$('#ppincode').val($('#pincode').val());
			}

		});
	});
</script>
<script>
	function checkAvailability() {
		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_availability.php",
			data: 'roomno=' + $("#room").val(),
			type: "POST",
			success: function(data) {
				$("#room-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#duration').keyup(function() {
			var fetch_dbid = $(this).val();
			$.ajax({
				type: 'POST',
				url: "ins-amt.php?action=userid",
				data: {
					userinfo: fetch_dbid
				},
				success: function(data) {
					$('.result').val(data);
				}
			});


		})
	});
</script>
<script>
	function openPage(pageName, elmnt, color) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablink");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].style.backgroundColor = "";
		}
		document.getElementById(pageName).style.display = "block";
		elmnt.style.backgroundColor = color;
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>

</html>