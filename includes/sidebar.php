<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
				<?PHP if(isset($_SESSION['id']))
				{ ?>
					<center><li class="ts-label">STUDENT</li></center>
					<li><a href="dashboard.php"><i class="fa fa-desktop"></i>Dashboard</a></li>
					<li><a href="book-hostel.php"><i class="fa fa-file-o"></i>Book Hostel</a></li>
					<li><a href="room-details.php"><i class="fa fa-file-o"></i>Room Details</a></li>
					<li><a href="my-profile.php"><i class="fa fa-user"></i> My Profile</a></li>

				<?php } else { ?>
					<center><li class="ts-label">MAIN</li></center>
					<li><a href="registration.php"><i class="fa fa-files-o"></i> User Registration</a></li>
					<li><a href="index.php"><i class="fa fa-users"></i> User Login</a></li>
					<li><a href="admin"><i class="fa fa-user"></i> Admin Login</a></li>
				<?php } ?>

			</ul>
		</nav>