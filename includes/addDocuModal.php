<div id="uploadCorpoOtherDocu" class="modal uploadCorpoOtherDocu">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Additional Document</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s12 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="corpoAdditionalDocu" name="corpoAdditionalDocu" value="<?php echo (isset($_POST['corpoAdditionalDocu']) ? $_POST['corpoAdditionalDocu'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnCorpoAdditional" id="btnCorpoAdditional" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>

<div id="uploadCAIF" class="modal uploadCAIF">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Upload CAIF</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s12 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="docuCAIF" name="docuCAIF" value="<?php echo (isset($_POST['docuCAIF']) ? $_POST['docuCAIF'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnCAIFUpload" id="btnCAIFUpload" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>

<div id="uploadCAIF2" class="modal uploadCAIF2">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Upload CAIF 2</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s12 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="docuCAIF2" name="docuCAIF2" value="<?php echo (isset($_POST['docuCAIF2']) ? $_POST['docuCAIF2'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnCAIFUpload2" id="btnCAIFUpload2" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>

<div id="uploadID1" class="modal uploadID1">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Upload ID 1</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s12 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="docuID1" name="docuID1" value="<?php echo (isset($_POST['docuID1']) ? $_POST['docuID1'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnUploadID1" id="btnUploadID1" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>

<div id="uploadID2" class="modal uploadID2">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Upload ID 2</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s12 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="docuID2" name="docuID2" value="<?php echo (isset($_POST['docuID2']) ? $_POST['docuID2'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnUploadID2" id="btnUploadID2" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>

<div id="uploadProofOfBilling" class="modal uploadProofOfBilling">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Upload Proof of Billing</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s12 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="proofOfBilling" name="proofOfBilling" value="<?php echo (isset($_POST['proofOfBilling']) ? $_POST['proofOfBilling'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnProofOfBilling" id="btnProofOfBilling" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>

<div id="uploadBankCert" class="modal uploadBankCert">
	<form method="POST" enctype="multipart/form-data">
		<div class="modal-content">
			<h5>Upload Proof of Billing</h5>
			<div class="divider"></div><br>
			<div class="row">
				<div class="s12 col input-field file-field">
					<div class="btn">
						<span>File</span>
						<input type="file" id="bankCert" name="bankCert" value="<?php echo (isset($_POST['bankCert']) ? $_POST['bankCert'] : ''); ?>" required class="validate">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="Upload">
					</div>
				</div>
			</div>
			<div class="divider"></div>
		</div>
		<div class="modal-footer">
			<input type="submit" name="btnBankCert" id="btnBankCert" class="waves-effect btn btn-green waves-light" value="Save">
			<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
		</div>
	</form>
</div>


<?php //Upload Additional Corpo Docu ?>
<?php if (isset($_GET['deleteCorpoAdditionalDocu'])): ?>
	<?php $thisID = $_GET['deleteCorpoAdditionalDocu']; 

	$thisIDs = $_GET['id']; 
	$q = "SELECT * FROM `tbl_corp_docu` WHERE id = '$thisID'";
	$q = $conn->query($q);
	$r = $q->fetch_assoc();
	$fileNames = $r['file_name'];
	ueAuditFnc("$logName", "DELETED FILE: $fileNames from", "$thisIDs", $conn);
	$deleteQuery = "DELETE FROM `tbl_corp_docu` WHERE id = '$thisID'";
	$deleteResult = $conn->query($deleteQuery);

	
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id']?>&deleteSuccess=Document";
	</script>
	<?  ?>
<?php endif ?>

<?php if (isset($_POST['btnCorpoAdditional'])): ?>
	<?php

	$clientID = $result['id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["corpoAdditionalDocu"]["name"]);
	$ext = pathinfo($_FILES["corpoAdditionalDocu"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["corpoAdditionalDocu"]["name"];
	$fileName = str_replace(" ","-",$fileName);

	// Verify if the user id already exists in the system

	$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
	//add record
	$addCAIFQuery2 = "INSERT INTO `tbl_corp_docu` (
		`client_id`,
		`file_name`,
		`emp_id`
		) VALUES (
		'$clientID',
		'$fileNames',
		2)";
	if (move_uploaded_file($_FILES["corpoAdditionalDocu"]["tmp_name"], $target_dir . $fileName)) {

		$addCAIFQuery2 = $conn->query($addCAIFQuery2);
		ueAuditFnc("$logName", "UPLOADED FILE: $fileNames for", "$clientID", $conn);
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
<?php //Upload Additional Corpo Docu ?>

<?php //Upload CAIF 2 ?>
<?php if (isset($_GET['deleteCAIF2'])): ?>
	<?php $thisID = $_GET['deleteCAIF2']; 

	$thisIDs = $_GET['id']; 
	ueAuditFnc("$logName", "DELETED CAIF 2 from", "$thisIDs", $conn);
	$deleteQuery = "UPDATE `tbl_documents` SET `caif2` = '' WHERE id = '$thisID'";
	$deleteResult = $conn->query($deleteQuery);
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id']?>&deleteSuccess=CAIF2";
	</script>
	<?  ?>
<?php endif ?>

<?php if (isset($_POST['btnCAIFUpload2'])): ?>
	<?php

	$clientID = $result['id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["docuCAIF2"]["name"]);
	$ext = pathinfo($_FILES["docuCAIF2"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["docuCAIF2"]["name"];
	$fileName = str_replace(" ","-",$fileName);
	$queryCheckDocu = "SELECT * FROM `tbl_documents` WHERE client_id = '$clientID'";
	$resultCheckDocu = $conn->query($queryCheckDocu);

	// Verify if the user id already exists in the system
	if($resultCheckDocu->num_rows > 0) {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		// update record
		$addCAIFQuery2 = "UPDATE `tbl_documents` SET `caif2` = '$fileNames' WHERE client_id = '$clientID'";
	} else {

		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		//add record
		$addCAIFQuery2 = "INSERT INTO `tbl_documents` (
			`client_id`,
			`caif2`,
			`emp_id`
			) VALUES (
			'$clientID',
			'$fileNames',
			2)";
	}
	if (move_uploaded_file($_FILES["docuCAIF2"]["tmp_name"], $target_dir . $fileName)) {

		$addCAIFQuery2 = $conn->query($addCAIFQuery2);
		ueAuditFnc("$logName", "UPLOADED CAIF 2 for", "$clientID", $conn);
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
<?php //Upload CAIF 2 ?>

<?php //Upload CAIF ?>
<?php if (isset($_GET['deleteCAIF'])): ?>
	<?php $thisID = $_GET['deleteCAIF']; 

	$thisIDs = $_GET['id']; 
	ueAuditFnc("$logName", "DELETED CAIF from", "$thisIDs", $conn);
	$deleteQuery = "UPDATE `tbl_documents` SET `caif` = '' WHERE id = '$thisID'";
	$deleteResult = $conn->query($deleteQuery);
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id']?>&deleteSuccess=CAIF";
	</script>
	<?  ?>
<?php endif ?>

<?php if (isset($_POST['btnCAIFUpload'])): ?>
	<?php

	$clientID = $result['id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["docuCAIF"]["name"]);
	$ext = pathinfo($_FILES["docuCAIF"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["docuCAIF"]["name"];
	$fileName = str_replace(" ","-",$fileName);
	$queryCheckDocu = "SELECT * FROM `tbl_documents` WHERE client_id = '$clientID'";
	$resultCheckDocu = $conn->query($queryCheckDocu);

	// Verify if the user id already exists in the system
	if($resultCheckDocu->num_rows > 0) {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		// update record
		$addCAIFQuery = "UPDATE `tbl_documents` SET `caif` = '$fileNames' WHERE client_id = '$clientID'";
	} else {

		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		//add record
		$addCAIFQuery = "INSERT INTO `tbl_documents` (
			`client_id`,
			`caif`,
			`emp_id`
			) VALUES (
			'$clientID',
			'$fileNames',
			2)";
	}
	if (move_uploaded_file($_FILES["docuCAIF"]["tmp_name"], $target_dir . $fileName)) {

		ueAuditFnc("$logName", "UPLOADED CAIF for", "$clientID", $conn);
		$addCAIFQuery = $conn->query($addCAIFQuery);
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
<?php //Upload CAIF ?>

<?php //Upload ID 1 ?>
<?php if (isset($_GET['deleteid1'])): ?>
	<?php $thisID = $_GET['deleteid1']; 
	$thisIDs = $_GET['id']; 
	ueAuditFnc("$logName", "DELETED ID 1 from", "$thisIDs", $conn);
	$deleteQuery = "UPDATE `tbl_documents` SET `id1` = '' WHERE id = '$thisID'";
	$deleteResult = $conn->query($deleteQuery);
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id']?>&deleteSuccess=ID&nbsp1";
	</script>
	<?  ?>
<?php endif ?>
<?php if (isset($_POST['btnUploadID1'])): ?>
	<?php

	$clientID = $result['id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["docuID1"]["name"]);
	$ext = pathinfo($_FILES["docuID1"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["docuID1"]["name"];
	$fileName = str_replace(" ","-",$fileName);
	$queryCheckDocu = "SELECT * FROM `tbl_documents` WHERE client_id = '$clientID'";
	$resultCheckDocu = $conn->query($queryCheckDocu);
	// Verify if the user id already exists in the system
	if($resultCheckDocu->num_rows > 0) {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		// update record
		$addCAIFQuery = "UPDATE `tbl_documents` SET `id1` = '$fileNames' WHERE client_id = '$clientID'";
	} else {
		//add record
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		$addCAIFQuery = "INSERT INTO `tbl_documents` (
			`client_id`,
			`id1`,
			`emp_id`
			) VALUES (
			'$clientID',
			'$fileNames',
			2)";
	}
	if (move_uploaded_file($_FILES["docuID1"]["tmp_name"], $target_dir . $fileName)) {
		ueAuditFnc("$logName", "UPLOADED CAIF for", "$clientID", $conn);
		$addCAIFQuery = $conn->query($addCAIFQuery);
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
<?php //Upload ID 1 ?>

<?php //Upload ID 2 ?>
<?php if (isset($_GET['deleteid2'])): ?>
	<?php $thisID = $_GET['deleteid2']; 

	$thisIDs = $_GET['id']; 
	ueAuditFnc("$logName", "DELETED ID 2 from", "$thisIDs", $conn);
	$deleteQuery = "UPDATE `tbl_documents` SET `id2` = '' WHERE id = '$thisID'";
	$deleteResult = $conn->query($deleteQuery);
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id']?>&deleteSuccess=ID%202";
	</script>
	<?  ?>
<?php endif ?>
<?php if (isset($_POST['btnUploadID2'])): ?>
	<?php

	$clientID = $result['id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["docuID2"]["name"]);
	$ext = pathinfo($_FILES["docuID2"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["docuID2"]["name"];
	$fileName = str_replace(" ","-",$fileName);
	$queryCheckDocu = "SELECT * FROM `tbl_documents` WHERE client_id = '$clientID'";
	$resultCheckDocu = $conn->query($queryCheckDocu);
	// Verify if the user id already exists in the system
	if($resultCheckDocu->num_rows > 0) {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		// update record
		$addCAIFQuery = "UPDATE `tbl_documents` SET `id2` = '$fileNames' WHERE client_id = '$clientID'";
	} else {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		//add record
		$addCAIFQuery = "INSERT INTO `tbl_documents` (
			`client_id`,
			`id2`,
			`emp_id`
			) VALUES (
			'$clientID',
			'$fileNames',
			2)";
	}
	if (move_uploaded_file($_FILES["docuID2"]["tmp_name"], $target_dir . $fileName)) {

		ueAuditFnc("$logName", "UPLOADED ID 2 for", "$clientID", $conn);
		$addCAIFQuery = $conn->query($addCAIFQuery);
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
<?php //Upload ID 2 ?>

<?php //Upload Proof of Billing ?>
<?php if (isset($_GET['deleteProofOfBilling'])): ?>
	<?php $thisID = $_GET['deleteProofOfBilling']; 

	$thisIDs = $_GET['id']; 
	ueAuditFnc("$logName", "DELETED Proof of Billing from", "$thisIDs", $conn);
	$deleteQuery = "UPDATE `tbl_documents` SET `proof_of_billing` = '' WHERE id = '$thisID'";
	$deleteResult = $conn->query($deleteQuery);
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id']?>&deleteSuccess=Proof%20of%20Billing";
	</script>
	<?  ?>
<?php endif ?>
<?php if (isset($_POST['btnProofOfBilling'])): ?>
	<?php

	$clientID = $result['id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["proofOfBilling"]["name"]);
	$ext = pathinfo($_FILES["proofOfBilling"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["proofOfBilling"]["name"];
	$fileName = str_replace(" ","-",$fileName);
	$queryCheckDocu = "SELECT * FROM `tbl_documents` WHERE client_id = '$clientID'";
	$resultCheckDocu = $conn->query($queryCheckDocu);
	// Verify if the user id already exists in the system
	if($resultCheckDocu->num_rows > 0) {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		// update record
		$addCAIFQuery = "UPDATE `tbl_documents` SET `proof_of_billing` = '$fileNames' WHERE client_id = '$clientID'";
	} else {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		//add record
		$addCAIFQuery = "INSERT INTO `tbl_documents` (
			`client_id`,
			`proof_of_billing`,
			`emp_id`
			) VALUES (
			'$clientID',
			'$fileNames',
			2)";
	}
	if (move_uploaded_file($_FILES["proofOfBilling"]["tmp_name"], $target_dir . $fileName)) {

		ueAuditFnc("$logName", "UPLOADED Proof of Billing for", "$clientID", $conn);
		$addCAIFQuery = $conn->query($addCAIFQuery);
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
<?php //Upload Proof of Billing ?>

<?php //Upload Proof of Billing ?>
<?php if (isset($_GET['deleteBankCert'])): ?>
	<?php $thisID = $_GET['deleteBankCert']; 

	$thisIDs = $_GET['id']; 
	ueAuditFnc("$logName", "DELETED Bank Certificate from", "$thisIDs", $conn);
	$deleteQuery = "UPDATE `tbl_documents` SET `bank_certificate` = '' WHERE id = '$thisID'";
	$deleteResult = $conn->query($deleteQuery);
	?>
	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$_GET['id']?>&deleteSuccess=Bank%20Certificate";
	</script>
	<?  ?>
<?php endif ?>
<?php if (isset($_POST['btnBankCert'])): ?>
	<?php
	$clientID = $result['id'];
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["bankCert"]["name"]);
	$ext = pathinfo($_FILES["bankCert"]["name"], PATHINFO_EXTENSION);
	$thisDate = new DateTime();
	$thisDate = $thisDate->format('YmdH');
	$fileName = $clientID."-".$thisDate." ".$_FILES["bankCert"]["name"];
	$fileName = str_replace(" ","-",$fileName);
	$queryCheckDocu = "SELECT * FROM `tbl_documents` WHERE client_id = '$clientID'";
	$resultCheckDocu = $conn->query($queryCheckDocu);
	// Verify if the user id already exists in the system
	if($resultCheckDocu->num_rows > 0) {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		// update record
		$addCAIFQuery = "UPDATE `tbl_documents` SET `bank_certificate` = '$fileNames' WHERE client_id = '$clientID'";
	} else {
		$fileNames = htmlspecialchars($fileName,ENT_QUOTES);
		//add record
		$addCAIFQuery = "INSERT INTO `tbl_documents` (
			`client_id`,
			`bank_certificate`,
			`emp_id`
			) VALUES (
			'$clientID',
			'$fileNames',
			2)";
	}
	if (move_uploaded_file($_FILES["bankCert"]["tmp_name"], $target_dir . $fileName)) {

		ueAuditFnc("$logName", "UPLOADED Bank Certificate for", "$clientID", $conn);
		$addCAIFQuery = $conn->query($addCAIFQuery);
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
<?php //Upload Proof of Billing ?>