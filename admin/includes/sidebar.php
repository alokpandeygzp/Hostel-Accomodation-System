		<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<?PHP if(isset($_SESSION['id']))
				{?>
					<center><li class="ts-label">ADMIN</li></center>
					<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li><a href="#"><i class="fa fa-files-o"></i> Courses</a>
					<ul>
						<li><a href="add-courses.php">Add Courses</a></li>
						<li><a href="manage-courses.php">Manage Courses</a></li>
					</ul>
				</li>
					<li><a href="#"><i class="fa fa-desktop"></i> Rooms</a>
					<ul>
						<li><a href="create-room.php">Add a Room</a></li>
						<li><a href="manage-rooms.php">Manage Rooms</a></li>
					</ul>
				</li>

				<!-- Mess Addition -->
				</li>
					<li><a href="#"><i class="fa fa-desktop"></i> Mess</a>
					<ul>
						<li><a href="create-mess.php">Add a Mess</a></li>
						<li><a href="manage-mess.php">Manage Mess</a></li>
					</ul>
				</li>
				<!-- Ends here -->

				<li><a href="registration.php"><i class="fa fa-user"></i>Student Registration</a></li>
				<li><a href="manage-students.php"><i class="fa fa-users"></i>Manage Students</a></li>
				
			<?php } else { ?>
				<center><li class="ts-label">ADMIN</li></center>
				<li><a href="../registration.php"><i class="fa fa-files-o"></i> User Registration</a></li>
				<li><a href="../index.php"><i class="fa fa-users"></i> User Login</a></li>
				<?php } ?>

			</ul>
		</nav>