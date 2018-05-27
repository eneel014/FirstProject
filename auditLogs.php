	<?php 
	header('Content-type:text/javascript');
	include 'includes/mysql_connect.php'; 

	$q = "SELECT * FROM tbl_audit_logs ORDER BY `a_date` DESC";
	$q = $conn->query($q); 
	$json_array = array();

	while ($r=$q->fetch_assoc()) {
		$json_array[] = $r;

	}
	// print_r($json_array);
	echo json_encode($json_array); ?>
