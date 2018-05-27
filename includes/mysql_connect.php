<?php 
$MYSQLhost = "localhost";
$MYSQLuser = "root";
$MYSQLpass = "";
$MYSQLdbase = "db_seven_seas_v2";

// $MYSQLhost = "";
// $MYSQLuser = "seven_seas_user2018";
// $MYSQLpass = "rTec7iMQfPtXjcUK";
// $MYSQLdbase = "db_seven_seas";

$conn = new mysqli($MYSQLhost,$MYSQLuser,$MYSQLpass,$MYSQLdbase);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
// }
//mysqli_close($con);
// $query = mysqli_query($con,"SELECT * FROM tbl_users");
// while ($row = mysqli_fetch_array($query)) {
// 	if(sha1('bmw318i1') == $row['password']) echo "true"; else echo "false";
// }

	// $query = "SELECT * FROM tbl_users WHERE username='$user' AND password=sha1('$pass')";
	// $result = $conn->query($query);

function insertAuditLog($username, $action, $conn) {
	$thisUsername = $username;
	$thisAction = $action;
	$conn = $conn;

	$query = "INSERT INTO `tbl_audit_logs`(`a_action`, `a_username`) VALUES ('$thisAction','$thisUsername')";
	$conn->query($query);
	// if ($conn->query($query) === TRUE) {
	// 	echo "DONE";
	// } else {
	// 	echo "error";
	// }
// $conn->close();
}

$logUsername = $_COOKIE['username'];
$logQuery = "SELECT * FROM tbl_users WHERE username='$logUsername'";
$logQuery = $conn->query($logQuery);
$logResult = $logQuery->fetch_assoc();
$logName = $logResult['firstname'].' '.$logResult['lastname'];

// insertAuditLog("testest", "TEST", $conn);
 ?>	
