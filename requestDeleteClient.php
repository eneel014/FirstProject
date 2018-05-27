<?php if (!isset($_GET['id'])): ?>
	<script type="text/javascript">
		window.location.href = "clients";
	</script>
<?php endif ?>

<?php include('header.php'); ?>

<?php include('includes/mysql_connect.php'); ?>
<?php 
	$thisID = $_GET['id'];
	$empID = $_COOKIE['empID'];
	$queryCheck = "SELECT * FROM `tbl_clients_temp` WHERE client_id = '$thisID'";
	$queryCheck = $conn->query($queryCheck);

	$query = "SELECT * FROM `tbl_clients` WHERE id = '$thisID'";
	$query = $conn->query($query);
	$result = $query->fetch_array();
$firstname = $result['firstname'];
$lastname = $result['lastname'];
	if($queryCheck->num_rows > 0) {
		$deleteQuery = "UPDATE `tbl_clients_temp` SET `is_toDelete` = 1 WHERE `client_id` = '$thisID'";
	} else {
		$deleteQuery = "INSERT INTO `tbl_clients_temp` (
			`client_id`,
			`firstname`,
			`lastname`,
			`updatedBy_empID`,
			`is_toDelete`
		) VALUES (
			'$thisID',
			'$firstname',
			'$lastname',
			'$empID',
			1
		)";
	}
	$result = $conn->query($deleteQuery); 
	$conn->close();
	?>
asdasd

	<script type="text/javascript">
		window.location.href = "clients?deleteRequestSuccessful=1";
	</script>