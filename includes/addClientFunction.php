<?php if (isset($_POST['btnSubmitAddClient'])): ?>
	<?php 
	$client_type = '';
	$user_id = '';
	$initial_password = '';
	$status = '';
	$account_status = '';
	$seminar = '';
	$securityCompany = '';
	$referredBy = '';
	$securityCompany1 = '';
	$userid1 = '';
	$securityCompany2 = '';
	$userid2 = '';
	$securityCompany3 = '';
	$userid3 = '';
	$remarksComment = '';
	$firstname = '';
	$lastname = '';
	$txtMotherMaiden = '';
	$placeOfBirth = '';
	$nationality = '';
	$gender = '';
	$emailAdd = '';
	$civilStatus = '';
	$spouse = '';
	$birthDate = '';
	$address = '';
	$mobilePhone = '';
	$empStatus = '';
	$nameOfEmployer = '';
	$businessAdd = '';
	$ofcPhone = '';
	$natureOfBusiness = '';
	$occupation = '';
	$bankName = '';
	$investmentObjective = '';
	$isInvestmentObjLongTerm = '';
	$isInvestmentObjGrowth = '';
	$isInvestmentObjPreservation = '';
	$isInvestmentObjSpeculation = '';
	$yrsOfExpInTrading = '';
	$isSalary = '';
	$isBusinessInvestments = '';
	$isInheritance = '';
	$isRemittance = '';
	$isSourceIncomeOther = '';
	$otherSourceOfIncome = '';
	$isTimeDeposit = '';
	$isBonds = '';
	$isStocks = '';
	$isMutualFund = '';
	$isUITF = '';
	$isNone = '';
	$isInvestmentOther = '';
	$otherInvestmentExp = '';
	$annualIncome = '';
	$assets = '';
	$netWorth = '';

	// $corpoCompanyName = '';
	// $corpoBusinessAdd = '';
	// $corpoEmailAdd '';
	// $corpoOfficePhone = '';
	$corpoTIN = '';
	$corpoSSS = '';

	if (isset($_POST['accountType'])) {
		$client_type = $_POST['accountType'];
	}
	if (isset($_POST['txtUserID'])) {
		$user_id = htmlspecialchars($_POST['txtUserID'],ENT_QUOTES);
	}
	if (isset($_POST['txtInitialPassword'])) {
		$initial_password = htmlspecialchars($_POST['txtInitialPassword'],ENT_QUOTES);
	}
	if (isset($_POST['slcStatus'])) {
		$status = htmlspecialchars($_POST['slcStatus'],ENT_QUOTES);
	}
	if (isset($_POST['slcAccountStatus'])) {
		$account_status = htmlspecialchars($_POST['slcAccountStatus'],ENT_QUOTES);
	}
	if (isset($_POST['slcSeminar'])) {
		$seminar = htmlspecialchars($_POST['slcSeminar'],ENT_QUOTES);
	}
	if (isset($_POST['txtareaSecurityCompany'])) {
		$securityCompany = htmlspecialchars($_POST['txtareaSecurityCompany'],ENT_QUOTES);
	}
	if (isset($_POST['txtReferredBy'])) {
		$referredBy = htmlspecialchars($_POST['txtReferredBy'],ENT_QUOTES);
	}
	if (isset($_POST['txtareaSecurityCompany1'])) {
		$securityCompany1 = htmlspecialchars($_POST['txtareaSecurityCompany1'],ENT_QUOTES);
	}
	if (isset($_POST['txtUserID1'])) {
		$userid1 = htmlspecialchars($_POST['txtUserID1'],ENT_QUOTES);
	}
	if (isset($_POST['txtareaSecurityCompany2'])) {
		$securityCompany2 = htmlspecialchars($_POST['txtareaSecurityCompany2'],ENT_QUOTES);
	}
	if (isset($_POST['txtUserID2'])) {
		$userid2 = htmlspecialchars($_POST['txtUserID2'],ENT_QUOTES);
	}
	if (isset($_POST['txtareaSecurityCompany3'])) {
		$securityCompany3 = htmlspecialchars($_POST['txtareaSecurityCompany3'],ENT_QUOTES);
	}
	if (isset($_POST['txtUserID3'])) {
		$userid3 = htmlspecialchars($_POST['txtUserID3'],ENT_QUOTES);
	}
	if (isset($_POST['txtAreaRemarks'])) {
		$remarksComment = htmlspecialchars($_POST['txtAreaRemarks'],ENT_QUOTES);
	}
	if (isset($_POST['txtFirstname'])) {
		$firstname = htmlspecialchars($_POST['txtFirstname'],ENT_QUOTES);
	}
	if ($_POST['slcStatus'] == "Corporate") {
		if (isset($_POST['txtCorpoName'])) {
			$firstname = htmlspecialchars($_POST['txtCorpoName'],ENT_QUOTES);
		}
	}
	if (isset($_POST['txtLastname'])) {
		$lastname = htmlspecialchars($_POST['txtLastname'],ENT_QUOTES);
	}
	if (isset($_POST['txtMotherMaiden'])) {
		$txtMotherMaiden = htmlspecialchars($_POST['txtMotherMaiden'],ENT_QUOTES);
	}
	if (isset($_POST['txtPlaceOfBirth'])) {
		$placeOfBirth = htmlspecialchars($_POST['txtPlaceOfBirth'],ENT_QUOTES);
	}
	if (isset($_POST['txtNationality'])) {
		$nationality = htmlspecialchars($_POST['txtNationality'],ENT_QUOTES);
	}
	if (isset($_POST['rdoGender'])) {
		$gender = htmlspecialchars($_POST['rdoGender'],ENT_QUOTES);
	}
	if (isset($_POST['txtEmailAdd'])) {
		$emailAdd = htmlspecialchars($_POST['txtEmailAdd'],ENT_QUOTES);
	}
	if ($_POST['slcStatus'] == "Corporate") {
		if (isset($_POST['txtCorpoEmail'])) {
			$emailAdd = htmlspecialchars($_POST['txtCorpoEmail'],ENT_QUOTES);
		}
	}
	if (isset($_POST['slcCivilStatus'])) {
		$civilStatus = htmlspecialchars($_POST['slcCivilStatus'],ENT_QUOTES);
	}
	if (isset($_POST['txtSpouse'])) {
		$spouse = htmlspecialchars($_POST['txtSpouse'],ENT_QUOTES);
	}
	if (isset($_POST['txtBirthDate'])) {
		$birthDate = htmlspecialchars($_POST['txtBirthDate'],ENT_QUOTES);
	}
	if (isset($_POST['txtAddress'])) {
		$address = htmlspecialchars($_POST['txtAddress'],ENT_QUOTES);
	}
	if (isset($_POST['txtMobPhone'])) {
		$mobilePhone = htmlspecialchars($_POST['txtMobPhone'],ENT_QUOTES);
	}

	if ($_POST['slcStatus'] == "Corporate") {
		if (isset($_POST['txtCorpoOfficePhone'])) {
			$mobilePhone = htmlspecialchars($_POST['txtCorpoOfficePhone'],ENT_QUOTES);
		}
	}
	if (isset($_POST['slcEmpStatus'])) {
		$empStatus = htmlspecialchars($_POST['slcEmpStatus'],ENT_QUOTES);
	}
	if (isset($_POST['txtNameOfEmployer'])) {
		$nameOfEmployer = htmlspecialchars($_POST['txtNameOfEmployer'],ENT_QUOTES);
	}
	if (isset($_POST['txtBusinessAddress'])) {
		$businessAdd = htmlspecialchars($_POST['txtBusinessAddress'],ENT_QUOTES);
	}
	if ($_POST['slcStatus'] == "Corporate") {
		if (isset($_POST['txtCorpoAddress'])) {
			$businessAdd = htmlspecialchars($_POST['txtCorpoAddress'],ENT_QUOTES);
		}
	}
	if (isset($_POST['txtOfcPhone'])) {
		$ofcPhone = htmlspecialchars($_POST['txtOfcPhone'],ENT_QUOTES);
	}
	if (isset($_POST['txtNatureOfBusiness'])) {
		$natureOfBusiness = htmlspecialchars($_POST['txtNatureOfBusiness'],ENT_QUOTES);
	}
	if (isset($_POST['txtOccupation'])) {
		$occupation = htmlspecialchars($_POST['txtOccupation'],ENT_QUOTES);
	}
	if (isset($_POST['txtBankName'])) {
		$bankName = htmlspecialchars($_POST['txtBankName'],ENT_QUOTES);
	}
	if (isset($_POST['slcInvestmentObjective'])) {
		$investmentObjective = htmlspecialchars($_POST['slcInvestmentObjective'],ENT_QUOTES);
	}
	if (isset($_POST['chckInvestmentObjLongTerm'])) {
		$isInvestmentObjLongTerm = 1;
	}
	if (isset($_POST['chckInvestmentObjGrowth'])) {
		$isInvestmentObjGrowth = 1;
	}
	if (isset($_POST['chckInvestmentObjPreservation'])) {
		$isInvestmentObjPreservation = 1;
	}
	if (isset($_POST['chckInvestmentObjSpeculation'])) {
		$isInvestmentObjSpeculation = 1;
	}
	if (isset($_POST['slcYrsOfExpInTrading'])) {
		$yrsOfExpInTrading = htmlspecialchars($_POST['slcYrsOfExpInTrading'],ENT_QUOTES);
	}
	if (isset($_POST['chckSourceIncomeSalary'])) {
		$isSalary = 1;
	}
	if (isset($_POST['chckSourceIncomeBusinessInvestments'])) {
		$isBusinessInvestments = 1;
	}
	if (isset($_POST['chckSourceIncomeInheritance'])) {
		$isInheritance = 1;
	}
	if (isset($_POST['chckSourceIncomeRemittances'])) {
		$isRemittance = 1;
	}
	if (isset($_POST['chckSourceIncomeOthers'])) {
		$isSourceIncomeOther = 1;
	}
	if (isset($_POST['txtSourceIncomeOthers'])) {
		$otherSourceOfIncome = htmlspecialchars($_POST['txtSourceIncomeOthers'],ENT_QUOTES);
	}
	if (isset($_POST['chckInvestmentExpTimeDeposit'])) {
		$isTimeDeposit = 1;
	}
	if (isset($_POST['chckInvestmentExpBonds'])) {
		$isBonds = 1;
	}
	if (isset($_POST['chckInvestmentExpStocks'])) {
		$isStocks = 1;
	}
	if (isset($_POST['chckInvestmentExpMutualFund'])) {
		$isMutualFund = 1;
	}
	if (isset($_POST['chckInvestmentExpUITF'])) {
		$isUITF = 1;
	}
	if (isset($_POST['chckInvestmentExpNone'])) {
		$isNone = 1;
	}
	if (isset($_POST['chckInvestmentExpOthers'])) {
		$isInvestmentOther = 1;
	}
	if (isset($_POST['txtInvestmentExpOthers'])) {
		$otherInvestmentExp = htmlspecialchars($_POST['txtInvestmentExpOthers'],ENT_QUOTES);
	}
	if (isset($_POST['slcAnnualIncome'])) {
		$annualIncome = htmlspecialchars($_POST['slcAnnualIncome'],ENT_QUOTES);
	}
	if (isset($_POST['slcAssets'])) {
		$assets = htmlspecialchars($_POST['slcAssets'],ENT_QUOTES);
	}
	if (isset($_POST['slcNetWorth'])) {
		$netWorth = htmlspecialchars($_POST['slcNetWorth'],ENT_QUOTES);
	}
	if ($_POST['slcStatus'] == "Corporate") {
		if (isset($_POST['txtCorpoTIN'])) {
			$corpoTIN = htmlspecialchars($_POST['txtCorpoTIN'],ENT_QUOTES);
		}
	}
	if ($_POST['slcStatus'] == "Corporate") {
		if (isset($_POST['txtSSS'])) {
			$corpoSSS = htmlspecialchars($_POST['txtSSS'],ENT_QUOTES);
		}
	}

	
	// echo '$client_type = '. $client_type.'<br />';
	// echo '$user_id = '. $user_id.'<br />';
	// echo '$initial_password = '. $initial_password.'<br />';
	// echo '$status = '. $status.'<br />';
	// echo '$account_status = '. $account_status.'<br />';
	// echo '$seminar = '. $seminar.'<br />';
	// echo '$securityCompany = '. $securityCompany.'<br />';
	// echo '$firstname = '. $firstname.'<br />';
	// echo '$lastname = '. $lastname.'<br />';
	// echo '$placeOfBirth = '. $placeOfBirth.'<br />';
	// echo '$nationality = '. $nationality.'<br />';
	// echo '$gender = '. $gender.'<br />';
	// echo '$emailAdd = '. $emailAdd.'<br />';
	// echo '$civilStatus = '. $civilStatus.'<br />';
	// echo '$spouse = '. $spouse.'<br />';
	// echo '$birthDate = '. $birthDate.'<br />';
	// echo '$address = '. $address.'<br />';
	// echo '$mobilePhone = '. $mobilePhone.'<br />';
	// echo '$empStatus = '. $empStatus.'<br />';
	// echo '$nameOfEmployer = '. $nameOfEmployer.'<br />';
	// echo '$businessAdd = '. $businessAdd.'<br />';
	// echo '$ofcPhone = '. $ofcPhone.'<br />';
	// echo '$natureOfBusiness = '. $natureOfBusiness.'<br />';
	// echo '$occupation = '. $occupation.'<br />';
	// echo '$bankName = '. $bankName.'<br />';
	// echo '$investmentObjective = '. $investmentObjective.'<br />';
	// echo '$yrsOfExpInTrading = '. $yrsOfExpInTrading.'<br />';
	// echo '$isSalary = '. $isSalary.'<br />';
	// echo '$isBusinessInvestments = '. $isBusinessInvestments.'<br />';
	// echo '$isInheritance = '. $isInheritance.'<br />';
	// echo '$isRemittance = '. $isRemittance.'<br />';
	// echo '$isSourceIncomeOther = '. $isSourceIncomeOther.'<br />';
	// echo '$otherSourceOfIncome = '. $otherSourceOfIncome.'<br />';
	// echo '$isTimeDeposit = '. $isTimeDeposit.'<br />';
	// echo '$isBonds = '. $isBonds.'<br />';
	// echo '$isStocks = '. $isStocks.'<br />';
	// echo '$isMutualFund = '. $isMutualFund.'<br />';
	// echo '$isUITF = '. $isUITF.'<br />';
	// echo '$isNone = '. $isNone.'<br />';
	// echo '$isInvestmentOther = '. $isInvestmentOther.'<br />';
	// echo '$otherInvestmentExp = '. $otherInvestmentExp.'<br />';
	// echo '$annualIncome = '. $annualIncome.'<br />';
	// echo '$assets = '. $assets.'<br />';
	// echo '$netWorth = '. $netWorth.'<br />';
	
	$employeeName = htmlspecialchars($_POST['employeeName'],ENT_QUOTES); ?>

<?php include('mysql_connect.php'); ?>

<?php 
	$query = "SELECT * FROM tbl_clients	 WHERE user_id = '$user_id'";
	$query = $conn->query($query);
	// Verify if the user id already exists in the system
	if(($user_id != '') && ($query->num_rows > 0)) {
		?>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.error-row').fadeIn('slow');
				$('.error-div span').html('<?=$user_id; ?>');
			});
		</script>
		<?php
		$conn->close();
	} else {
		$empID = $_COOKIE['empID'];
		$query = "INSERT INTO `tbl_clients`(
			`user_id`, 
			`initial_password`, 
			`status`, 
			`account_status`, 
			`seminar`, 
			`security_company`, 
			`referred_by`, 
			`security_company1`, 
			`security_company2`, 
			`security_company3`, 
			`userid1`, 
			`userid2`, 
			`userid3`, 
			`remarks_comments`, 
			`firstname`, 
			`lastname`,
			`mother_mname`,
			`place_of_birth`, 
			`nationality`, 
			`gender`, 
			`email_add`, 
			`civil_status`, 
			`name_of_spouse`, 
			`date_of_birth`, 
			`home_address`, 
			`mobile_phone`, 
			`employee_status`, 
			`name_of_employer`, 
			`business_address`, 
			`office_phone`,
			`nature_of_business`,
			`occupation`, 
			`bank_name`, 
			`investment_objective`,
			`is_longTermInvestment`,
			`is_growth`,
			`is_preservationOfCapital`,
			`is_speculation`,
			`years_of_trading`, 
			`is_salary`, 
			`is_business_investments`, 
			`is_inheritance`, 
			`is_remittances`, 
			`is_source_income_others`, 
			`other_source_income`, 
			`is_time_deposit`, 
			`is_bonds`, 
			`is_stocks`, 
			`is_mutual_fund`, 
			`is_uitf`, 
			`is_none`, 
			`is_investment_exp_others`, 
			`other_investment_exp`, 
			`annual_income`, 
			`assets`, 
			`net_worth`, 
			`account_type`, 
			`emp_id`,
			`corpo_tin`,
			`corpo_sss`,
			`account_update_status`)
			VALUES (
			'$user_id',
			'$initial_password',
			'$status',
			'$account_status',
			'$seminar',
			'$securityCompany',
			'$referredBy',
			'$securityCompany1',
			'$securityCompany2',
			'$securityCompany3',
			'$userid1',
			'$userid2',
			'$userid3',
			'$remarksComment',
			'$firstname',
			'$lastname',
			'$txtMotherMaiden',
			'$placeOfBirth',
			'$nationality',
			'$gender',
			'$emailAdd',
			'$civilStatus',
			'$spouse',
			'$birthDate',
			'$address',
			'$mobilePhone',
			'$empStatus',
			'$nameOfEmployer',
			'$businessAdd',
			'$ofcPhone',
			'$natureOfBusiness',
			'$occupation',
			'$bankName',
			'$investmentObjective',
			'$isInvestmentObjLongTerm',
			'$isInvestmentObjGrowth',
			'$isInvestmentObjPreservation',
			'$isInvestmentObjSpeculation',
			'$yrsOfExpInTrading',
			'$isSalary',
			'$isBusinessInvestments',
			'$isInheritance',
			'$isRemittance',
			'$isSourceIncomeOther',
			'$otherSourceOfIncome',
			'$isTimeDeposit',
			'$isBonds',
			'$isStocks',
			'$isMutualFund',
			'$isUITF',
			'$isNone',
			'$isInvestmentOther',
			'$otherInvestmentExp',
			'$annualIncome',
			'$assets',
			'$netWorth',
			'$client_type',
			'$empID',
			'$corpoTIN',
			'$corpoSSS',
			'0')";
		if ($conn->query($query) === TRUE) {
			$query = "SELECT * FROM tbl_clients	 WHERE id = '$conn->insert_id'";
			$query = $conn->query($query);
			$result = $query->fetch_assoc();
			$id = $result['id'];
			$fName = $result['firstname']." ".$result['lastname'];

			insertAuditLog("$logName", "Added $fName", $conn);
			?>
			<script type="text/javascript">
				window.location.href = "client-details?id=<?=$id?>&new";
			</script>
			<?php
		} else {
			echo "<h1>There was an error on adding the data, <br />ERROR: ".$conn->error."</h1>";
		}
		$conn->close();
	}
 ?>
<?php endif ?>