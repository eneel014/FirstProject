<div id="uploadDepositModal" class="modal addDepositModal">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Additional Deposit</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s6 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="fileDeposit" name="fileDeposit" value="<?php echo (isset($_POST['fileDeposit']) ? $_POST['fileDeposit'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
				<div class="s6 col input-field">
					<input id="txtBankName" name="txtBankName" required value="<?php echo (isset($_POST['txtBankName']) ? $_POST['txtBankName'] : ''); ?>" type="text" class="validate">
					<label for="txtBankName">Bank Name</label>
				</div>
			</div>
			<div class="row">
				<div class="s6 col input-field">
					<input id="txtAmount" name="txtAmount" required value="<?php echo (isset($_POST['txtAmount']) ? $_POST['txtAmount'] : ''); ?>" type="text" class="validate">
					<label for="txtAmount">Amount</label>
				</div>
				<div class="s6 col input-field">
					<input id="txtDueDate" name="txtDueDate" required value="<?php echo (isset($_POST['txtDueDate']) ? $_POST['txtDueDate'] : ''); ?>" type="text" class="datepicker">
					<label for="txtDueDate">Due Date</label>
				</div>
			</div>
			<div class="row">
				<div class="s6 col input-field">
					<input id="txtAmountReflected" name="txtAmountReflected" value="<?php echo (isset($_POST['txtAmountReflected']) ? $_POST['txtAmountReflected'] : ''); ?>" type="text" class="validate">
					<label for="txtAmountReflected">Amount Reflected</label>
				</div>
				<div class="s6 col input-field">
					<input id="txtEmail" name="txtEmail" value="<?php echo (isset($_POST['txtEmail']) ? $_POST['txtEmail'] : ''); ?>" type="text" class="">
					<label for="txtEmail">Email</label>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnDepositModal" id="btnDepositModal" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>


<?php if (isset($_POST['btnDepositModal'])): ?>
	<?php
	$depobankName = (isset($_POST['txtBankName']) ? htmlspecialchars($_POST['txtBankName'],ENT_QUOTES) : "");
	$depoamount = (isset($_POST['txtAmount']) ? htmlspecialchars($_POST['txtAmount'],ENT_QUOTES) : "");
	$depodueDate = (isset($_POST['txtDueDate']) ? htmlspecialchars($_POST['txtDueDate'],ENT_QUOTES) : "");
	$depoamountReflected = (isset($_POST['txtAmountReflected']) ? htmlspecialchars($_POST['txtAmountReflected'],ENT_QUOTES) : "");
	$depoemail = (isset($_POST['txtEmail']) ? htmlspecialchars($_POST['txtEmail'],ENT_QUOTES) : "");

	$clientID = $result['id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileDeposit"]["name"]);
	$ext = pathinfo($_FILES["fileDeposit"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["fileDeposit"]["name"];
	$fileName = str_replace(" ","-",$fileName);
	if (move_uploaded_file($_FILES["fileDeposit"]["tmp_name"], $target_dir . $fileName)) {
		$fileName = htmlspecialchars($fileName,ENT_QUOTES);
		$addDepositQuery = "INSERT INTO `tbl_additional_deposit` (
			`client_id`,
			`file_name`,
			`bank_name`,
			`amount`,
			`due_date`,
			`amount_reflected`,
			`email`,
			`employee_id`
			) VALUES (
			'$clientID',
			'$fileName',
			'$depobankName',
			'$depoamount',
			'$depodueDate',
			'$depoamountReflected',
			'$depoemail',
			2)";

		ueAuditFnc("$logName", "UPLOADED Additional Deposit for", "$clientID", $conn);
		$addDepositQuery = $conn->query($addDepositQuery);
		?>
		<script type="text/javascript">
			window.location.href="client-details?id=<?=$clientID?>";
		</script>
		<?php
	} else {
		echo "There was an error uploading your file.";
	}
	?>
<?php endif ?>

<div id="EditDepositModal" class="modal EditDepositModal">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Update Additional Deposit</h5>
			<div class="divider"></div><br>
			<div class="row">
				<!-- <div class="s6 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="editFileDeposit" name="editFileDeposit" value="<?php //echo (isset($_POST['editFileDeposit']) ? $_POST['editFileDeposit'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div> -->
				<input type="hidden" id="depoID" name="depoID">
				<div class="s12 col input-field">
					<input id="EditBankName" name="EditBankName" required value="<?php echo (isset($_POST['EditBankName']) ? $_POST['EditBankName'] : ''); ?>" type="text" class="validate">
					<label for="EditBankName">Bank Name</label>
				</div>
			</div>
			<div class="row">
				<div class="s6 col input-field">
					<input id="EditAmount" name="EditAmount" required value="<?php echo (isset($_POST['EditAmount']) ? $_POST['EditAmount'] : ''); ?>" type="text" class="validate">
					<label for="EditAmount">Amount</label>
				</div>
				<div class="s6 col input-field">
					<input id="EditDueDate" name="EditDueDate" required value="<?php echo (isset($_POST['EditDueDate']) ? $_POST['EditDueDate'] : ''); ?>" type="text" class="datepicker">
					<label for="EditDueDate">Due Date</label>
				</div>
			</div>
			<div class="row">
				<div class="s6 col input-field">
					<input id="EditAmountReflected" name="EditAmountReflected" value="<?php echo (isset($_POST['EditAmountReflected']) ? $_POST['EditAmountReflected'] : ''); ?>" type="text" class="validate">
					<label for="EditAmountReflected">Amount Reflected</label>
				</div>
				<div class="s6 col input-field">
					<input id="txtEditEmail" name="txtEditEmail" value="<?php echo (isset($_POST['txtEditEmail']) ? $_POST['txtEditEmail'] : ''); ?>" type="text" class="">
					<label for="txtEditEmail">Email</label>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnEditDepositModal" id="btnEditDepositModal" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>


<?php if (isset($_POST['btnEditDepositModal'])): ?>
	<?php
	$depobankName = (isset($_POST['EditBankName']) ? htmlspecialchars($_POST['EditBankName'],ENT_QUOTES) : "");
	$depoamount = (isset($_POST['EditAmount']) ? htmlspecialchars($_POST['EditAmount'],ENT_QUOTES) : "");
	$depodueDate = (isset($_POST['EditDueDate']) ? htmlspecialchars($_POST['EditDueDate'],ENT_QUOTES) : "");
	$depoamountReflected = (isset($_POST['EditAmountReflected']) ? htmlspecialchars($_POST['EditAmountReflected'],ENT_QUOTES) : "");
	$depoemail = (isset($_POST['txtEditEmail']) ? htmlspecialchars($_POST['txtEditEmail'],ENT_QUOTES) : "");
	$depoID = $_POST['depoID'];
	$empID = $_COOKIE['empID'];


	$clientID = $result['id'];

	$EditDepositQuery = "UPDATE `tbl_additional_deposit` SET
		`bank_name` = '$depobankName',
		`amount` = '$depoamount',
		`due_date` = '$depodueDate',
		`amount_reflected` = '$depoamountReflected',
		`email` = '$depoemail',
		`employee_id` = '$empID' WHERE 
		`id` = '$depoID'";

	ueAuditFnc("$logName", "UPDATED Additional Deposit from", "$clientID", $conn);
	$EditDepositQuery = $conn->query($EditDepositQuery);
		?>
		<script type="text/javascript">
			// window.location.href="client-details?id=<?=$clientID?>";
		</script>

<?php endif ?>


<?php if (isset($_GET['deleteAddDepo'])): ?>
	<?php
	$depoID = $_GET['deleteAddDepo'];
	$deleteDocuQuery = "SELECT * FROM `tbl_additional_deposit` WHERE id ='$depoID'";
	$result = $conn->query($deleteDocuQuery);
	$result = $result->fetch_array();
	$fName = $result['file_name'];
	$path = "uploads/".$fName;
	unlink($path);
	$deleteDocuQuery = "DELETE FROM `tbl_additional_deposit` WHERE id ='$depoID'";
	$result = $conn->query($deleteDocuQuery);
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id'];?>&deleteSuccess=<?=$fName?>";
	</script>
<?php endif ?>