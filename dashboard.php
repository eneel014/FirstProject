<?php $pageTitle = "Dashboard"; ?>
<?php $navActive = "dashboard" ?>
<?php include('header.php'); ?>
  <?php include 'includes/mysql_connect.php'; ?>

  <?php if ($_COOKIE['cooUserType'] != 1): ?>
    <script type="text/javascript">
      window.location.href="clients";
    </script>
  <?php endif ?>

  <?php
    function getAssignee($conn) {
      $query = "SELECT * FROM tbl_users";
      $result = mysqli_query($conn, $query);
      $thisAssignee = '';
      while($row = mysqli_fetch_array($result)) {
        $thisAssignee = $thisAssignee."<option value='".$row['firstname']." ".$row['lastname']."'>".$row['firstname']." ".$row['lastname']."</option>";
      }
      return $thisAssignee;
    }
  ?>

  <?php 
  
    function editIssue($conn, $issue, $prio, $assignee, $id) {
      $query = "UPDATE `tbl_issues` SET `issue` = '$issue', `priority` = '$prio', `assignee` = '$assignee' WHERE `id` = '$id'";
      $result = mysqli_query($conn, $query);
    }

    function addIssue($conn, $issue, $prio, $assignee) {
      $query = "INSERT INTO tbl_issues(`issue`, `priority`, `assignee`) VALUES ('$issue', '$prio', '$assignee')";
      $result = mysqli_query($conn, $query);
    }

    function getClosedIssues($conn) {
      $query = "SELECT * FROM `tbl_issues` WHERE `is_open` = 0 ORDER BY priority DESC";
      $result = mysqli_query($conn, $query);
      $thisIssue = '';
      while($row = mysqli_fetch_array($result)) {
        $thisIssue = $thisIssue."
        <tr>
          <td id='issue".$row['id']."'>".$row['issue']."</td>
          <td>".$row['assignee']."</td>
          <td>".$row['resolution']."</td>
        </tr>";
      }
      return $thisIssue;
    }

    function getOpenIssues($conn) {
      $query = "SELECT * FROM `tbl_issues` WHERE `is_open` = 1 ORDER BY priority DESC";
      $result = mysqli_query($conn, $query);
      $thisIssue = '';
      while($row = mysqli_fetch_array($result)) {
        $thisIssue = $thisIssue."
        <tr>
          <td id='issue".$row['id']."'>".$row['issue']."</td>
          <td>".$row['priority']."</td>
          <td>".$row['assignee']."</td>
          <td><a href='#resolveIssueModal' class='resolveIssueModalLink modal-trigger modal-open' data-issueId='".$row['id']."' style='color: #4CAF50;'>Resolve</a> <a href='?editIssue=".$row['id']."'>Edit</a>
        </tr>";
      }
      return $thisIssue;
    }

    function resolveIssue($conn, $id, $solution) {
      $query = "UPDATE `tbl_issues` SET `is_open` = 0, `resolution` = '$solution' WHERE `id` = '$id'";
      $result = mysqli_query($conn,$query);
    }

    if(isset($_POST['btnEditIssue'])) {
      $issueID = mysqli_real_escape_string($conn, $_POST['editIssueID']);
      $issue = mysqli_real_escape_string($conn, $_POST['txtIssue']);
      $prio = mysqli_real_escape_string($conn, $_POST['slcPriorityIssue']);
      $assignee = mysqli_real_escape_string($conn, $_POST['slcAssigneeIssue']);
      editIssue($conn, $issue, $prio, $assignee, $issueID);
    }
    if(isset($_POST['btnAddIssue'])) {
      $issue = mysqli_real_escape_string($conn, $_POST['txtIssue']);
      $prio = mysqli_real_escape_string($conn, $_POST['slcPriorityIssue']);
      $assignee = mysqli_real_escape_string($conn, $_POST['slcAssigneeIssue']);
      addIssue($conn, $issue, $prio, $assignee);
    }

    if(isset($_POST['btnResolveIssue'])) {
      $id = mysqli_real_escape_string($conn, $_POST['issueID']);
      $solution = mysqli_real_escape_string($conn, $_POST['txtResolution']);
      resolveIssue($conn, $id, $solution);
    }
  ?>


  <?php
  function getDueAdditionalDeposit($conn) {
    $query = "SELECT a.*, b.firstname, b.lastname FROM tbl_additional_deposit a LEFT JOIN tbl_clients b ON a.client_id = b.id WHERE `email` = '' || `email` IS NULL ORDER BY (str_to_date(a.due_date, '%m/%d/%Y')) ASC";
    

    $result = mysqli_query($conn, $query);
    $thisDues = '';
    while($row = mysqli_fetch_array($result)) {
      $thisDues = $thisDues."
        <tr>
          <td>".$row['firstname']." ".$row['lastname']."</td>
          <td>Additional Deposit</td>
          <td>".$row['due_date']."</td>
          <td><a href='client-details?id=".$row['client_id']."&openADeposit'>View</a></td>
        </tr>
      ";
    }
    return $thisDues;
  }
  function getDueWithdrawalRequest($conn) {
    $query = "SELECT a.*, b.firstname, b.lastname FROM tbl_withdrawal_request a LEFT JOIN tbl_clients b ON a.client_id = b.id WHERE `email` = '' || `email` IS NULL ORDER BY (str_to_date(a.due_date, '%m/%d/%Y')) ASC";
    

    $result = mysqli_query($conn, $query);
    $thisDues = '';
    while($row = mysqli_fetch_array($result)) {
      $thisDues = $thisDues."
        <tr>
          <td>".$row['firstname']." ".$row['lastname']."</td>
          <td>Withdrawal Request</td>
          <td>".$row['due_date']."</td>
          <td><a href='client-details?id=".$row['client_id']."&openWRequest'>View</a></td>
        </tr>
      ";
    }
    return $thisDues;
  }
  ?>
        
        <div class="container section">
          <div class="row">
            <div class="col s12">
              <ul class="tabs" style="overflow: hidden;">
                <li class="tab <?=($_COOKIE['cooUserType'] != 1)? 'hide' : 'col'?>"><a href="#tab1" class="<?=($_COOKIE['cooUserType'] != 1)? '' : 'active'?>">For Approval</a></li>
                <li class="tab <?=($_COOKIE['cooUserType'] != 1)? 'col' : 'col'?>"><a href="#tab5" class="<?=($_COOKIE['cooUserType'] != 1)? 'active' : ''?>">Due Dates</a></li>
                <li class="tab <?=($_COOKIE['cooUserType'] != 1)? 'col' : 'col'?>"><a href="#tab2" class="<?=($_COOKIE['cooUserType'] != 1)? 'active' : ''?>">Issues</a></li>
                <li class="tab <?=($_COOKIE['cooUserType'] != 1)? 'col' : 'col'?>"><a href="#tab3">To do list</a></li>
                <li class="tab <?=($_COOKIE['cooUserType'] != 1)? 'col' : 'col'?>"><a href="#tab4">Audit Logs</a></li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col s12" id="tab1">
              <!-- For Approval -->
              <div class="row ">
                <div class="col s12">
                  <h4>For Approval</h4>
                  <table class="bordered ">
                    <tr>
                      <th width="25%">Client Name</th>
                      <th width="25%">Employee</th>
                      <th width="25%">Action</th>
                      <th width="25%"></th>
                    </tr>
                    <?php 
                    $faQuery = "SELECT * FROM `tbl_clients_temp`";
                    $faQuery = $conn->query($faQuery);

                    ?>
                    <?php if ($faQuery->num_rows > 0): ?>
                      <?php while($faResult = $faQuery->fetch_array()): ?>
                        <?php $empID = $faResult['updatedBy_empID']; ?>
                        <?php $faEmployeeQuery = "SELECT * FROM `tbl_users` WHERE user_id = '$empID'";
                        $faEQ = $conn->query($faEmployeeQuery);
                        $faER = $faEQ->fetch_array();
                        $employeeName = $faER['firstname']. " ".$faER['lastname'];

                        ?>

                        <?php if ($faResult['is_toDelete']): ?>
                          <tr>
                            <td><a href="client-details?id=<?=$faResult['client_id']?>"><?=$faResult['firstname']?> <?=$faResult['lastname']?></a></td>
                            <td><?=$employeeName?></td>
                            <td>DELETE</td>
                            <td class="actions-td"><a href="deleteClient?id=<?=$faResult['client_id']?>" class="">Approve</a> <a href="client-details?id=<?=$faResult['client_id']?>&faRejectDelete=1" class="danger">Reject</a></td>
                          </tr>
                        <?php else: ?>
                          <tr>
                            <td><a href="forApprovalClientEdit?id=<?=$faResult['client_id']?>"><?=$faResult['firstname']?> <?=$faResult['lastname']?></a></td>
                            <td><?=$employeeName?></td>
                            <td>UPDATE</td>
                            <td class="actions-td"><a href="forApprovalClientEdit?id=<?=$faResult['client_id']?>&faAccept=1" class="">Approve</a> <a href="forApprovalClientEdit?id=<?=$faResult['client_id']?>&faReject=1" class="danger">Reject</a></td>
                          </tr>  
                        <?php endif ?>


                      <?php endwhile ?>
                    <?php else: ?>
                      <tr>                      
                        <td colspan="4" class="center">
                          No records found.
                        </td>
                      </tr>
                    <?php endif ?>

                  </table>
                </div>
              </div>
              <!-- For Approval End -->
            </div>

            <div class="col s12" id="tab5">
              <!-- Due Date -->
                <div class="row">
                  <div class="col s12">
                    <h4>Due Dates</h4>
                    <table id="tblDueDates">
                      <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                      <?=getDueAdditionalDeposit($conn)?>
                      <?=getDueWithdrawalRequest($conn)?>
                    </table>
                  </div>
                </div>
              <!-- Due Date End -->
            </div>

            <div class="col s12" id="tab2">
              <!-- Issues -->
              <div class="row">
                <div class="col s12">
                  <h4 class="">Issues</h4>
                  <ul class="tabs" style="overflow: hidden;">
                    <li class="tab col s6"><a href="#openedTab" class="active">Open</a></li>
                    <li class="tab col s6"><a href="#closedTab">Close</a></li>
                  </ul>
                </div>
              </div>
              <div class="row">
                <div class="col s12 right-align" id="openedTab">
                  <a href="#addIssueModal" class="waves-effect waves-light btn modal-trigger">+ Add</a>
                    <div class="row">
                      <div class="s12 col left-align">
                        <table id="tblOpenIssues">
                          <tr>
                            <th width="30%">Issue</th>
                            <th width="25%">Priority</th>
                            <th width="20%">Assignee</th>
                            <th width="25%">Action</th>
                          </tr>
                          <?=getOpenIssues($conn)?>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col s12" id="closedTab">
                    <div class="row">
                      <div class="col s12">
                        <table id="">
                          <tr>
                            <th width="38%">Issue</th>
                            <th width="20%">Assignee</th>
                            <th width="38%">Resolution</th>
                          </tr>
                          <?=getClosedIssues($conn)?>
                        </table>
                      </div>
                    </div>
                  </div>
              </div>
              <!-- Issues End -->
            </div>
            <div class="col s12" id="tab3">
              <!-- To do List -->
              <div class="row">
                <div class="col s12">
                  <h4>To do List</h4>
                  <div class="row">
                    <form id="addToDoList">
                      <div class="col s3 input-field">
                        <input type="text" required name="txtToItem" id="txtToItem">
                        <label for="txtToItem">Task</label>
                      </div>
                      <div class="col s3">
                        <label>Priority</label>
                        <select required class="browser-default" name="slcPriority" id="slcPriority">
                          <option value="" selected disabled="">Choose your option</option>
                          <option value="Normal">Normal</option>
                          <option value="Urgent">Urgent</option>
                        </select>
                      </div>
                      <div class="col s3">
                        <label>Assignee</label>
                        <select required class="browser-default" name="slcAssignee" id="slcAssignee">
                          <option value="" selected disabled="">Choose your option</option>
                          <?=getAssignee($conn);?>
                        </select>
                      </div>
                      <div class="col s3 input-field">
                        <input type="submit" class="btn" value="+ Add">
                      </div>
                    </form>
                  </div>
                  <div class="row">
                    <div class="col s12" style="max-height: 600px; overflow-y: scroll;">
                      <form id="toDoListForm">
                        <table id="tblToDoList" class="bordered">
                          <tr>
                            <th style="width: 40%">Task</th>
                            <th style="width: 10%">Priority</th>
                            <th style="width: 10%">Assginee</th>
                            <th style="width: 20%">Action</th>
                          </tr>
                        </table>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- To do List End -->
            </div>
            <div class="col s12" id="tab4">
              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="col s12">
                      <div class="col s12">
                        <div class="col s12">
                          <h4>Audit Logs</h4>
                          <table id="auditLogTable">
                            <tr>
                              <th>Name</th>
                              <th>Action</th>
                              <th>Date</th>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php if(isset($_GET['editIssue'])):
          $qeiID = $_GET['editIssue'];
          $queryEditIssue = "SELECT * FROM `tbl_issues` WHERE `id` = '$qeiID'";
          $resultEditIssue = mysqli_query($conn, $queryEditIssue);
          $rowEditIssue = mysqli_fetch_array($resultEditIssue);
          
          ?>
          <!-- Edit Issue Modal -->
          <div id="editIssueModal" class="modal editIssueModal">
            <form id="editIssueForm" action="dashboard.php" method="POST">
              <input type="hidden" name="editIssueID" id="editIssueID">
              <div class="modal-content">
                <h5>Issues</h5>
                <div class="divider"></div><br>
                <div class="row">
                  <div class="input-field col s4">
                    <textarea required name="txtIssue" id="txtIssue" class="materialize-textarea"><?=$rowEditIssue['issue']?></textarea>
                    <label for="txtIssue">Issue</label>
                  </div>
                  <div class="col s4">
                    <label>Priority</label>
                    <select required class="browser-default" name="slcPriorityIssue" id="slcPriorityIssue">
                      <option value="" selected disabled="">Choose your option</option>
                      <option value="Normal" <?=($rowEditIssue['priority']) == 'Normal' ? 'selected' : '' ?>>Normal</option>
                      <option value="Urgent" <?=($rowEditIssue['priority']) == 'Urgent' ? 'selected' : '' ?>>Urgent</option>
                    </select>
                  </div>
                  <div class="col s4">
                    <label>Assignee</label>
                    <select required value="Yuri Yamada" class="browser-default" name="slcAssigneeIssue" id="slcAssigneeIssue">
                      <option value="" selected disabled="">Choose your option</option>
                      <?=getAssignee($conn);?>
                    </select>
                  </div>
                </div>
                <div class="divider"></div>
              </div>
              <div class="modal-footer">
                <input type="submit" name="btnEditIssue" id="btnEditIssue" class="waves-effect btn btn-green waves-light" value="Submit">
                <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
              </div>
            </form>
          </div>
          <!-- Edit Issue Modal End -->
        <?php endif ?>

        <!-- Resolve Issue Modal -->
        <div id="resolveIssueModal" class="modal resolveIssueModal">
          <form id="resolveIssueForm" method="POST">
            <input type="hidden" name="issueID" id="issueID">
            <div class="modal-content">
              <p></p>
              <div class="divider"></div><br>
              <div class="row">
                <div class="input-field col s12">
                  <textarea required name="txtResolution" id="txtResolution" class="materialize-textarea"></textarea>
                  <label for="txtResolution">Description/Resolution</label>
                </div>
              </div>
              <div class="divider"></div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="btnResolveIssue" id="btnResolveIssue" class="waves-effect btn btn-green waves-light" value="Submit">
              <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
            </div>
          </form>
        </div>
        <!-- Resolve Issue Modal End -->

        <!-- Add Issue Modal -->
        <div id="addIssueModal" class="modal addIssueModal">
          <form id="addIssueForm" method="POST">
            <div class="modal-content">
              <h5>Issues</h5>
              <div class="divider"></div><br>
              <div class="row">
                <div class="input-field col s4">
                  <textarea required name="txtIssue" id="txtIssue" class="materialize-textarea"></textarea>
                  <label for="txtIssue">Issue</label>
                </div>
                <div class="col s4">
                  <label>Priority</label>
                  <select required class="browser-default" name="slcPriorityIssue" id="slcPriorityIssue">
                    <option value="" selected disabled="">Choose your option</option>
                    <option value="Normal">Normal</option>
                    <option value="Urgent">Urgent</option>
                  </select>
                </div>
                <div class="col s4">
                  <label>Assignee</label>
                  <select required class="browser-default" name="slcAssigneeIssue" id="slcAssigneeIssue">
                    <option value="" selected disabled="">Choose your option</option>
                    <?=getAssignee($conn);?>
                  </select>
                </div>
              </div>
              <div class="divider"></div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="btnAddIssue" id="btnAddIssue" class="waves-effect btn btn-green waves-light" value="Submit">
              <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
            </div>
          </form>
        </div>
        <!-- Add Issue Modal End -->

        <div id="toDoListModal" class="modal toDoListModal">
          <form id="toDoListCompletedForm">
            <input type="hidden" name="itemID" id="itemID" value="">
            <input type="hidden" name="isChecked" id="isChecked" value="">
            <div class="modal-content">
              <h5></h5>
              <div class="divider"></div><br>
              <div class="row">
                <div class="input-field col s12">
                  <textarea id="txtActionTaken" class="materialize-textarea"></textarea>
                  <label for="txtActionTaken">Action Taken</label>
                </div>
              </div>
              <div class="divider"></div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="btnCorpoAdditional" id="btnCorpoAdditional" class="modal-action modal-close waves-effect btn btn-green waves-light" value="Submit">
              <a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
            </div>
          </form>
        </div>
        <script type="text/javascript" src="js/custom/getAudit.js"></script>
<?php include('footer.php') ?>
<?php 
  if(isset($_GET['editIssue'])) {
    ?>
    <script>
      $(document).ready(function() {
        $('#editIssueID').val("<?=$_GET['editIssue']?>");
        $('a[href="#tab2"]').click();
        $('#editIssueModal').modal('open');
      })
    </script>
    <?php
  }
?>