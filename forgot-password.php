<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$stmt = $mysqli->prepare("SELECT email,contactNo,password FROM userregistration WHERE (email=? && contactNo=?) ");
	$stmt->bind_param('ss', $email, $contact);
	$stmt->execute();
	$stmt->bind_result($username, $email, $password);
	$rs = $stmt->fetch();
	if ($rs) {
		$pwd = $password;
	} else {
		echo "<script>alert('Invalid Email/Contact no or password');</script>";
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

	<title>User Forgot Password</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/styleLogin.css">
</head>
<body >

<div class="ts-main-content">


	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<!-- ********************* -->
				<div class="col-md-12">


					<div class="row">
						<div>
							<div>
								<div >

									<div style="height:100%;padding-left:25%">
										<div class="screen">
											<div class="screen__content">
											<?php if (isset($_POST['login'])) { ?>
				                       	<p>Yuor Password is <?php echo $pwd; ?><br> Change the Password After login</p>
				                     	<?php }  ?>
												<form action="" class="login" method="post">




													<center>
														<h2><b style="font-family:cursive">Forgot PassWord</b> </h2>
													</center>
													<div class="login__field" style=" width: 300px;">

														<input style="width: 300px; background-color:#e8f0fe;" type="email" placeholder="Email" name="email" class="login__input" >
                                                  <br><br>
													<!-- </div>
												
						
													<div class="login__field" style=" width: 300px;"> -->
														<input style="width: 300px; background-color:#e8f0fe;" type="text" placeholder="Contact no" name="contact" class="login__input">
													</div>
													<center>
														<div>
															<input  type="submit" name="login" class="btn btn-block" value="Login" style="width: 240px; background-color: #b0a5e8; font-family:cursive; font-size:medium">
														</div>
						                        	</center>
													<br><br>
													<div class="text-center text-light" style="color:black;">
													      <a href="index.php" class="text-light">Sign in?</a>
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