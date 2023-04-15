<?php if($_SESSION['id'])
{ ?>

<div class="brand clearfix">
<a href="dashboard.php" ><img src="../img/logo1.jpg" style="height: 45px; margin-top:8px; margin-left: 15px;float:left"> </a>
	<a href="dashboard.php" class="logo" style="font-size:16px;margin-left: -12px;color:white;">Hostel Registration System</a>
	<span class="menu-btn"><i class="fa fa-bars"></i></span>
	<ul class="ts-profile-nav">
		<li class="ts-account">
			<a href="#"> ADMIN <i class="fa fa-angle-down hidden-side"></i></a>
			<ul>
				<li><a href="admin-profile.php">My Account</a></li>
				<li><a href="changePassword.php">Change Password</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>	
		</li>
	</ul>
</div>



<?php
} else { ?>
<div class="brand clearfix">
<a href="index.php" ><img src="../img/logo1.jpg" style="height: 45px; margin-top:8px; margin-left: 15px;float:left"> </a>
		<a href="index.php" class="logo" style="font-size:16px;margin-left: -12px;color:white;">Hostel Registration System</a>
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		
	</div>
	<?php } ?>