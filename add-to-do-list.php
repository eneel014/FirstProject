<?php

include('includes/mysql_connect.php');

if (isset($_POST['txtToItem'])) {
  $thisTask = mysqli_real_escape_string($conn, $_POST['txtToItem']);
  $slcPriority = mysqli_real_escape_string($conn, $_POST['slcPriority']);
  $slcAssignee = mysqli_real_escape_string($conn, $_POST['slcAssignee']);
  $query = "INSERT INTO tbl_to_do_list(task, priority, assignee) VALUES('$thisTask', '$slcPriority', '$slcAssignee')";

  if(mysqli_query($conn, $query)) {
    echo 'User Added....';
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}

if(isset($_POST['itemID'])) {
  $thisID = mysqli_real_escape_string($conn, $_POST['itemID']);
  $actionTaken = mysqli_real_escape_string($conn, $_POST['actionTaken']);
  $isChecked = $_POST['isChecked'];

  $query = "UPDATE `tbl_to_do_list` SET `is_done` = '$isChecked', `action` = '$actionTaken' WHERE `id` = '$thisID'";

  if(mysqli_query($conn, $query)) {
    // echo 'User Added....';
    echo $thisID." ".$isChecked;
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}