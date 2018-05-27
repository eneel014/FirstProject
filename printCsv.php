
<?php
$fMonth = date("M");
$fYear = date("Y");
$fileName = "Seven-Seas-$fMonth-$fYear";
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=$fileName.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/><?php 
include('includes/mysql_connect.php');
$output ="";
?>
<style>
  table {
    border: 1px solid #333333;
  }
  td, th {
    border: 1px solid #333333;
    background-color: #f2f2f2;
  }
</style>
<?php for($iYear = date("Y"); $iYear >= 2018; $iYear--): ?>
<h4><?=$iYear?></h4>
<table>
  <thead>
    <tr>
      <th>Month</th>
      <th>New Account</th>
      <th>Deposit</th>
      <!-- <th>Additional</th> -->
      <!-- <th>Deposit</th> -->
      <th>Withdrawal</th>
      <!-- <th>Amount</th> -->
      <!-- <th>Closed Account</th> -->
    </tr>
  </thead>
  <tbody>
  <?php for($iMonth = (date("Y") == $iYear ? date("n") : 12 ); $iMonth >= 1; $iMonth--): ?>
    <tr>
      <th>
        <?=getMonthName($iMonth, "M");?> <?=$iYear?>
      </th>
      <td><?=getNewAccount($conn, $iMonth, $iYear)?></td>
      <td><?= number_format(getDeposits($conn, $iMonth, $iYear)) ?></td>
      <!-- <td></td> -->
      <!-- <td></td> -->
      <td><?= number_format(getWithdrawal($conn, $iMonth, $iYear)) ?></td>
      <!-- <td></td> -->
      <!-- <td></td> -->
    </tr>
  <?php endfor; ?>
  </tbody>
</table>
<?php endfor; ?>

<?php
// Get all year until x year
function getYear($x) {
  $thisYear = '';
  $currentYear = date("Y");
  for($i = $x;$currentYear >= $i; $currentYear--) {
    $thisYear =$thisYear. "<option value='$currentYear'>$currentYear</option>";
  }

  return $thisYear;
}

// Get Months For Dropdown
function getMonths() {
  $thisMonths = '';
  for($i = 1; $i <= 12; $i++) {
    $monthName = getMonthName($i, "F");
    $thisMonths = $thisMonths. "<option value='$i'>$monthName</option>";
  }
  return $thisMonths;
}

// Get Month Name
function getMonthName($i, $x) {
  $monthNum  = $i;
  $dateObj   = DateTime::createFromFormat('!m', $monthNum);
  $monthName = $dateObj->format("$x");
  return $monthName;
}

// Get New Accounts (COUNT)
function getNewAccount($conn, $month, $year) {
  
  $query = "SELECT COUNT(id) AS thisCount FROM `tbl_clients` WHERE MONTH(dateCreated) = '$month' AND YEAR(dateCreated) = '$year'";
  $thisCount = 0;
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result)){
    $thisCount = $row['thisCount'];
  }

  return $thisCount; 
}

// Get Deposits
function getDeposits($conn, $month, $year){
  
  $query = "SELECT SUM(REPLACE(REPLACE(REPLACE(amount, ' ',''), '$', ''), ',', '')) AS thisSUM FROM `tbl_additional_deposit` WHERE MONTH(dateCreated) = '$month' AND YEAR(dateCreated) = '$year'";
  $thisTotal = 0;
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result)){
    $thisTotal = $row['thisSUM'];
  }

  return $thisTotal; 
}

// Get Withdrawal
function getWithdrawal($conn, $month, $year){
  
  $query = "SELECT SUM(REPLACE(REPLACE(REPLACE(amount, ' ',''), '$', ''), ',', '')) AS thisSUM FROM `tbl_withdrawal_request` WHERE MONTH(date_created) = '$month' AND YEAR(date_created) = '$year'";
  $thisTotal = 0;
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result)){
    $thisTotal = $row['thisSUM'];
  }

  return $thisTotal; 
}

?>