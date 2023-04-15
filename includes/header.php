
<?php 
if($_SESSION['id'])
{ ?>

	<?php
		$aid = $_SESSION['id'];
		$udate = date('d-m-Y h:i:s', time());
		$ret = "select * from userregistration where id=?";
		$stmt = $mysqli->prepare($ret);
		$stmt->bind_param('i', $aid);
		$stmt->execute(); //ok
		$res = $stmt->get_result();
		//$cnt=1;
		while ($row = $res->fetch_object()) {
		?>

	<div class="brand clearfix">
		<a href="dashboard.php" ><img src="img/logo1.jpg" style="height: 45px; margin-top:8px; margin-left: 15px;float:left""> </a>
		<a href="dashboard.php" class="logo" style="font-size:16px; margin-left: -12px; color: white;">Hostel Registration System</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			<li class="ts-account">

				<a href="#"><?php echo "$row->firstName $row->middleName $row->lastName"; } ?><i class="fa fa-angle-down hidden-side"></i></a>
				
				<ul>
					<li><a href="my-profile.php">My Account</a></li>
					<li><a href="change-password.php">Change Password</a></li>
					
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</li>
		</ul>
	</div>
<?php
} else { ?>
<div class="brand clearfix">
<a href="index.php" ><img src="img/logo1.jpg" style="height: 45px; margin-top:8px; margin-left: 15px;float:left"> </a>
		<a href="index.php" class="logo" style="font-size:16px; margin-left: -12px;color:white;">Hostel Registration System</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		
	</div>
	<?php } ?>