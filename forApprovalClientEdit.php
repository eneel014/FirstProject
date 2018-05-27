<?php if (!isset($_GET['id'])): ?>
	<script type="text/javascript">
		window.location.href = "clients";
	</script>
<?php endif ?>
<?php $pageTitle = "Client Details"; ?>
<?php $bodyClass = "client-detail-page"; ?>
<?php $navActive = "dashboard" ?>
<?php if (isset($_GET['new'])): ?>
	<?php $bodyClass = "client-detail-page new"; ?>
<?php endif ?>

<?php include('includes/mysql_connect.php'); ?>
<?php 
$client_id = $_GET['id'];
$query = "SELECT * FROM tbl_clients	 WHERE id = '$client_id'";
$query = $conn->query($query); 
$result = $query->fetch_assoc();


$queryTemp = "SELECT * FROM tbl_clients_temp WHERE client_id = '$client_id'";
$queryTemp = $conn->query($queryTemp); 
$resultTemp = $queryTemp->fetch_assoc();

$employee_query_id = $result['emp_id'];


$emloyee_query = "SELECT * FROM tbl_users WHERE user_id ='$employee_query_id'";
$emloyee_query = $conn->query($emloyee_query); 
$emloyee_result = $emloyee_query->fetch_assoc();
$nullHandler = '-'; ?>

<?php include('header.php') ?>
<style>
	td,th {
		width: 25%;
	}
</style>

<?php if (isset($_GET['faReject'])): 
	$thisid = $resultTemp['id'];
	$query = "DELETE FROM `tbl_clients_temp` WHERE id = '$thisid'";
	$query = $conn->query($query);

	?>

	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$client_id?>";
	</script>
<?php endif; ?>

<?php if (isset($_GET['faAccept'])): 
	$client_type = $resultTemp['account_type'];
	$user_id = $resultTemp['user_id'];
	$initial_password = $resultTemp['initial_password'];
	$status = $resultTemp['status'];
	$account_status = $resultTemp['account_status'];
	$seminar = $resultTemp['seminar'];
	$securityCompany = $resultTemp['security_company'];
	$referredBy = $resultTemp['referred_by'];
	$securityCompany1 = $resultTemp['security_company1'];
	$userid1 = $resultTemp['userid1'];
	$securityCompany2 = $resultTemp['security_company2'];
	$userid2 = $resultTemp['userid2'];
	$securityCompany3 = $resultTemp['security_company3'];
	$userid3 = $resultTemp['userid3'];
	$remarksComment = $resultTemp['remarks_comments'];
	$firstname = $resultTemp['firstname'];
	$lastname = $resultTemp['lastname'];
	$txtMotherMaiden = $resultTemp['mother_mname'];
	$placeOfBirth = $resultTemp['place_of_birth'];
	$nationality = $resultTemp['nationality'];
	$gender = $resultTemp['gender'];
	$emailAdd = $resultTemp['email_add'];
	$civilStatus = $resultTemp['civil_status'];
	$spouse = $resultTemp['name_of_spouse'];
	$birthDate = $resultTemp['date_of_birth'];
	$address = $resultTemp['home_address'];
	$mobilePhone = $resultTemp['mobile_phone'];
	$empStatus = $resultTemp['employee_status'];
	$nameOfEmployer = $resultTemp['name_of_employer'];
	$businessAdd = $resultTemp['business_address'];
	$ofcPhone = $resultTemp['office_phone'];
	$natureOfBusiness = $resultTemp['nature_of_business'];
	$occupation = $resultTemp['occupation'];
	$bankName = $resultTemp['bank_name'];
	$investmentObjective = $resultTemp['investment_objective'];
	$isInvestmentObjLongTerm = $resultTemp['is_longTermInvestment'];
	$isInvestmentObjGrowth = $resultTemp['is_growth'];
	$isInvestmentObjPreservation = $resultTemp['is_preservationOfCapital'];
	$isInvestmentObjSpeculation = $resultTemp['is_speculation'];
	$yrsOfExpInTrading = $resultTemp['years_of_trading'];
	$isSalary = $resultTemp['is_salary'];
	$isBusinessInvestments = $resultTemp['is_business_investments'];
	$isInheritance = $resultTemp['is_inheritance'];
	$isRemittance = $resultTemp['is_remittances'];
	$isSourceIncomeOther = $resultTemp['is_source_income_others'];
	$otherSourceOfIncome = $resultTemp['other_source_income'];
	$isTimeDeposit = $resultTemp['is_time_deposit'];
	$isBonds = $resultTemp['is_bonds'];
	$isStocks = $resultTemp['is_stocks'];
	$isMutualFund = $resultTemp['is_mutual_fund'];
	$isUITF = $resultTemp['is_uitf'];
	$isNone = $resultTemp['is_none'];
	$isInvestmentOther = $resultTemp['is_investment_exp_others'];
	$otherInvestmentExp = $resultTemp['other_investment_exp'];
	$annualIncome = $resultTemp['annual_income'];
	$assets = $resultTemp['assets'];
	$netWorth = $resultTemp['net_worth'];
	$empID = $resultTemp['updatedBy_empID'];
	$thisID = $resultTemp['client_id'];
	$corpoTIN = $resultTemp['corpo_tin'];
	$corpoSSS = $resultTemp['corpo_sss'];

	$query = "UPDATE `tbl_clients` SET
			`user_id` = '$user_id',
			`initial_password` = '$initial_password',
			`status` = '$status', 
			`account_status` = '$account_status',
			`seminar` = '$seminar',
			`security_company` = '$securityCompany',
			`referred_by` = '$referredBy',
			`security_company1` = '$securityCompany1',
			`security_company2` = '$securityCompany2',
			`security_company3` = '$securityCompany3',
			`userid1` = '$userid1',
			`userid2` = '$userid2',
			`userid3` = '$userid3',
			`remarks_comments` = '$remarksComment',
			`firstname` = '$firstname',
			`lastname` = '$lastname',
			`place_of_birth` = '$placeOfBirth',
			`nationality` = '$nationality',
			`gender` = '$gender',
			`email_add` = '$emailAdd',
			`civil_status` = '$civilStatus',
			`name_of_spouse` = '$spouse',
			`date_of_birth` = '$birthDate',
			`home_address` = '$address',
			`mobile_phone` = '$mobilePhone',
			`employee_status` = '$empStatus',
			`name_of_employer` = '$nameOfEmployer',
			`business_address` = '$businessAdd',
			`office_phone` = '$ofcPhone',
			`nature_of_business` = '$natureOfBusiness',
			`occupation` = '$occupation',
			`bank_name` = '$bankName',
			`investment_objective` = '$investmentObjective',
			`is_longTermInvestment` = '$isInvestmentObjLongTerm',
			`is_growth` = '$isInvestmentObjGrowth',
			`is_preservationOfCapital` = '$isInvestmentObjPreservation',
			`is_speculation` = '$isInvestmentObjSpeculation',
			`years_of_trading` = '$yrsOfExpInTrading',
			`is_salary` = '$isSalary',
			`is_business_investments` = '$isBusinessInvestments',
			`is_inheritance` = '$isInheritance',
			`is_remittances` = '$isRemittance',
			`is_source_income_others` = '$isSourceIncomeOther',
			`other_source_income` = '$otherSourceOfIncome',
			`is_time_deposit` = '$isTimeDeposit',
			`is_bonds` = '$isBonds',
			`is_stocks` = '$isStocks',
			`is_mutual_fund` = '$isMutualFund',
			`is_uitf` = '$isUITF',
			`is_none` = '$isNone',
			`is_investment_exp_others` = '$isInvestmentOther',
			`other_investment_exp` = '$otherInvestmentExp',
			`annual_income` = '$annualIncome',
			`assets` = '$assets',
			`net_worth` = '$netWorth',
			`account_type` = '$client_type',
			`updatedBy_empID` = '$empID',
			`dateUpdated` = 'NOW()',
			`account_update_status` = '0',
			`corpo_tin` = '$corpoTIN',
			`corpo_sss` = '$corpoSSS' WHERE id = '$client_id'"; 
			$query = $conn->query($query);
			$thisid = $resultTemp['id'];
			$query = "DELETE FROM `tbl_clients_temp` WHERE id = '$thisid'";
			$query = $conn->query($query);

	?>

	<script type="text/javascript">
		window.location.href = "client-details?id=<?=$client_id?>&updated=1";
	</script>

	<?php endif ?>
	<div class="section wrap">
		<div class="row">
			<div class="col s8 offset-s2">
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
						<li>
							<a class="collapsible-header waves-effect waves-grey active <?=($_GET['personalDetail'] ? 'active' : '')?>"><i class="material-icons">account_box</i> Personal Details</a>
							<div class="collapsible-body">
								<h4>Account Details</h4>
								<div class="divider"></div>
								<div class="row">
									<div class="col s12">
										<table class="bordered highlight">
											<tr class="<?=($result['user_id'] == $resultTemp['user_id'] ? 'hide' : '')?>">
												<th>
													User ID:
												</th>
												<td>
													<?=($result['user_id']=='' ? $nullHandler : $result['user_id']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['user_id']=='' ? $nullHandler : $resultTemp['user_id']);?>
												</th>
											</tr>
											<tr class="<?=($result['initial_password'] == $resultTemp['initial_password'] ? 'hide' : '')?>">
												<th>
													Initial Password
												</th>
												<td>
													<?=($result['initial_password']=='' ? $nullHandler : $result['initial_password']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['initial_password']=='' ? $nullHandler : $resultTemp['initial_password']);?>
												</th>
											</tr>
											<tr class="<?=($result['status'] == $resultTemp['status'] ? 'hide' : '')?>">
												<th>
													Account Type
												</th>
												<td class="cptlze">
													<?=($result['status']=='' ? $nullHandler : $result['status']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['status']=='' ? $nullHandler : $resultTemp['status']);?>
												</th>
											</tr>
											<tr class="<?=($result['account_status'] == $resultTemp['account_status'] ? 'hide' : '')?>">
												<th>
													Status
												</th>
												<td>
													<?=($result['account_status']=='' ? $nullHandler : $result['account_status']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['account_status']=='' ? $nullHandler : $resultTemp['account_status']);?>
												</th>
											</tr>
											<tr class="<?=($result['security_company'] == $resultTemp['security_company'] ? 'hide' : '')?>">
												<th>
													Security Company
												</th>
												<td class="cptlze">
													<?=($result['security_company']=='' ? $nullHandler : $result['security_company']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['security_company']=='' ? $nullHandler : $resultTemp['security_company']);?>
												</th>
											</tr>

											<tr class="<?=(($result['security_company1'] == $resultTemp['security_company1']) || ($result['userid1'] == $resultTemp['userid1']) ? 'hide' : '')?>">
												<th>
													History Security Company 1<br />
													User ID
												</th>
												<td class="cptlze">
													<?=($result['security_company1']=='' ? $nullHandler : $result['security_company1']);?><br />
													<?=($result['userid1']=='' ? $nullHandler : $result['userid1']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['security_company1']=='' ? $nullHandler : $resultTemp['security_company1']);?><br />
													<?=($resultTemp['userid1']=='' ? $nullHandler : $resultTemp['userid1']);?>
												</th>
											</tr>
											<tr class="<?=(($result['security_company2'] == $resultTemp['security_company2']) || ($result['userid2'] == $resultTemp['userid2']) ? 'hide' : '')?>">
												<th>
													History Security Company 1<br />
													User ID
												</th>
												<td class="cptlze">
													<?=($result['security_company2']=='' ? $nullHandler : $result['security_company2']);?><br />
													<?=($result['userid2']=='' ? $nullHandler : $result['userid2']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['security_company2']=='' ? $nullHandler : $resultTemp['security_company2']);?><br />
													<?=($resultTemp['userid2']=='' ? $nullHandler : $resultTemp['userid2']);?>
												</th>
											</tr>
											<tr class="<?=(($result['security_company3'] == $resultTemp['security_company3']) || ($result['userid3'] == $resultTemp['userid3']) ? 'hide' : '')?>">
												<th>
													History Security Company 1<br />
													User ID
												</th>
												<td class="cptlze">
													<?=($result['security_company3']=='' ? $nullHandler : $result['security_company3']);?><br />
													<?=($result['userid3']=='' ? $nullHandler : $result['userid3']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['security_company3']=='' ? $nullHandler : $resultTemp['security_company3']);?><br />
													<?=($resultTemp['userid3']=='' ? $nullHandler : $resultTemp['userid3']);?>
												</th>
											</tr>


											<tr class="<?=($result['seminar'] == $resultTemp['seminar'] ? 'hide' : '')?>">
												<th>
													Seminar
												</th>
												<td class="cptlze">
													<?=($result['seminar']=='' ? $nullHandler : $result['seminar']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['seminar']=='' ? $nullHandler : $resultTemp['seminar']);?>
												</th>
											</tr>
											<tr class="<?=($result['referred_by'] == $resultTemp['referred_by'] ? 'hide' : '')?>">
												<th>
													Referred By/Agent's Name
												</th>
												<td class="cptlze">
													<?=($result['referred_by']=='' ? $nullHandler : $result['referred_by']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['referred_by']=='' ? $nullHandler : $resultTemp['referred_by']);?>
												</th>
											</tr>
											<tr class="<?=($result['remarks_comments'] == $resultTemp['remarks_comments'] ? 'hide' : '')?>">
												<th>
													Remarks/Comments
												</th>
												<td>
													<?=($result['remarks_comments']=='' ? $nullHandler : $result['remarks_comments']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['remarks_comments']=='' ? $nullHandler : $resultTemp['remarks_comments']);?>
												</th>
											</tr>
										</table>
									</div>
								</div><br>	
								<h4>Personal Information</h4>
								<div class="divider"></div>
								<div class="row">
									<div class="col s12">
										<table class="bordered highlight">
											<tr class="<?=($result['firstname'] == $resultTemp['firstname'] ? 'hide' : '')?>">
												<th>
													<?php if ($resultTemp['status']=='Corporate'): ?>
														Company Name	
													<?php else: ?>
														First Name
													<?php endif ?>
												</th>
												<td class="cptlze">
													<?=($result['firstname']=='' ? $nullHandler : $result['firstname']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['firstname']=='' ? $nullHandler : $resultTemp['firstname']);?>
												</th>
											</tr>
											<tr class="<?=($result['lastname'] == $resultTemp['lastname'] ? 'hide' : '')?>">
												<th>
													First Name
												</th>
												<td class="cptlze">
													<?=($result['lastname']=='' ? $nullHandler : $result['lastname']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['lastname']=='' ? $nullHandler : $resultTemp['lastname']);?>
												</th>
											</tr>
											<tr class="<?=($result['mother_mname'] == $resultTemp['mother_mname'] ? 'hide' : '')?>">
												<th>
													Mother's Maiden Name
												</th>
												<td class="cptlze">
													<?=($result['mother_mname']=='' ? $nullHandler : $result['mother_mname']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['mother_mname']=='' ? $nullHandler : $resultTemp['mother_mname']);?>
												</th>
											</tr>
											<tr class="<?=($result['gender'] == $resultTemp['gender'] ? 'hide' : '')?>">
												<th>
													Gender
												</th>
												<td class="cptlze">
													<?=($result['gender']=='' ? $nullHandler : $result['gender']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['gender']=='' ? $nullHandler : $resultTemp['gender']);?>
												</th>
											</tr>
											<tr class="<?=($result['place_of_birth'] == $resultTemp['place_of_birth'] ? 'hide' : '')?>">
												<th>
													Place Of Birth
												</th>
												<td class="cptlze">
													<?=($result['place_of_birth']=='' ? $nullHandler : $result['place_of_birth']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['place_of_birth']=='' ? $nullHandler : $resultTemp['place_of_birth']);?>
												</th>
											</tr>
											<tr class="<?=($result['nationality'] == $resultTemp['nationality'] ? 'hide' : '')?>">
												<th>
													Nationality
												</th>
												<td class="cptlze">
													<?=($result['nationality']=='' ? $nullHandler : $result['nationality']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['nationality']=='' ? $nullHandler : $resultTemp['nationality']);?>
												</th>
											</tr>
											<tr class="<?=($result['civil_status'] == $resultTemp['civil_status'] ? 'hide' : '')?>">
												<th>
													Civil Status
												</th>
												<td class="cptlze">
													<?=($result['civil_status']=='' ? $nullHandler : $result['civil_status']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['civil_status']=='' ? $nullHandler : $resultTemp['civil_status']);?>
												</th>
											</tr>
											<tr class="<?=($result['name_of_spouse'] == $resultTemp['name_of_spouse'] ? 'hide' : '')?>">
												<th>
													Name Of Spouse
												</th>
												<td class="cptlze">
													<?=($result['name_of_spouse']=='' ? $nullHandler : $result['name_of_spouse']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['name_of_spouse']=='' ? $nullHandler : $resultTemp['name_of_spouse']);?>
												</th>
											</tr>
											<tr class="<?=($result['email_add'] == $resultTemp['email_add'] ? 'hide' : '')?>">
												<th>
													Email Address
												</th>
												<td>
													<?=($result['email_add']=='' ? $nullHandler : $result['email_add']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['email_add']=='' ? $nullHandler : $resultTemp['email_add']);?>
												</th>
											</tr>
											<tr class="<?=($result['date_of_birth'] == $resultTemp['date_of_birth'] ? 'hide' : '')?>">
												<th>
													Birthday
												</th>
												<td>
													<?=($result['date_of_birth']=='' ? $nullHandler :  (date('m/d/Y',strtotime($result['date_of_birth']))));?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['date_of_birth']=='' ? $nullHandler :  (date('m/d/Y',strtotime($resultTemp['date_of_birth']))));?>
												</th>
											</tr>
											<tr class="<?=($result['home_address'] == $resultTemp['home_address'] ? 'hide' : '')?>">
												<th>
													Home Address
												</th>
												<td class="cptlze">
													<?=($result['home_address']=='' ? $nullHandler : $result['home_address']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['home_address']=='' ? $nullHandler : $resultTemp['home_address']);?>
												</th>
											</tr>
											<tr class="<?=($result['mobile_phone'] == $resultTemp['mobile_phone'] ? 'hide' : '')?>">
												<th>
													<?php if ($resultTemp['status']=='Corporate'): ?>
														Office Phone
													<?php else: ?>
														Home/Mobile Phone
													<?php endif ?>
												</th>
												<td class="cptlze">
													<?=($result['mobile_phone']=='' ? $nullHandler : $result['mobile_phone']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['mobile_phone']=='' ? $nullHandler : $resultTemp['mobile_phone']);?>
												</th>
											</tr>
											<tr class="<?=($result['corpo_tin'] == $resultTemp['corpo_tin'] ? 'hide' : '')?>">
												<th>
													TIN
												</th>
												<td class="cptlze">
													<?=($result['corpo_tin']=='' ? $nullHandler : $result['corpo_tin']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['corpo_tin']=='' ? $nullHandler : $resultTemp['corpo_tin']);?>
												</th>
											</tr>
											<tr class="<?=($result['corpo_sss'] == $resultTemp['corpo_sss'] ? 'hide' : '')?>">
												<th>
													SSS
												</th>
												<td class="cptlze">
													<?=($result['corpo_sss']=='' ? $nullHandler : $result['corpo_sss']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['corpo_sss']=='' ? $nullHandler : $resultTemp['corpo_sss']);?>
												</th>
											</tr>
											<tr class="<?=($result['employee_status'] == $resultTemp['employee_status'] ? 'hide' : '')?>">
												<th>
													Employment Status
												</th>
												<td class="cptlze">
													<?=($result['employee_status']=='' ? $nullHandler : $result['employee_status']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['employee_status']=='' ? $nullHandler : $resultTemp['employee_status']);?>
												</th>
											</tr>
											<tr class="<?=($result['name_of_employer'] == $resultTemp['name_of_employer'] ? 'hide' : '')?>">
												<th>
													Name of Employer/Business
												</th>
												<td class="cptlze">
													<?=($result['name_of_employer']=='' ? $nullHandler : $result['name_of_employer']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['name_of_employer']=='' ? $nullHandler : $resultTemp['name_of_employer']);?>
												</th>
											</tr>
											<tr class="<?=($result['business_address'] == $resultTemp['business_address'] ? 'hide' : '')?>">
												<th>
													Business Address
												</th>
												<td class="cptlze">
													<?=($result['business_address']=='' ? $nullHandler : $result['business_address']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['business_address']=='' ? $nullHandler : $resultTemp['business_address']);?>
												</th>
											</tr>
											<tr class="<?=($result['office_phone'] == $resultTemp['office_phone'] ? 'hide' : '')?>">
												<th>
													Office Phone
												</th>
												<td>
													<?=($result['office_phone']=='' ? $nullHandler : $result['office_phone']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['office_phone']=='' ? $nullHandler : $resultTemp['office_phone']);?>
												</th>
											</tr>
											<tr class="<?=($result['nature_of_business'] == $resultTemp['nature_of_business'] ? 'hide' : '')?>">
												<th>
													Nature of Business
												</th>
												<td class="cptlze">
													<?=($result['nature_of_business']=='' ? $nullHandler : $result['nature_of_business']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['nature_of_business']=='' ? $nullHandler : $resultTemp['nature_of_business']);?>
												</th>
											</tr>
											<tr class="<?=($result['occupation'] == $resultTemp['occupation'] ? 'hide' : '')?>">
												<th>
													Occupation
												</th>
												<td class="cptlze">
													<?=($result['occupation']=='' ? $nullHandler : $result['occupation']);?>
												</td>
												<td>
													->
												</td>
												<th class="cptlze">
													<?=($resultTemp['occupation']=='' ? $nullHandler : $resultTemp['occupation']);?>
												</th>
											</tr>
											<tr class="<?=($result['occupation'] == $resultTemp['occupation'] ? 'hide' : '')?>">
												<th>
													Occupation
												</th>
												<td>
													<?=($result['occupation']=='' ? $nullHandler : $result['occupation']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['occupation']=='' ? $nullHandler : $resultTemp['occupation']);?>
												</th>
											</tr>
											<tr class="<?=($result['bank_name'] == $resultTemp['bank_name'] ? 'hide' : '')?>">
												<th>
													Bank name
												</th>
												<td>
													<?=($result['bank_name']=='' ? $nullHandler : $result['bank_name']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['bank_name']=='' ? $nullHandler : $resultTemp['bank_name']);?>
												</th>
											</tr>
											<?php if (($result['is_longTermInvestment'] != $resultTemp['is_longTermInvestment']) || ($result['is_growth'] != $resultTemp['is_growth']) || ($result['is_preservationOfCapital'] != $resultTemp['is_preservationOfCapital']) || ($result['is_speculation'] != $resultTemp['is_speculation'])): ?>
												<tr>
													<th>
														Investment Objective
													</th>
													<td>
														<ul>
															<li><?=(!$result['is_longTermInvestment'] ? "" : "Long Term Investment")?></li>
															<li><?=(!$result['is_growth'] ? "" : "Growth");?></li>
															<li><?=(!$result['is_preservationOfCapital'] ? "" : "Preservation of Capital");?></li>
															<li><?=(!$result['is_speculation'] ? "" : "Speculation");?></li>
														</ul>
													</td>
													<td>
														->
													</td>
													<th>
														<ul>
															<li><?=(!$resultTemp['is_longTermInvestment'] ? "" : "Long Term Investment")?></li>
															<li><?=(!$resultTemp['is_growth'] ? "" : "Growth");?></li>
															<li><?=(!$resultTemp['is_preservationOfCapital'] ? "" : "Preservation of Capital");?></li>
															<li><?=(!$resultTemp['is_speculation'] ? "" : "Speculation");?></li>
														</ul>
													</th>
												</tr>
											<?php endif ?>
											<tr class="<?=($result['years_of_trading'] == $resultTemp['years_of_trading'] ? 'hide' : '')?>">
												<th>
													Years of Experience in trading
												</th>
												<td>
													<?=($result['years_of_trading']=='' ? $nullHandler : $result['years_of_trading']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['years_of_trading']=='' ? $nullHandler : $resultTemp['years_of_trading']);?>
												</th>
											</tr>
											<?php if (($result['is_salary']!=$resultTemp['is_salary']) || ($result['is_business_investments']!=$resultTemp['is_business_investments']) || ($result['is_inheritance']!=$resultTemp['is_inheritance']) || ($result['is_remittances']!=$resultTemp['is_remittances']) || ($result['is_source_income_others']!=$resultTemp['is_source_income_others']) || ($result['other_source_income']!=$resultTemp['other_source_income'])): ?>
												<tr>
													<th>
														Source of Income
													</th>
													<td>
														<ul>
															<li><?=(!$result['is_salary'] ? "" : "Salary")?></li>
															<li><?=(!$result['is_business_investments'] ? "" : "Business/Investments");?></li>
															<li><?=(!$result['is_inheritance'] ? "" : "Inheritance");?></li>
															<li><?=(!$result['is_remittances'] ? "" : "Remittances");?></li>
															<li><?=($result['other_source_income']=='' ? "" : $result['other_source_income']);?></li>
														</ul>
													</td>
													<td>
														->
													</td>
													<th>
														<ul>
															<li><?=(!$resultTemp['is_salary'] ? "" : "Salary")?></li>
															<li><?=(!$resultTemp['is_business_investments'] ? "" : "Business/Investments");?></li>
															<li><?=(!$resultTemp['is_inheritance'] ? "" : "Inheritance");?></li>
															<li><?=(!$resultTemp['is_remittances'] ? "" : "Remittances");?></li>
															<li><?=($resultTemp['other_source_income']=='' ? "" : $resultTemp['other_source_income']);?></li>
														</ul>
													</th>
												</tr>
											<?php endif ?>
											<?php if (($result['is_time_deposit']!=$resultTemp['is_time_deposit']) || ($result['is_bonds']!=$resultTemp['is_bonds']) || ($result['is_stocks']!=$resultTemp['is_stocks']) || ($result['is_mutual_fund']!=$resultTemp['is_mutual_fund']) || ($result['is_uitf']!=$resultTemp['is_uitf']) || ($result['is_none']!=$resultTemp['is_none']) || ($result['is_investment_exp_others']!=$resultTemp['is_investment_exp_others']) || ($result['other_investment_exp']!=$resultTemp['other_investment_exp'])): ?>
												<tr>
													<th>
														Investment Experience
													</th>
													<td>
														<ul>
															<li><?=(!$result['is_time_deposit'] ? "" : "Time Deposit")?></li>
															<li><?=(!$result['is_bonds'] ? "" : "Bonds");?></li>
															<li><?=(!$result['is_stocks'] ? "" : "Stocks");?></li>
															<li><?=(!$result['is_mutual_fund'] ? "" : "Mutual Fund");?></li>
															<li><?=(!$result['is_uitf'] ? "" : "UITF");?></li>
															<li><?=(!$result['is_none'] ? "" : "None");?></li>
															<li><?=($result['other_investment_exp']=='' ? "" : $result['other_investment_exp']);?></li>
														</ul>
													</td>
													<td>
														->
													</td>
													<th>
														<ul>
															<li><?=(!$resultTemp['is_time_deposit'] ? "" : "Time Deposit")?></li>
															<li><?=(!$resultTemp['is_bonds'] ? "" : "Bonds");?></li>
															<li><?=(!$resultTemp['is_stocks'] ? "" : "Stocks");?></li>
															<li><?=(!$resultTemp['is_mutual_fund'] ? "" : "Mutual Fund");?></li>
															<li><?=(!$resultTemp['is_uitf'] ? "" : "UITF");?></li>
															<li><?=(!$resultTemp['is_none'] ? "" : "None");?></li>
															<li><?=($resultTemp['other_investment_exp']=='' ? "" : $resultTemp['other_investment_exp']);?></li>
														</ul>
													</th>
												</tr>
											<?php endif ?>
											<tr class="<?=($result['annual_income'] == $resultTemp['annual_income'] ? 'hide' : '')?>">
												<th>
													Annual Income
												</th>
												<td>
													<?=($result['annual_income']=='' ? $nullHandler : $result['annual_income']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['annual_income']=='' ? $nullHandler : $resultTemp['annual_income']);?>
												</th>
											</tr>
											<tr class="<?=($result['assets'] == $resultTemp['assets'] ? 'hide' : '')?>">
												<th>
													Assets
												</th>
												<td>
													<?=($result['assets']=='' ? $nullHandler : $result['assets']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['assets']=='' ? $nullHandler : $resultTemp['assets']);?>
												</th>
											</tr>
											<tr class="<?=($result['net_worth'] == $resultTemp['net_worth'] ? 'hide' : '')?>">
												<th>
													Net Worth
												</th>
												<td>
													<?=($result['net_worth']=='' ? $nullHandler : $result['net_worth']);?>
												</td>
												<td>
													->
												</td>
												<th>
													<?=($resultTemp['net_worth']=='' ? $nullHandler : $resultTemp['net_worth']);?>
												</th>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</li>
						<li>
							<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">monetization_on</i> Additional Deposit</a>
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
															<?=(isset($rowADT['amount']) && $rowADT['amount'] != '' ? number_format($rowADT['amount'],2) : '')?>
														</td>
														<td>
															<?=$rowADT['due_date']?>
														</td>
														<td>
															<?=(isset($rowADT['amount_reflected']) && $rowADT['amount_reflected'] != '' ? number_format($rowADT['amount_reflected'],2) : '')?>
														</td>
														<td>
															<?=$rowADT['email']?>
														</td>
														<td>
															<?=($result['dateCreated']=='' ? $nullHandler : (date('m/d/Y',strtotime($result['dateCreated']))));?>
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
							<a class="collapsible-header waves-effect waves-grey"><i class="material-icons">local_atm</i> Withdrawal Request</a>
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
															<?=(isset($rowADT['amount']) && $rowADT['amount'] != '' ? number_format($rowADT['amount'],2) : '')?>
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
													<td class="actions-td">
														<?php if (isset($result['proof_of_billing'])): ?>
															<?php if ($result['proof_of_billing'] != ""): ?>
																<a href="#uploadProofOfBilling" data-trigger="uploadProofOfBilling" class="modal-trigger">Update</a>
																<a href="client-details?id=<?=$_GET['id']?>&deleteProofOfBilling=<?=$result['id']?>" class="danger">Delete</a>
															<?php endif; ?>
														<?php endif ?>
													</td>
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
													<td class="actions-td">
														<?php if (isset($result['bank_certificate'])): ?>
															<?php if ($result['bank_certificate'] != ""): ?>
																<a href="#uploadBankCert" data-trigger="uploadBankCert" class="modal-trigger">Update</a>
																<a href="client-details?id=<?=$_GET['id']?>&deleteBankCert=<?=$result['id']?>" class="danger">Delete</a>
															<?php endif; ?>
														<?php endif ?>
													</td>
													</td>
												</tr>
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
				<a href="forApprovalClientEdit?id=<?=$_GET['id']?>&faAccept=1" class="btn">Approve</a>
				<a href="forApprovalClientEdit?id=<?=$_GET['id']?>&faReject=1" class="btn red lighten-1">Reject</a>
				<a href="clients" class="btn grey lighten-1">Back</a>
			</div>
		</div>
	</div>
		
<?php include('footer.php') ?>