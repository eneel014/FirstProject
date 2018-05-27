<?php $pageTitle = "Reports"; ?>
<?php $bodyClass = "reports-page" ?>
<?php $navActive = "reports" ?>
<?php include('header.php'); 
include('includes/mysql_connect.php'); ?>


  <div class="section">
    <div class="row">
      <div class="col s12">
        <?php /*
        <div class="row">
          <!-- Form Start -->
          <form action="">

            <!-- From -->
            <div class="s6 col">
              <div class="row">
                <!-- Year -->
                <div class="col s5">
                  <label>Year</label>
                  <select required class="browser-default" name="slcStatus" id="slcStatus">
                    <option value="" selected disabled="">Choose your option</option>
                    <?=getYear(2018)?>
                  </select>
                </div>

                <!-- Month -->
                <div class="col s5">
                  <label>Month</label>
                  <select required class="browser-default" name="slcStatus" id="slcStatus">
                    <option value="" selected disabled="">Choose your option</option>
                    <?=getMonths()?>
                  </select>
                </div>
                <div class="col s2 center" style="margin-top: 30px;">
                  TO
                </div>
              </div>
            </div>
            <!-- From End -->

            <!-- To -->
            <div class="col s6">
              <div class="row">
                  <!-- Year -->
                  <div class="col s5">
                    <label>Year</label>
                    <select required class="browser-default" name="slcStatus" id="slcStatus">
                      <option value="" selected disabled="">Choose your option</option>
                      <?=getYear(2018)?>
                    </select>
                  </div>

                  <!-- Month -->
                  <div class="col s5">
                    <label>Month</label>
                    <select required class="browser-default" name="slcStatus" id="slcStatus">
                      <option value="" selected disabled="">Choose your option</option>
                      <?=getMonths()?>
                    </select>
                  </div>

                  <div class="col s2" style="margin-top: 24px;">
                    <input type="submit" class="btn" value="Submit">
                  </div>
              </div>
            </div>
            <!-- To End -->

          </form>
          <!-- Form End -->
        </div>
        */ ?>

        <div class="row">
          <div class="col s12">
            <a href="printCsv" class="btn" target="_blank" >EXPORT AS CSV</a>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="col s12">
                <?php for($iYear = date("Y"); $iYear >= 2018; $iYear--): ?>
                <h4><?=$iYear?></h4>
                <table class="bordered">
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
                </table>
                <div class="row">
                  <div class="col s12">&nbsp;</div>
                </div>
                <?php endfor; ?>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

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

<?php include('footer.php') ?>