<?php $pageTitle = "Clients"; ?>
<?php $bodyClass = "client-list" ?>
<?php $bCrumbs = "Clients List"; ?>
<?php $navActive = "clients" ?>
<?php include('header.php'); 
include('includes/mysql_connect.php'); ?>
	<div class="section">

		
		<h2 class="heading center">Clients Information Entry</h2>
		<div class="row">
			<?php if (isset($_GET['deleteSuccessful'])): ?>
				<!-- <div class="row scale-transition"> -->
					<div class="deleteSuccessMessage col s3 offset-s1 red lighten-2 card-panel scale-transition white-text" style="position: absolute;">
						<p><i class="material-icons" style="vertical-align: bottom;">info_outline</i> Record had been successfully removed <a href="#!" class="right white-text"><i class="close material-icons">close</i></a></p>
					</div>
					<script>
						$(document).ready(function() {
							$('.deleteSuccessMessage').click(function() {
								$('.deleteSuccessMessage').addClass('scale-out');
								$('.deleteSuccessMessage')
							});
						});
					</script>
				<!-- </div> -->
			<?php endif ?>
			<div class="col s3 right center"><!-- <a class="waves-effect waves-light btn"><i class="material-icons left">person_add</i> Add Client</a> -->
				<a class="dropdown-trigger btn" href="#" data-activates="dropdown1"><i class="material-icons left">person_add</i> Add Client</a>
				<ul id='dropdown1' class='dropdown-content'>
					<li><a href="addClient?type=Opening">Opening</a></li>
					<li><a href="addClient?type=Potential">Potential</a></li>
				</ul>
        
			</div>
		</div>
		
		<div class="row">
			<div class="col s12">
				<table class="responsive-table centered highlight" id="client-listing">
					<thead>
						<tr>
							<th>#</th>
							<th style=" width: 5%">Mr/Ms</th>
							<th style="width: 11%">Name</th>
							<th style="width: 11%">User ID</th>
							<th style="width: 15%;">Email Address</th>
							<th style=" width: 7%">Account Type</th>
							<th style="width: 15%">Security Company</th>
							<th style=" width: 6%">Status</th>
							<th style="width: 10%">Remarks</th>
							<th style="width: 14%">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$query = "SELECT * FROM tbl_clients";
							if ($result = $conn->query($query)) {
								include('includes/checkRemarks.php');
								$clientCntr = 0;
								while ($r = $result->fetch_array()) {
									$thisID = $r['id'];
									$incDocuQuery = "SELECT * FROM `tbl_documents` WHERE client_id = '$thisID'";
									$incDocuResult = $conn->query($incDocuQuery); 
									 ?>
									<tr class="<?=($r['status'] == 'Corporate' ? 'yellow lighten-4' : '' )?> <?=($r['status'] == 'Fund' ? 'blue lighten-4' : '' )?>">
										<td><?=++$clientCntr;?></td>
										<td class="cptlze">
										<?=$r['gender']=='Male' ? ("Mr.") : ($r['gender']=='Female' ? "Ms." : "" )?></td>
										<td><a href="client-details?id=<?=$r['id']?>"><?=trim($r['firstname'])." ".$r['lastname'];?></a></td>
										<td><?=$r['user_id']?></td>
										<td><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=<?=$r['email_add']?>" target="_blank"><?=$r['email_add']?></a></td>
										<td><?=$r['status']?></td>
										<td style="text-transform: uppercase;"><?=$r['security_company']?></td>
										<td><?=$r['account_status']?></td>
										<td class="remarks-td">
											<?php $incompleteDocu = incompleteDocument($incDocuResult, $r['security_company'])?>
											<?=($incompleteDocu ? '<a href="client-details?id='.$r['id'].'&documents=1" class="btn green waves-effect waves-light lighten-1">'.$incompleteDocu.' Incomplete Docu</a>' : '') ?>
											<?=(incompleteInfo($r) ? '<a href="client-details?id='.$r['id'].'&personalDetail=1" class="btn red lighten-1 waves-effect waves-light">'.incompleteInfo($r).' Incomplete Info</a>' : '') ?>
											
										</td>
										<td class="actions-td">
											<div class="delete-container scale-transition scale-out grey lighten-1 z-depth-3">
												<p>Are you sure you want to delete this row?</p>
												<?php if ($_COOKIE['cooUserType'] == 3): ?>
													<a href="requestDeleteClient?id=<?=$r['id']?>" class="btn waves-effect red lighten-2 waves-light">yes</a>
												<?php else: ?>
													<a href="deleteClient?id=<?=$r['id']?>" class="btn waves-effect red lighten-2 waves-light">yes</a>
												<?php endif ?>
												<a href="#!" class="btn waves-effect waves-light cancel">no</a>
											</div>
											<a href="client-details?id=<?=$r['id']?>">View</a>
											<a href="edit-client?id=<?=$r['id']?>" class="">Edit</a>
											<a href="#!" class="danger deleteClient">Delete</a>
										</td>
									</tr>
								<?php
								}
							}
							
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php include('footer.php') ?>