<?php $pageTitle = "Accounts"; ?>
<?php $bodyClass = "accounts-list" ?>
<?php $navActive = "accounts" ?>
<?php include('header.php'); ?>
	<div class="section">

		
		<h2 class="heading center">Accounts</h2>
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
			<div class="col s8 offset-s2 right-align"><!-- <a class="waves-effect waves-light btn"><i class="material-icons left">person_add</i> Add Client</a> -->
				<a class="btn modal-trigger waves-light waves-effect" href="#addAccount" data-trigger="addAccount"><i class="material-icons left">person_add</i> Add Account</a>
			</div>
		</div>
		
		<div class="row">
			<div class="col s8 offset-s2">
				<table class="responsive-table highlight" id="account-listing">
					<thead>
						<tr>
							<th width="20%">Username</th>
							<th width="20%">Name</th>
							<th width="15%">User Type</th>
							<th width="15%"></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							include('includes/mysql_connect.php');
							$query = "SELECT * FROM tbl_users WHERE user_id != 1";
							if ($result = $conn->query($query)) {
								while ($r = $result->fetch_array()) { ?>
									<tr>
										<td><?=$r['username']?></td>
										<td><?=$r['lastname']?> <?=$r['firstname']?></td>
										<td><?=($r['user_type']==1 ? 'Global Administrator' : (($r['user_type']==2) ? 'Employee' : ((($r['user_type']==3) ? 'OJT' : ''))))?></td>
										<td class="actions-td center">
											<div class="delete-container scale-transition scale-out grey lighten-1 z-depth-3">
												<p>Are you sure you want to delete this row?</p>
												<a href="deleteClient?id=<?=$r['user_id']?>" class="btn waves-effect red lighten-2 waves-light">yes</a>
												<a href="#!" class="btn waves-effect waves-light cancel">no</a>
											</div>
											<a href="#editAccount" data-trigger="addAccount" data-accountid="<?=$r['user_id']?>" data-user="<?=$r['username']?>" data-lname="<?=$r['lastname']?>" data-fname="<?=$r['firstname']?>" data-utype="<?=$r['user_type']?>" id="" class="editAccountLink modal-trigger">Edit</a>
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

		<div class="add-acount modal" id="addAccount">
			<form method="POST">
				<div class="modal-content">
					<div class="row">
						<div class="col s4 offset-s2 input-field">
							<input id="txtFirstName" name="txtFirstName" required value="<?php echo (isset($_POST['txtFirstName']) ? $_POST['txtFirstName'] : ''); ?>" type="text" class="validate">
							<label for="txtFirstName">First Name</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtLastName" name="txtLastName" value="<?php echo (isset($_POST['txtLastName']) ? $_POST['txtLastName'] : ''); ?>" type="text" class="validate">
							<label for="txtLastName">Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="col s4 offset-s2 input-field">
							<input id="txtUsername" name="txtUsername" required value="<?php echo (isset($_POST['txtUsername']) ? $_POST['txtUsername'] : ''); ?>" type="text" autocomplete="new-password" class="validate">
							<label for="txtUsername">Username</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtPassword" name="txtPassword" required value="<?php echo (isset($_POST['txtPassword']) ? $_POST['txtPassword'] : ''); ?>" type="password" autocomplete="new-password" class="validate">
							<label for="txtPassword">Password</label>
						</div>
					</div>
					<div class="row">
						<div class="col s8 offset-s2">
							<label>Account Type</label>
							<select class="browser-default" name="slcAccountType" required id="slcAccountType">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcAccountType']) ? ($_POST['slcAccountType']=="1" ? "selected" : "") : '') ?> value="1">Global Administrator</option>
								<option <?=(isset($_POST['slcAccountType']) ? ($_POST['slcAccountType']=="2" ? "selected" : "") : '') ?> value="2">Employee</option>
								<option <?=(isset($_POST['slcAccountType']) ? ($_POST['slcAccountType']=="3" ? "selected" : "") : '') ?> value="3">OJT</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s8 offset-s2 right-align">
							<input type="submit" id="btnAddAccount" name="btnAddAccount" class="btn waves-light waves-effect">
							<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>	
						</div>
					</div>
				</div>
			</form>
		</div>

		<div class="edit-acount modal" id="editAccount">
			<form method="POST">
				<input type="hidden" id="accountID" name="accountID">
				<div class="modal-content">
					<div class="row">
						<div class="col s4 offset-s2 input-field">
							<input id="txtEditFirstName" name="txtEditFirstName" required value="<?php echo (isset($_POST['txtEditFirstName']) ? $_POST['txtEditFirstName'] : ''); ?>" type="text" class="validate">
							<label for="txtEditFirstName" class="active">First Name</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtEditLastName" name="txtEditLastName" value="<?php echo (isset($_POST['txtEditLastName']) ? $_POST['txtEditLastName'] : ''); ?>" type="text" class="validate">
							<label for="txtEditLastName" class="active">Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="col s4 offset-s2 input-field">
							<input id="txtEditUsername" name="txtEditUsername" required value="<?php echo (isset($_POST['txtEditUsername']) ? $_POST['txtEditUsername'] : ''); ?>" type="text" autocomplete="new-password" class="validate">
							<label for="txtEditUsername" class="active">Username</label>
						</div>
						<div class="col s4">
							<label>Account Type</label>
							<select class="browser-default" name="slcEditAccountType" required id="slcEditAccountType">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcEditAccountType']) ? ($_POST['slcEditAccountType']=="1" ? "selected" : "") : '') ?> value="1">Global Administrator</option>
								<option <?=(isset($_POST['slcEditAccountType']) ? ($_POST['slcEditAccountType']=="2" ? "selected" : "") : '') ?> value="2">Employee</option>
								<option <?=(isset($_POST['slcEditAccountType']) ? ($_POST['slcEditAccountType']=="3" ? "selected" : "") : '') ?> value="3">OJT</option>
							</select>
							<!-- <input id="txtEditPassword" name="txtEditPassword" required value="<?php //echo (isset($_POST['txtEditPassword']) ? $_POST['txtEditPassword'] : ''); ?>" type="password" autocomplete="new-password" class="validate"> -->
							<!-- <label for="txtEditPassword" class="active">Password</label> -->
						</div>
					</div>
					<div class="row">
						<div class="col s8 offset-s2">
							<p>
								<input type="checkbox" name="chckResetPass" <?=isset($_POST['chckResetPass']) ? 'checked' : '' ?> id="chckResetPass" />
								<label for="chckResetPass">Reset Password?</label>
								- <small>w3lcome1</small>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col s8 offset-s2 right-align">
							<input type="submit" id="btnEditAccount" name="btnEditAccount" class="btn waves-light waves-effect">
							<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>	
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php if (isset($_POST['btnAddAccount'])): 
		$firstname = $_POST['txtFirstName'];
		$lastname = ($_POST['txtLastName'] ? $_POST['txtLastName'] : '');
		$username = $_POST['txtUsername'];
		$password = $_POST['txtPassword'];
		$usertype = $_POST['slcAccountType'];
		$addAccountQuery = "SELECT * FROM `tbl_users` WHERE username = '$username'";
		$result = $conn->query($addAccountQuery);
		if ($result->num_rows > 0) {
			?>

			<script type="text/javascript">
				alert("Username already taken.");
			</script>

			<?php
		} else {
			$addAccountQuery = "INSERT INTO `tbl_users` (`username`, `password`, `user_type`, `firstname`, `lastname`)
								VALUES ('$username', sha1('$password'), '$usertype', '$firstname', '$lastname')";
			$result = $conn->query($addAccountQuery);
		?>
		<script type="text/javascript">
			window.location.href = "accounts?newAccountAdded";
		</script>


	<?php 
		}
		endif; ?>
	<?php if (isset($_POST['btnEditAccount'])): 

		$uID = $_POST['accountID'];
		$firstname = $_POST['txtEditFirstName'];
		$lastname = ($_POST['txtEditLastName'] ? $_POST['txtEditLastName'] : '');
		$username = $_POST['txtEditUsername'];
		$usertype = $_POST['slcEditAccountType'];
		$addAccountQuery = "SELECT * FROM `tbl_users` WHERE username = '$username' AND user_id != '$uID'";
		$result = $conn->query($addAccountQuery);
		if ($result->num_rows > 0) {
			?>

			<script type="text/javascript">
				alert("Username already taken.");
			</script>

			<?php
		} else {
			if (isset($_POST['chckResetPass'])) {
				$defaultPass = 'w3lcome1';
				$addAccountQuerys = "UPDATE `tbl_users` SET `username` = '$username',`password` = sha1('$defaultPass'), `user_type` = '$usertype', `firstname` = '$firstname', `lastname` = '$lastname' WHERE user_id = '$uID'";
			} else {
				$addAccountQuerys = "UPDATE `tbl_users` SET `username` = '$username', `user_type` = '$usertype', `firstname` = '$firstname', `lastname` = '$lastname' WHERE user_id = '$uID'";
			}
			$result = $conn->query($addAccountQuerys);
			// print_r($conn);
			// echo "<br />$uID";
		?>
		<script type="text/javascript">
			// window.location.href = "accounts?newAccountAdded";
		</script>


	<?php 
		}
		endif; ?>
<?php include('footer.php') ?>