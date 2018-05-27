<?php


include('includes/mysql_connect.php');

$query = "SELECT * FROM `tbl_to_do_list` ORDER BY `is_done`, `date_create` DESC";

// Get Result
$result = mysqli_query($conn, $query);

// Fetch Data
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);