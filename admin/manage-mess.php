<?php
session_start();
include('includes/config.php');
include('includes/checklogin.php');
check_login();

if (isset($_GET['del'])) {
	$messName = $_GET['del'];
	$adn = "delete from mess where messName=?";
	$stmt = $mysqli->prepare($adn);
	$stmt->bind_param('s', $messName);
	$stmt->execute();
	$stmt->close();
	echo "<script>alert('Data Deleted');</script>";
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
	<title>Manage Mess</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		<?php include('includes/sidebar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top: 4%">Manage Mess</h2>
						<div class="panel panel-default">
							<div class="panel-heading">All Mess Details</div>
							<div class="panel-body">
								<table class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>S. No</th>
											<th>Mess Name</th>
											<th>Mess Type</th>
											<th>Price Per Month</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>S. No</th>
											<th>Mess Name</th>
											<th>Mess Type</th>
											<th>Price Per Month</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
										$aid = $_SESSION['id'];
										$ret = "select * from mess";
										$stmt = $mysqli->prepare($ret);
										//$stmt->bind_param('i',$aid);
										$stmt->execute(); //ok
										$res = $stmt->get_result();
										$cnt = 1;
										while ($row = $res->fetch_object()) {
										?>
											<tr>
												<td><?php echo $cnt;; ?></td>
												<td><?php echo $row->messName; ?></td>
												<td><?php echo $row->messType; ?></td>
												<td><?php echo $row->price; ?></td>
												<td><a href="edit-mess.php?id=<?php echo $row->messName; ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
													<a href="manage-mess.php?del=<?php echo $row->messName; ?>" onclick="return confirm(" Do you want to delete");"><i class="fa fa-close"></i></a>
												</td>
											</tr>
										<?php
											$cnt = $cnt + 1;
										} ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>