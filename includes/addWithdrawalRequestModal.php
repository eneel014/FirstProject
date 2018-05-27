<div id="uploadWithdrawalModal" class="modal addDepositModal">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Withdrawal Request</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s6 col input-field">
					<input id="txtDateOfRequest" name="txtDateOfRequest" required value="<?php echo (isset($_POST['txtDateOfRequest']) ? $_POST['txtDateOfRequest'] : ''); ?>" type="text" class="datepicker">
					<label for="txtDateOfRequest">Date of Request</label>
				</div>
				<div class="s6 col input-field">
					<input id="txtWidthrawalAmount" name="txtWidthrawalAmount" required value="<?php echo (isset($_POST['txtWidthrawalAmount']) ? $_POST['txtWidthrawalAmount'] : ''); ?>" type="text" class="validate">
					<label for="txtWidthrawalAmount">Amount</label>
				</div>
			</div>
			<div class="row">
				<div class="s6 col input-field">
					<input id="txtWithdrawalDueDate" name="txtWithdrawalDueDate" required value="<?php echo (isset($_POST['txtWithdrawalDueDate']) ? $_POST['txtWithdrawalDueDate'] : ''); ?>" type="text" class="datepicker">
					<label for="txtWithdrawalDueDate">Due Date</label>
				</div>
				<div class="s6 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="widthdrawFileDeposit" name="widthdrawFileDeposit" value="<?php echo (isset($_POST['widthdrawFileDeposit']) ? $_POST['widthdrawFileDeposit'] : ''); ?>" class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="s6 col input-field">
					<input id="txtWithdrawalEmail" name="txtWithdrawalEmail" value="<?php echo (isset($_POST['txtWithdrawalEmail']) ? $_POST['txtWithdrawalEmail'] : ''); ?>" type="text" class="datepicker">
					<label for="txtWithdrawalEmail">Email</label>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnWModal" id="btnWModal" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>
<?php if (isset($_POST['btnWModal'])): ?>
	<?php
	$widthrawDateOfRequest = (isset($_POST['txtDateOfRequest']) ? $fileNames = htmlspecialchars($_POST['txtDateOfRequest'],ENT_QUOTES) : "");
	$widthrawAmount = (isset($_POST['txtWidthrawalAmount']) ? $fileNames = htmlspecialchars($_POST['txtWidthrawalAmount'],ENT_QUOTES) : "");
	$widthrawDueDate = (isset($_POST['txtWithdrawalDueDate']) ? $fileNames = htmlspecialchars($_POST['txtWithdrawalDueDate'],ENT_QUOTES) : "");
	$widthrawEmail = (isset($_POST['txtWithdrawalEmail']) ? $fileNames = htmlspecialchars($_POST['txtWithdrawalEmail'],ENT_QUOTES) : "");

	$clientID = $result['id'];
	if (isset($_FILES['widthdrawFileDeposit']) && $_FILES['widthdrawFileDeposit']['size'] != 0) {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["widthdrawFileDeposit"]["name"]);
		$ext = pathinfo($_FILES["widthdrawFileDeposit"]["name"], PATHINFO_EXTENSION);
		$thisDate = new DateTime();
		$thisDate = $thisDate->format('YmdH');
		$fileName = $clientID."-".$thisDate." ".$_FILES["widthdrawFileDeposit"]["name"];
		$fileName = str_replace(" ","-",$fileName);
		if (move_uploaded_file($_FILES["widthdrawFileDeposit"]["tmp_name"], $target_dir . $fileName)) {
			$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
			$addWithdrawalQuery = "INSERT INTO `tbl_withdrawal_request` (
				`client_id`,
				`date_of_request`,
				`amount`,
				`due_date`,
				`file_name`,
				`email`,
				`emp_id`
				) VALUES (
				'$clientID',
				'$widthrawDateOfRequest',
				'$widthrawAmount',
				'$widthrawDueDate',
				'$fileNames',
				'$widthrawEmail',
				2)";

			ueAuditFnc("$logName", "UPLOADED Withdrawal Request for", "$clientID", $conn);

			$addWithdrawalQuery = $conn->query($addWithdrawalQuery);
			?>
			<script type="text/javascript">
				window.location.href="client-details?id=<?=$clientID?>&successUpload";
			</script>
			<?php
		} else {
			echo "There was an error uploading your file.";
		}
	} else {
		$addWithdrawalQuery = "INSERT INTO `tbl_withdrawal_request` (
			`client_id`,
			`date_of_request`,
			`amount`,
			`due_date`,
			`email`,
			`emp_id`
			) VALUES (
			'$clientID',
			'$widthrawDateOfRequest',
			'$widthrawAmount',
			'$widthrawDueDate',
			'$widthrawEmail',
			2)";
		$addWithdrawalQuery = $conn->query($addWithdrawalQuery);
		?>
		<script type="text/javascript">
			window.location.href="client-details?id=<?=$clientID?>&other";
		</script>
		<?php
	}

	?>
<?php endif ?>

<div id="EditWithdrawalModal" class="modal addDepositModal">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Update Witdhrawal Request</h5>
			<div class="divider"></div><br>
			<div class="row">
				<input type="hidden" name="wID" id="wID">
				<input type="hidden" name="defaultFileName" id="defaultFileName">
				<div class="s6 col input-field">
					<input id="txtEditDateOfRequest" name="txtEditDateOfRequest" required value="<?php echo (isset($_POST['txtEditDateOfRequest']) ? $_POST['txtEditDateOfRequest'] : ''); ?>" type="text" class="datepicker">
					<label for="txtEditDateOfRequest">Date of Request</label>
				</div>
				<div class="s6 col input-field">
					<input id="txtEditWidthrawalAmount" name="txtEditWidthrawalAmount" required value="<?php echo (isset($_POST['txtEditWidthrawalAmount']) ? $_POST['txtEditWidthrawalAmount'] : ''); ?>" type="text" class="validate">
					<label for="txtEditWidthrawalAmount">Amount</label>
				</div>
			</div>
			<div class="row">
				<div class="s6 col input-field">
					<input id="txtEditWithdrawalDueDate" name="txtEditWithdrawalDueDate" required value="<?php echo (isset($_POST['txtEditWithdrawalDueDate']) ? $_POST['txtEditWithdrawalDueDate'] : ''); ?>" type="text" class="datepicker">
					<label for="txtEditWithdrawalDueDate">Due Date</label>
				</div>
				<div class="s6 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="EditwidthdrawFileDeposit" name="EditwidthdrawFileDeposit" value="<?php echo (isset($_POST['EditwidthdrawFileDeposit']) ? $_POST['EditwidthdrawFileDeposit'] : ''); ?>" class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="s6 col input-field">
					<input id="txtEditWithdrawalEmail" name="txtEditWithdrawalEmail" value="<?php echo (isset($_POST['txtEditWithdrawalEmail']) ? $_POST['txtEditWithdrawalEmail'] : ''); ?>" type="text" class="datepicker">
					<label for="txtEditWithdrawalEmail">Email</label>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnEditWModal" id="btnEditWModal" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>
<?php if (isset($_POST['btnEditWModal'])): ?>
<?php
$widthrawDateOfRequest = (isset($_POST['txtEditDateOfRequest']) ? htmlspecialchars($_POST['txtEditDateOfRequest'],ENT_QUOTES) : "");
$widthrawAmount = (isset($_POST['txtEditWidthrawalAmount']) ? htmlspecialchars($_POST['txtEditWidthrawalAmount'],ENT_QUOTES) : "");
$widthrawDueDate = (isset($_POST['txtEditWithdrawalDueDate']) ? htmlspecialchars($_POST['txtEditWithdrawalDueDate'],ENT_QUOTES) : "");
$widthrawEmail = (isset($_POST['txtEditWithdrawalEmail']) ? htmlspecialchars($_POST['txtEditWithdrawalEmail'],ENT_QUOTES) : "");
$wID = $_POST['wID'];
$empID = $_COOKIE['empID'];
$clientID = $result['id'];
if (isset($_FILES['EditwidthdrawFileDeposit']) && $_FILES['EditwidthdrawFileDeposit']['size'] != 0) {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["EditwidthdrawFileDeposit"]["name"]);
	$ext = pathinfo($_FILES["EditwidthdrawFileDeposit"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["EditwidthdrawFileDeposit"]["name"];
	$fileName = str_replace(" ","-",$fileName);
	if (move_uploaded_file($_FILES["EditwidthdrawFileDeposit"]["tmp_name"], $target_dir . $fileName)) {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		$addWithdrawalQuery = "UPDATE `tbl_withdrawal_request` SET
			`file_name` = '$fileNames',
			`date_of_request` = '$widthrawDateOfRequest',
			`amount` = '$widthrawAmount',
			`due_date` = '$widthrawDueDate',
			`email` = '$widthrawEmail',
			`emp_id` = '$empID' WHERE id = '$wID'";

		ueAuditFnc("$logName", "UPDATED Withdrawal Request for", "$clientID", $conn);
		$addWithdrawalQuery = $conn->query($addWithdrawalQuery);
		?>
		<script type="text/javascript">
			window.location.href="client-details?id=<?=$clientID?>";
		</script>
		<?php
	} else {
		echo "There was an error uploading your file.";
	}
} else {
	$addWithdrawalQuery = "UPDATE `tbl_withdrawal_request` SET
		`date_of_request` = '$widthrawDateOfRequest',
		`amount` = '$widthrawAmount',
		`due_date` = '$widthrawDueDate',
		`email` = '$widthrawEmail',
		`emp_id` = '$empID' WHERE id = '$wID'";
	$addWithdrawalQuery = $conn->query($addWithdrawalQuery);
	?>
	<script type="text/javascript">
		window.location.href="client-details?id=<?=$clientID?>";
	</script>
	<?php
}

?>
<?php endif ?>


<?php if (isset($_GET['deleteWithdrawalRequest'])): ?>
	<?php
	$withdrawalID = $_GET['deleteWithdrawalRequest'];
	
	$deleteDocuQuery = "SELECT * FROM `tbl_withdrawal_request` WHERE id ='$withdrawalID'";
	$result = $conn->query($deleteDocuQuery);
	$result = $result->fetch_array();
	$fName = $result['file_name'];
	$path = "uploads/".$fName;
	unlink($path);
	$clientID = $_GET['id'];
	ueAuditFnc("$logName", "DELETED Withdrawal Request from", "$clientID", $conn);
	$deleteDocuQuery = "DELETE FROM `tbl_withdrawal_request` WHERE id ='$withdrawalID'";
	$result = $conn->query($deleteDocuQuery);
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id'];?>&deleteSuccess=<?=$fName?>";
	</script>
<?php endif ?>