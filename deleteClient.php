<?php if (!isset($_GET['id'])): ?>
	<script type="text/javascript">
		window.location.href = "clients";
	</script>
<?php endif ?>

<?php include('header.php'); ?>

<?php include('includes/mysql_connect.php'); ?>
<?php 
	$thisID = $_GET['id'];
	$deleteQuery = "SELECT * FROM `tbl_clients` WHERE `id` = '$thisID'";
	$result = $conn->query($deleteQuery);
	$row = $result->fetch_assoc();
	$firstname = $row['firstname'].' '.$row['lastname'];

	$deleteQuery = "DELETE FROM `tbl_clients` WHERE `id` = '$thisID'";
	$result = $conn->query($deleteQuery); 
	$deleteQuery = "DELETE FROM `tbl_clients_temp` WHERE `client_id` = '$thisID'";
	$result = $conn->query($deleteQuery); 
	
	insertAuditLog("$logName", "DELETED $firstname", $conn);
	$conn->close();
	?>


	<script type="text/javascript">
		window.location.href = "clients?deleteSuccessful=1";
	</script>