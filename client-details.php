<?php if (!isset($_GET['id'])): ?>
	<script type="text/javascript">
		window.location.href = "clients";
	</script>
<?php endif ?>
<?php $pageTitle = "Client Details"; ?>
<?php $bodyClass = "client-detail-page"; ?>
<?php $navActive = "clients" ?>
<?php if (isset($_GET['new'])): ?>
	<?php $bodyClass = "client-detail-page new"; ?>
<?php endif ?>

<?php include('includes/mysql_connect.php'); ?>
<?php 
$client_id = $_GET['id'];
$query = "SELECT * FROM tbl_clients	 WHERE id = '$client_id'";
$query = $conn->query($query); 
$result = $query->fetch_assoc();
$employee_query_id = $result['emp_id'];

$accountStatus = $result['status'];

$emloyee_query = "SELECT * FROM tbl_users WHERE user_id ='$employee_query_id'";
$emloyee_query = $conn->query($emloyee_query); 
$emloyee_result = $emloyee_query->fetch_assoc();
$nullHandler = '-'; ?>


<?php function ueAuditFnc($logName, $action, $id ,$conn) {

	$q = "SELECT * FROM `tbl_clients` WHERE `id` = '$id'";
	$q = $conn->query($q);
	$r = $q->fetch_assoc();
	$name = $r['firstname'].' '.$r['lastname'];
	insertAuditLog("$logName", "$action $name", $conn);
} ?>

<?php include('header.php') ?>

	<div class="section wrap">
		<div class="row">
			<div class="col s8 offset-s2">
				<?php if (isset($_GET['faRejectDelete'])): ?>
					<?php $rqID = $_GET['id']; ?>
					<?php $rejectQuery = "DELETE FROM `tbl_clients_temp` WHERE client_id = '$rqID'";
					$rejectQuery = $conn->query($rejectQuery); ?>

				<?php endif ?>
				<?php if (isset($_GET['updated'])): ?>
					<div class="row scale-transition delete-on-click ">
						<div class="col s6 green lighten-1 offset-s2 white-text card-panel">
							<p>Record updated.  <a href="#!" class="white-text"><i class="material-icons right">close</i></a></p>
						</div>
					</div>
				<?php endif ?>
				<?php if (isset($_GET['toConfirm'])): ?>
					<div class="row scale-transition delete-on-click ">
						<div class="col s6 green lighten-1 offset-s2 white-text card-panel">
							<p>Changes are now submitted to the Global Administrator for Approval.<a href="#!" class="white-text"><i class="material-icons right">close</i></a></p>
						</div>
					</div>
				<?php endif ?>
				<?php if (isset($_GET['deleteSuccess'])): ?>
					<div class="row scale-transition delete-on-click ">
						<div class="col s6 red lighten-1 offset-s2 white-text card-panel">
							<p>'<?=$_GET['deleteSuccess']?>' has been successfully removed.  <a href="#!" class="white-text"><i class="material-icons right">close</i></a></p>
						</div>
					</div>
				<?php endif ?>
				<div class="row">
					<!-- <ul class="collapsible popout" data-collapsible="expandable"> -->
					<ul class="collapsible popout">	
						<li class="">
							<a class="collapsible-header waves-effect waves-grey <?=($_GET['personalDetail'] ? 'active' : '')?>"><i class="material-icons">account_box</i> Personal Details</a>
							<div class="collapsible-body">
								<h4>Account Details</h4>
								<div class="divider"></div>
								<div class="row">
									<div class="col s12">
										<table class="bordered highlight">
											<tr>
												<th width="20%">
													User ID:
												</th>
												<td width="30%">
													<?=($result['user_id']=='' ? $nullHandler : $result['user_id']);?>
												</td>
												<th width="20%">
													Initial Password
												</th>
												<td width="30%">
													<?=($result['initial_password']=='' ? $nullHandler : $result['initial_password']);?>
												</td>
											</tr>
											<tr>
												<th>
													Account Type
												</th>
												<td class="cptlze">
													<?=($result['status']=='' ? $nullHandler : $result['status']);?>
												</td>
												<th>
													Status
												</th>
												<td>
													<?=($result['account_status']=='' ? $nullHandler : $result['account_status']);?>
												</td>
											</tr>
											<tr>
												<th>
													Security Company
												</th>
												<td class="cptlze">
													<?php $securityCompany=$result['security_company']; ?>
													<?=($result['security_company']=='' ? $nullHandler : $result['security_company']);?>
												</td>
												<th>
													Seminar
												</th>
												<td>
													<?=($result['seminar']=='' ? $nullHandler : $result['seminar']);?>
												</td>
											</tr>

											<tr class="<?=($result['security_company1']=='' ? 'hide' : '');?>">
												<td colspan="4">
													<table style="width:50%;">
														<tr>
															<th>Security Company History</th>
															<th>User ID</th>
														</tr>
														<tr>
															<td><?=$result['security_company1'];?></td>
															<td><?=($result['userid1']=='' ? '' : $result['userid1']);?></td>
														</tr>
														<tr class="<?=($result['security_company2']=='' ? 'hide' : '');?>">
															<td><?=$result['security_company2'];?></td>
															<td><?=($result['userid2']=='' ? '' : $result['userid2']);?></td>
														</tr>
														<tr class="<?=($result['security_company3']=='' ? 'hide' : '');?>">
															<td><?=$result['security_company3'];?></td>
															<td><?=($result['userid3']=='' ? '' : $result['userid3']);?></td>
														</tr>
													</table>
												</td>
											</tr>

											<tr>
												<th>
													Referred By/Agent's Name
												</th>
												<td class="cptlze">
													<?=($result['referred_by']=='' ? $nullHandler : $result['referred_by']);?>
												</td>
												<th>
													Added By
												</th>
												<td class="cptlze">
													<?=($emloyee_result['lastname']) ?> <?=($emloyee_result['firstname']) ?>
												</td>
											</tr>
											<tr>
												<th>
													Date Created
												</th>
												<td>
													<?=($result['dateCreated']=='' ? $nullHandler : (date('m/d/Y',strtotime($result['dateCreated']))));?>
												</td>
												<th>
													<?=($result['remarks_comments']=='' ? '' : 'Remarks/Comment')?>
													
												</th>
												<td class="">
													<?=($result['remarks_comments']=='' ? '' : $result['remarks_comments'])?>
												</td>
											</tr>
										</table>
									</div>
								</div><br>	
								<h4>Personal Information</h4>
								<div class="divider"></div>
								<div class="row">
									<div class="col s12">
										<table class="bordered highlight">
											<!--  -->
											<tr class="<?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th width="20%">
													First Name
												</th>
												<td width="30%" class="cptlze">
													<?=($result['firstname']=='' ? $nullHandler : $result['firstname']);?>
												</td>
												<th width="20%">
													Last name
												</th>
												<td width="30%" class="cptlze">
													<?=($result['lastname']=='' ? $nullHandler : $result['lastname']);?>
												</td>
											</tr>
											<tr class="<?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th>
													Mother's Maiden Name
												</th>
												<td>
													<?=($result['mother_mname']=='' ? $nullHandler : $result['mother_mname']);?>
												</td>
												<th>
													Gender
												</th>
												<td>
													<?=($result['gender']=='' ? $nullHandler : $result['gender']);?>
												</td>
											</tr>
											<tr class="<?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th>
													Place Of Birth
												</th>
												<td>
													<?=($result['place_of_birth']=='' ? $nullHandler : $result['place_of_birth']);?>
												</td>
												<th>
													Nationality
												</th>
												<td class="cptlze">
													<?=($result['nationality']=='' ? $nullHandler : $result['nationality']);?>
												</td>
											</tr>
											<tr class="<?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th>
													Civil Status
												</th>
												<td class="cptlze">
													<?=($result['civil_status']=='' ? $nullHandler : $result['civil_status']);?>
												</td>
												<?php if ($result['civil_status']=="Married"): ?>
													<th>Name Of Spouse</th>
													<td class="cptlze">
														<?=($result['name_of_spouse']=='' ? $nullHandler : $result['name_of_spouse']);?>
													</td>
												<?php else: ?>
													<th>&nbsp;</th>
													<td>&nbsp;</td>
												<?php endif ?>
											</tr>
											<tr class="<?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th>
													Email Address
												</th>
												<td>
													<?=($result['email_add']=='' ? $nullHandler : $result['email_add']);?>
												</td>
												<th>
													Birthday
												</th>
												<td>
													<?=($result['date_of_birth']=='' ? $nullHandler : (date('m/d/Y',strtotime($result['date_of_birth']))));?>
												</td>
											</tr>
											<tr class="<?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th>
													Home Address
												</th>
												<td class="cptlze">
													<?=($result['home_address']=='' ? $nullHandler : $result['home_address']);?>
												</td>
												<th>
													Home/Mobile Phone
												</th>
												<td>
													<?=($result['mobile_phone']=='' ? $nullHandler : $result['mobile_phone']);?>
												</td>
											</tr>
											<tr class="<?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th>
													Employment Status
												</th>
												<td>
													<?=($result['employee_status']=='' ? $nullHandler : $result['employee_status']);?>
												</td>
												<th>
													<?=($result['employee_status']=='Unemployed' ? '' : 'Name of Employer/Business' );?>
													
												</th>
												<td class="cptlze">
													<?=($result['employee_status']=='Unemployed' ? '' : ($result['name_of_employer']=='' ? $nullHandler : $result['name_of_employer']));?>
												</td>
											</tr>
											<tr class="<?=($result['employee_status']=='Unemployed' ? 'hide' : '' )?> <?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th>
													Business Address
												</th>
												<td class="cptlze">
													<?=($result['business_address']=='' ? $nullHandler : $result['business_address']);?>
												</td>
												<th>
													Office Phone
												</th>
												<td>
													<?=($result['office_phone']=='' ? $nullHandler : $result['office_phone']);?>
												</td>
											</tr>
											<tr class="<?=($result['employee_status']=='Unemployed' ? 'hide' : '' )?> <?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
												<th>
													Nature of Business
												</th>
												<td class="cptlze">
													<?=($result['nature_of_business']=='' ? $nullHandler : $result['nature_of_business']);?>
												</td>
												<th>
													Occupation
												</th>
												<td class="cptlze">
													<?=($result['occupation']=='' ? $nullHandler : $result['occupation']);?>
												</td>
											</tr>
											<!--  -->

											<tr class="<?=($accountStatus == 'Corporate') ? '' : 'hide' ?>">
												<th>
													Company Name
												</th>
												<td class="cptlze" colspan="3">
													<?=($result['firstname']=='' ? $nullHandler : $result['firstname']);?>
												</td>
											</tr>
											<tr class="<?=($accountStatus == 'Corporate') ? '' : 'hide' ?>">
												<th>
													Business Address
												</th>
												<td class="cptlze">
													<?=($result['business_address']=='' ? $nullHandler : $result['business_address']);?>
												</td>
												<th>
													Email Address
												</th>
												<td class="cptlze">
													<?=($result['email_add']=='' ? $nullHandler : $result['email_add']);?>
												</td>
											</tr>
											<tr class="<?=($accountStatus == 'Corporate') ? '' : 'hide' ?>">
												<th>
													Office Phone
												</th>
												<td class="cptlze">
													<?=($result['mobile_phone']=='' ? $nullHandler : $result['mobile_phone']);?>
												</td>
												<th>
													TIN
												</th>
												<td class="cptlze">
													<?=($result['corpo_tin']=='' ? $nullHandler : $result['corpo_tin']);?>
												</td>
											</tr>
											<tr>
												<th class="<?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
													Bank name
												</th>
												<td class="cptlze <?=($accountStatus == 'Corporate') ? 'hide' : '' ?>">
													<?=($result['bank_name']=='' ? $nullHandler : $result['bank_name']);?>
												</td>

												<th class="<?=($accountStatus == 'Corporate') ? '' : 'hide' ?>">
													SSS
												</th>
												<td class="cptlze <?=($accountStatus == 'Corporate') ? '' : 'hide' ?>">
													<?=($result['corpo_sss']=='' ? $nullHandler : $result['corpo_sss']);?>
												</td>
												<th>
													Investment Objective
												</th>
												<td>
													<?//=($result['investment_objective']=='' ? $nullHandler : $result['investment_objective']);?>

													<?php if ($result['is_longTermInvestment'] || $result['is_growth'] || $result['is_preservationOfCapital'] || $result['is_speculation']): ?>
														<ul>
															<li><?=(!$result['is_longTermInvestment'] ? "" : "Long Term Investment")?></li>
															<li><?=(!$result['is_growth'] ? "" : "Growth");?></li>
															<li><?=(!$result['is_preservationOfCapital'] ? "" : "Preservation of Capital");?></li>
															<li><?=(!$result['is_speculation'] ? "" : "Speculation");?></li>
														</ul>
													<?php else: ?>
														<?=$nullHandler;?>
													<?php endif ?>
												</td>
											</tr>
											<tr>
												<th>
													Years of Experience in trading
												</th>
												<td>
													<?=($result['years_of_trading']=='' ? $nullHandler : $result['years_of_trading']);?>
												</td>
												<th>
													Source of Income
												</th>
												<td>
													<?php if ($result['is_salary'] || $result['is_business_investments'] || $result['is_inheritance'] || $result['is_remittances'] || $result['is_source_income_others']): ?>
														<ul>
															<li><?=(!$result['is_salary'] ? "" : "Salary")?></li>
															<li><?=(!$result['is_business_investments'] ? "" : "Business/Investments");?></li>
															<li><?=(!$result['is_inheritance'] ? "" : "Inheritance");?></li>
															<li><?=(!$result['is_remittances'] ? "" : "Remittances");?></li>
															<li><?=($result['other_source_income']=='' ? "" : $result['other_source_income']);?></li>
														</ul>
													<?php else: ?>
														<?=$nullHandler;?>
													<?php endif ?>
												</td>
											</tr>
											<tr>
												<th>
													Investment Experience
												</th>
												<td>
													<?php if ($result['is_time_deposit'] || $result['is_bonds'] || $result['is_stocks'] || $result['is_mutual_fund'] || $result['is_uitf'] || $result['is_none'] || $result['is_investment_exp_others']): ?>
														<ul>
															<li><?=(!$result['is_time_deposit'] ? "" : "Time Deposit")?></li>
															<li><?=(!$result['is_bonds'] ? "" : "Bonds");?></li>
															<li><?=(!$result['is_stocks'] ? "" : "Stocks");?></li>
															<li><?=(!$result['is_mutual_fund'] ? "" : "Mutual Fund");?></li>
															<li><?=(!$result['is_uitf'] ? "" : "UITF");?></li>
															<li><?=(!$result['is_none'] ? "" : "None");?></li>
															<li><?=($result['other_investment_exp']=='' ? "" : $result['other_investment_exp']);?></li>
														</ul>
													<?php else: ?>
														<?=$nullHandler;?>
													<?php endif ?>
												</td>
												<th>
													Annual Income
												</th>
												<td>
													<?=($result['annual_income']=='' ? $nullHandler : $result['annual_income']);?>
												</td>
											</tr>
											<tr>
												<th>
													Assets
												</th>
												<td>
													<?=($result['assets']=='' ? $nullHandler : $result['assets']);?>
												</td>
												<th>
													Net Worth
												</th>
												<td>
													<?=($result['net_worth']=='' ? $nullHandler : $result['net_worth']);?>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</li>
						<li class="">
							<a class="collapsible-header waves-effect waves-grey <?= (isset($_GET['openADeposit']) ? 'active' : '') ?>"><i class="material-icons">monetization_on</i> Additional Deposit</a>
							<div class="collapsible-body">
								<div class="row">
									<div class="col s2 offset-s10">
										<a href="#uploadDepositModal" data-target="uploadDepositModal" class="btn waves-effect waves-light modal-trigger">Upload</a>
									</div>
								</div>
								<?php include('includes/addDepositModal.php') ?>
								<div class="row">
									<div class="col s12">
										<table class="bordered highlight">
											<thead>
												<tr>
													<th width="32%">
														File
													</th>
													<th width="15%">
														Bank Name
													</th>
													<th width="15%">
														Amount
													</th>
													<th width="15%">
														Due Date
													</th>
													<th width="16%">
														Amount Reflected
													</th>
													<th width="">
														Email
													</th>
													<th width="">
														Date Uploaded
													</th>
													<th width="10%">
														
													</th>
												</tr>
											</thead>
											<?php $queryAdditionalDepositTable = "SELECT * FROM tbl_additional_deposit WHERE client_id = '$client_id'"; ?>
											<?php if ($resultAdditionalDepositTable = $conn->query($queryAdditionalDepositTable)): ?>
												<tbody>
													<?php while ($rowADT = $resultAdditionalDepositTable->fetch_array()) { ?>
													<tr>
														<td>
															<a href="uploads/<?=$rowADT['file_name']?>" target="_blank"><?=$rowADT['file_name']?></a>
														</td>
														<td class="cptlze">
															<?=$rowADT['bank_name']?>
														</td>
														<td>
															<?=(isset($rowADT['amount']) && $rowADT['amount'] != '' ? $rowADT['amount'] : '')?>
														</td>
														<td>
															<?=$rowADT['due_date']?>
														</td>
														<td>
															<?=(isset($rowADT['amount_reflected']) && $rowADT['amount_reflected'] != '' ? $rowADT['amount_reflected'] : '')?>
														</td>
														<td>
															<?=$rowADT['email']?>
														</td>
														<td>
															<?=($rowADT['dateCreated']=='' ? $nullHandler : (date('m/d/Y',strtotime($rowADT['dateCreated']))));?>
														</td>
														<td class="actions-td">
															<a href="#EditDepositModal" data-trigger="EditDepositModal" class="modal-trigger editDepoLink" data-DepoID='<?=$rowADT['id'];?>' data-fileName="<?=(isset($rowADT['file_name']) ? $rowADT['file_name'] : '')?>" data-bankName="<?=(isset($rowADT['bank_name']) ? $rowADT['bank_name'] : '')?>" data-amount="<?=(isset($rowADT['amount']) ? $rowADT['amount'] : '')?>" data-dueDate="<?=(isset($rowADT['due_date']) ? $rowADT['due_date'] : '')?>" data-amountReflected="<?=(isset($rowADT['amount_reflected']) ? $rowADT['amount_reflected'] : '')?>" data-email="<?=(isset($rowADT['email']) ? $rowADT['email'] : '')?>">Edit</a>
															<a href="?id=<?=$client_id?>&deleteAddDepo=<?=$rowADT['id'];?>" class="danger">Delete</a>
														</td>
													</tr>
													<?php } ?>
												</tbody>
											<?php endif ?>
										</table>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a class="collapsible-header waves-effect waves-grey <?= (isset($_GET['openWRequest']) ? 'active' : '') ?>"><i class="material-icons">local_atm</i> Withdrawal Request</a>
							<div class="collapsible-body">
								<div class="row">
									<div class="col s2 offset-s10">
										<a href="#uploadWithdrawalModal" data-target="uploadWithdrawalModal" class="btn waves-effect waves-light modal-trigger">Upload</a>
									</div>
								</div>
								<?php include('includes/addWithdrawalRequestModal.php') ?>
								<div class="row">
									<div class="col s12">
										<table class="bordered highlight">
											<thead>
												<tr>
													<th width="15%">
														Date of Request
													</th>
													<th width="15%">
														Amount
													</th>
													<th width="15%">
														Due Date
													</th>
													<th width="32%">
														File
													</th>
													<th width="16%">
														Email
													</th>
													<th></th>
												</tr>
											</thead>
											<?php $queryAdditionalDepositTable = "SELECT * FROM tbl_withdrawal_request WHERE client_id = '$client_id'"; ?>
											<?php if ($resultAdditionalDepositTable = $conn->query($queryAdditionalDepositTable)): ?>
												<tbody>
													<?php while ($rowADT = $resultAdditionalDepositTable->fetch_array()) { ?>
													<tr>
														<td>
															<?=$rowADT['date_of_request']?>
														</td>
														<td>
															<?=(isset($rowADT['amount']) && $rowADT['amount'] != '' ? $rowADT['amount'] : '')?>
														</td>
														<td>
															<?=$rowADT['due_date']?>
														</td>
														<td>
															<?php if ($rowADT['file_name']!=''): ?>
																<a href="uploads/<?=$rowADT['file_name']?>" target="_blank"><?=$rowADT['file_name']?></a>	
															<?php endif ?>															
														</td>
														<td>
															<?=$rowADT['email']?>
														</td>
														<td class="actions-td">
															<a href="#EditWithdrawalModal" data-trigger="EditWithdrawalModal" class="modal-trigger editWithdrawalLink" data-widthrawalid="<?=$rowADT['id']?>" data-clientid="<?=$rowADT['client_id']!='' ? $rowADT['client_id'] : '' ?>" data-dateofrequest="<?=$rowADT['date_of_request']!='' ? $rowADT['date_of_request'] : '' ?>" data-amount="<?=$rowADT['amount']!='' ? $rowADT['amount'] : '' ?>" data-duedate="<?=$rowADT['due_date']!='' ? $rowADT['due_date'] : '' ?>" data-filename="<?=$rowADT['file_name']!='' ? $rowADT['file_name'] : '' ?>" data-email="<?=$rowADT['email']!='' ? $rowADT['email'] : '' ?>">Edit</a>
															<a href="client-details?id=<?=$_GET['id']?>&deleteWithdrawalRequest=<?=$rowADT['id']?>" class="danger">Delete</a>
														</td>
													</tr>
													<?php } ?>
												</tbody>
											<?php endif ?>
										</table>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a class="collapsible-header waves-effect waves-grey <?=($_GET['documents'] ? 'active' : '')?>"><i class="material-icons">insert_drive_file</i> Documents</a>
							<div class="collapsible-body">
								<?php include('includes/addDocuModal.php') ?>
								<?php $queryDocu = "SELECT * FROM `tbl_documents` WHERE client_id = '$client_id'";?>
								<?php if ($resultDocu = $conn->query($queryDocu)): 
								$result = $resultDocu->fetch_array();  ?>
									<div class="row">
										<div class="col s12">
											<table class="bordered highlight">
												<tr>
													<td></td>
													<th>Filename</th>
													<td></td>
												</tr>
												<tr>
													<th width="30%">CAIF</th>
													<td>
														<?php if (isset($result['caif'])): ?>
															<?php if ($result['caif'] == ""): ?>
																<a href="#uploadCAIF" data-trigger="uploadCAIF" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
															<?php else: ?>
																<a href="uploads/<?=$result['caif']?>" target="_blank"><?=$result['caif']?></a>
															<?php endif ?>
														<?php else: ?>
															<a href="#uploadCAIF" data-trigger="uploadCAIF" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
														<?php endif ?>
													</td>
													<td class="actions-td">
														<?php if (isset($result['caif'])): ?>
															<?php if ($result['caif'] != ""): ?>
																<a href="#uploadCAIF" data-trigger="uploadCAIF" class="modal-trigger">Update</a>
																<a href="client-details?id=<?=$_GET['id']?>&deleteCAIF=<?=$result['id']?>" class="danger">Delete</a>
															<?php endif; ?>
														<?php endif ?>
													</td>
												</tr>
												<tr class="<?=($accountStatus == 'Corporate' ? '': 'hide')?>">
													<th>CAIF 2</th>
													<td>
														<?php if (isset($result['caif2'])): ?>
															<?php if ($result['caif2'] == ""): ?>
																<a href="#uploadCAIF2" data-trigger="uploadCAIF2" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
															<?php else: ?>
																<a href="uploads/<?=$result['caif2']?>" target="_blank"><?=$result['caif2']?></a>
															<?php endif ?>
														<?php else: ?>
															<a href="#uploadCAIF2" data-trigger="uploadCAIF2" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
														<?php endif ?>
													</td>
													<td class="actions-td">
														<?php if (isset($result['caif2'])): ?>
															<?php if ($result['caif2'] != ""): ?>
																<a href="#uploadCAIF2" data-trigger="uploadCAIF2" class="modal-trigger">Update</a>
																<a href="client-details?id=<?=$_GET['id']?>&deleteCAIF2=<?=$result['id']?>" class="danger">Delete</a>
															<?php endif; ?>
														<?php endif ?>
													</td>
												</tr>
												<tr>
													<th>ID 1</th>
													<td>
														<?php if (isset($result['id1'])): ?>
															<?php if ($result['id1'] == ""): ?>
																<a href="#uploadID1" data-trigger="uploadID1" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
															<?php else: ?>
																<a href="uploads/<?=$result['id1']?>" target="_blank"><?=$result['id1']?></a>
															<?php endif ?>
														<?php else: ?>
															<a href="#uploadID1" data-trigger="uploadID1" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
														<?php endif ?>
													</td>
													<td class="actions-td">
														<?php if (isset($result['id1'])): ?>
															<?php if ($result['id1'] != ""): ?>
																<a href="#uploadID1" data-trigger="uploadID1" class="modal-trigger">Update</a>
																<a href="client-details?id=<?=$_GET['id']?>&deleteid1=<?=$result['id']?>" class="danger">Delete</a>
															<?php endif; ?>
														<?php endif ?>
													</td>
												</tr>
												<tr>
													<th>ID 2</th>
													<td>
														<?php if (isset($result['id2'])): ?>
															<?php if ($result['id2'] == ""): ?>
																<a href="#uploadID2" data-trigger="uploadID2" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
															<?php else: ?>
																<a href="uploads/<?=$result['id2']?>" target="_blank"><?=$result['id2']?></a>
															<?php endif ?>
														<?php else: ?>
															<a href="#uploadID2" data-trigger="uploadID2" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
														<?php endif ?>
													</td>
													<td class="actions-td">
														<?php if (isset($result['id2'])): ?>
															<?php if ($result['id2'] != ""): ?>
																<a href="#uploadID2" data-trigger="uploadID2" class="modal-trigger">Update</a>
																<a href="client-details?id=<?=$_GET['id']?>&deleteid2=<?=$result['id']?>" class="danger">Delete</a>
															<?php endif; ?>
														<?php endif ?>
													</td>
												</tr>
												<tr class="<?=($securityCompany=="AP Securities") ? 'hide': ''?>">
													<th>Proof of Billing</th>
													<td>
														<?php if (isset($result['proof_of_billing'])): ?>
															<?php if ($result['proof_of_billing'] == ""): ?>
																<a href="#uploadProofOfBilling" data-trigger="uploadProofOfBilling" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
															<?php else: ?>
																<a href="uploads/<?=$result['proof_of_billing']?>" target="_blank"><?=$result['proof_of_billing']?></a>
															<?php endif ?>
														<?php else: ?>
															<a href="#uploadProofOfBilling" data-trigger="uploadProofOfBilling" class="btn btn-green waves-effect waves-light modal-trigger">Upload</a>
														<?php endif ?>
													</td>
													<td class="actions-td">
														<?php if (isset($result['proof_of_billing'])): ?>
															<?php if ($result['proof_of_billing'] != ""): ?>
																<a href="#uploadProofOfBilling" data-trigger="uploadProofOfBilling" class="modal-trigger">Update</a>
																<a href="client-details?id=<?=$_GET['id']?>&deleteProofOfBilling=<?=$result['id']?>" class="danger">Delete</a>
															<?php endif; ?>
														<?php endif ?>
													</td>
												</tr>
												<tr>
													<th>Bank Certificate</th>
													<td>
														<?php if (isset($result['bank_certificate'])): ?>
															<?php if ($result['bank_certificate'] == ""): ?>
																<a href="#uploadBankCert" data-trigger="uploadBankCert" class="btn btn-green wave-effect wave-light modal-trigger">Upload</a>
															<?php else: ?>
																<a href="uploads/<?=$result['bank_certificate']?>" target="_blank"><?=$result['bank_certificate']?></a>
															<?php endif ?>
														<?php else: ?>
															<a href="#uploadBankCert" data-trigger="uploadBankCert" class="btn btn-green wave-effect wave-light modal-trigger">Upload</a>
														<?php endif ?>
													</td>
													<td class="actions-td">
														<?php if (isset($result['bank_certificate'])): ?>
															<?php if ($result['bank_certificate'] != ""): ?>
																<a href="#uploadBankCert" data-trigger="uploadBankCert" class="modal-trigger">Update</a>
																<a href="client-details?id=<?=$_GET['id']?>&deleteBankCert=<?=$result['id']?>" class="danger">Delete</a>
															<?php endif; ?>
														<?php endif ?>
													</td>
												</tr>
												<tr class="" style="background-color: transparent;">
													<td colspan="3">&nbsp;</td>
												</tr>
												<tr class="" style="background-color: transparent;">
													<td colspan="3" class="right-align">
														<a href="#uploadCorpoOtherDocu" data-target="uploadCorpoOtherDocu" class="btn waves-effect waves-light modal-trigger">Add Additional Document</a>
													</td>
												</tr>
												<?php 
												$queryGetCorpoDocu = "SELECT * FROM `tbl_corp_docu` WHERE `client_id` = '$client_id'";
												$resultGetCorpoDocu = $conn->query($queryGetCorpoDocu) ?>

												<?php if ($resultGetCorpoDocu->num_rows > 0): ?>
													<tr>
														<th>Filename</th>
														<th colspan="2">Action</th>

													</tr>
													<?php while($rowGCD = $resultGetCorpoDocu->fetch_array()): ?>
														<tr>
															<td><a target="_blank" href="uploads/<?=$rowGCD['file_name']?>"><?=$rowGCD['file_name']?></a></td>
															<td colspan="2" class="actions-td">
																<a href="client-details?id=<?=$_GET['id']?>&deleteCorpoAdditionalDocu=<?=$rowGCD['id']?>" class="danger">Delete</a>
															</td>
														</tr>
													<?php endwhile; ?>
												<?php endif;  ?>
											</table>
										</div>
									</div>
								<?php endif ?>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">	
			<div class="col s8 offset-s2 right-align">
				<a href="edit-client?id=<?=$client_id?>" class="btn">Edit</a>
				<a href="clients" class="btn grey lighten-1">Back</a>
			</div>
		</div>
	</div>
		
<?php include('footer.php') ?>

