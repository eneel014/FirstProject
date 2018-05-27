<?php $pageTitle = "Edit Client"; ?>
<?php $bodyClass = "edit-client-page"; ?>
<?php $navActive = "clients" ?>
<?php include('header.php'); ?>
<?php include('includes/mysql_connect.php'); ?>
<?php 
$client_id = $_GET['id'];
$query = "SELECT * FROM tbl_clients	 WHERE id = '$client_id'";
$result = $conn->query($query); 
$r = $result->fetch_assoc(); ?>

<!-- Test -->

<form method="POST" name="editClientForm" id="editClientForm">
	<div class="section">
		<div class="row"><div class="col s12">&nbsp;</div></div>
		<div class="container z-depth-3">
			<div class="row"><div class="col s12">&nbsp;</div></div>
			<div class="row error-row">
				<div class="col s10 offset-s1 red lighten-1 white-text center error-div">
					<div class="row"></div>
					<h6>User ID '<span></span>' already exists in the system.</h6>
					<a href="#!" class="white-text"><i class="material-icons">close</i></a>
					<div class="row"></div>
				</div>
			</div>
			<div class="row">
				<div class="col s10 offset-s1">
					<h1 class="heading center"><i class="material-icons large">info</i></h1>
					<h4 class="heading center">Account Details</h4>
				</div>
			</div>
			<div class="row">
				<div class="col s10 offset-s1">
					<input type="hidden" name="employeeName" id="employeeName">
					<script>
						$('document').ready(function() {
							var empName = readCookie('username');
							$('#employeeName').val(empName);

							console.log($('#employeeName').val());
						});
					</script>
					<div class="row">
						<div class="col s6 input-field">
							<input id="txtUserID" name="txtUserID" value="<?php echo (isset($_POST['txtUserID']) ? $_POST['txtUserID'] : ($r['user_id'])); ?>" type="text" class="validate">
							<label for="txtUserID">User ID</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtInitialPassword" name="txtInitialPassword" value="<?php echo (isset($_POST['txtInitialPassword']) ? $_POST['txtInitialPassword'] : (($r['initial_password']) ? $r['initial_password'] : '')); ?>" type="text" class="validate">
							<label for="txtInitialPassword">Initial Password</label>
						</div>
					</div>
					<div class="row">
						<div class="col s3">
							<label>Status</label>
							<select required class="browser-default" name="slcStatus" id="slcStatus">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcStatus']) ? ($_POST['slcStatus']=="Individual" ? "selected" : "") : ($r['status']=="Individual" ? "selected": "")) ?> value="Individual">Individual</option>
								<option <?=(isset($_POST['slcStatus']) ? ($_POST['slcStatus']=="Joint" ? "selected" : "") : ($r['status']=="Joint" ? "selected": "")) ?> value="Joint">Joint</option>
								<option <?=(isset($_POST['slcStatus']) ? ($_POST['slcStatus']=="Fund" ? "selected" : "") : ($r['status']=="Fund" ? "selected": "")) ?> value="Fund">Fund</option>
								<option <?=(isset($_POST['slcStatus']) ? ($_POST['slcStatus']=="Corporate" ? "selected" : "") : ($r['status']=="Corporate" ? "selected": "")) ?> value="Corporate">Corporate</option>
							</select>
						</div>
						<div class="col s3">
							<label>Account Status</label>
							<select required class="browser-default" id="slcAccountStatus" name="slcAccountStatus">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcAccountStatus']) ? ($_POST['slcAccountStatus']=="Active" ? "selected" : "") : ($r['account_status']=="Active" ? "selected": "")) ?> value="Active">Active</option>
								<option <?=(isset($_POST['slcAccountStatus']) ? ($_POST['slcAccountStatus']=="Close" ? "selected" : "") : ($r['account_status']=="Close" ? "selected": "")) ?> value="Close">Close</option>
							</select>
						</div>
						<div class="col s3">
							<label>Seminar</label>
							<select required class="browser-default" id="slcSeminar" name="slcSeminar">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcSeminar']) ? ($_POST['slcSeminar']=="N/A" ? "selected" : "") : ($r['seminar']=="N/A" ? "selected": "")) ?> value="N/A">N/A</option>
								<option <?=(isset($_POST['slcSeminar']) ? ($_POST['slcSeminar']=="Basic" ? "selected" : "") : ($r['seminar']=="Basic" ? "selected": "")) ?> value="Basic">Basic</option>
								<option <?=(isset($_POST['slcSeminar']) ? ($_POST['slcSeminar']=="Advance" ? "selected" : "") : ($r['seminar']=="Advance" ? "selected": "")) ?> value="Advance">Advance</option>
							</select>
						</div>
						<div class="col s3">
							<label>Account Type</label>
							<select class="browser-default" id="slcAccountType" name="slcAccountType">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcAccountType']) ? ($_POST['slcAccountType']=="Opening" ? "selected" : "") : ($r['account_type']=="Opening" ? "selected": "")) ?> value="Opening">Opening</option>
								<option <?=(isset($_POST['slcAccountType']) ? ($_POST['slcAccountType']=="Potential" ? "selected" : "") : ($r['account_type']=="Potential" ? "selected": "")) ?> value="Potential">Potential</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s6 input-field">
							<input id="txtareaSecurityCompany" type="text" required name="txtareaSecurityCompany" value="<?php echo (isset($_POST['txtareaSecurityCompany']) ? $_POST['txtareaSecurityCompany'] : ($r['security_company'])); ?>" class="validate">
							<label for="txtareaSecurityCompany">Security Company</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtRereferredBy" type="text" name="txtRereferredBy" required value="<?php echo (isset($_POST['txtRereferredBy']) ? $_POST['txtRereferredBy'] : ($r['referred_by'])); ?>" class="validate">
							<label for="txtRereferredBy">Referred By/Agent's Name</label>
						</div>
					</div>

					<div id="additionalSecCom" class="row grey lighten-4" style="display: none;">
						<div class="col s6 input-field">
							<input id="txtareaSecurityCompany1" name="txtareaSecurityCompany1" type="text" value="<?php echo (isset($_POST['txtareaSecurityCompany1']) ? $_POST['txtareaSecurityCompany1'] : $r['security_company1']); ?>" class="validate">
							<label for="txtareaSecurityCompany1">Security Company History</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtUserID1" name="txtUserID1" type="text" value="<?php echo (isset($_POST['txtUserID1']) ? $_POST['txtUserID1'] : $r['userid1']); ?>" class="validate">
							<label for="txtUserID1">User ID</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtareaSecurityCompany2" name="txtareaSecurityCompany2" type="text" value="<?php echo (isset($_POST['txtareaSecurityCompany2']) ? $_POST['txtareaSecurityCompany2'] : $r['security_company2']); ?>" class="validate">
							<label for="txtareaSecurityCompany2"></label>
						</div>
						<div class="col s6 input-field">
							<input id="txtUserID2" name="txtUserID2" type="text" value="<?php echo (isset($_POST['txtUserID2']) ? $_POST['txtUserID2'] : $r['userid2']); ?>" class="validate">
							<label for="txtUserID2"></label>
						</div>
						<div class="col s6 input-field">
							<input id="txtareaSecurityCompany3" name="txtareaSecurityCompany3" type="text" value="<?php echo (isset($_POST['txtareaSecurityCompany3']) ? $_POST['txtareaSecurityCompany3'] : $r['security_company3']); ?>" class="validate">
							<label for="txtareaSecurityCompany3"></label>
						</div>
						<div class="col s6 input-field">
							<input id="txtUserID3" name="txtUserID3" type="text" value="<?php echo (isset($_POST['txtUserID3']) ? $_POST['txtUserID3'] : $r['userid3']); ?>" class="validate">
							<label for="txtUserID3"></label>
						</div>
					</div>

					<div class="row">
						<div class="col s12 input-field">
							<textarea name="txtAreaRemarks" class="materialize-textarea" id="txtAreaRemarks"><?php echo (isset($_POST['txtAreaRemarks']) ? $_POST['txtAreaRemarks'] : ($r['remarks_comments'])); ?></textarea>
							<label for="txtAreaRemarks">Remarks/Comment</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s10 offset-s1">
					<div class="divider"></div>
					<h1 class="heading center"><i class="material-icons large">account_circle</i></h1>
					<h4 class="heading center">Personal Information</h4>
				</div>
			</div>
			<!--  -->
			<div class="row corpo-hidden">
				<div class="col s10 offset-s1">
					<div class="row">
						<div class="col s4 input-field corpo-remove-required">
							<input id="txtFirstname" name="txtFirstname" required="required" value="<?php echo (isset($_POST['txtFirstname']) ? $_POST['txtFirstname'] : ($r['firstname'])); ?>" type="text" class="validate">
							<label for="txtFirstname">First Name</label>
						</div>
						<div class="col s4 input-field corpo-remove-required">
							<input id="txtLastname" name="txtLastname" required="required" value="<?php echo (isset($_POST['txtLastname']) ? $_POST['txtLastname'] : ($r['lastname'])); ?>" type="text" class="validate">
							<label for="txtLastname">Last Name</label>
						</div>
						<div class="col s4 input-field corpo-remove-required">
							<input id="txtMotherMaiden" name="txtMotherMaiden" required="required" value="<?php echo (isset($_POST['txtMotherMaiden']) ? $_POST['txtMotherMaiden'] : ($r['mother_mname'])); ?>" type="text" class="validate">
							<label for="txtMotherMaiden">Mother's Maiden Name</label>
						</div>
					</div>
					<div class="row valign-wrapper">
						<div class="col s4 input-field">
							<input id="txtPlaceOfBirth" name="txtPlaceOfBirth" value="<?php echo (isset($_POST['txtPlaceOfBirth']) ? $_POST['txtPlaceOfBirth'] : ($r['place_of_birth'])); ?>" type="text" class="validate">
							<label for="txtPlaceOfBirth">Place of Birth</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtNationality" name="txtNationality" value="<?php echo (isset($_POST['txtNationality']) ? $_POST['txtNationality'] : ($r['nationality'])); ?>" type="text" class="validate">
							<label for="txtNationality">Nationality</label>
						</div>
						<div class="col s1 corpo-remove-required">
							<input class="" required name="rdoGender" <?=(isset($_POST['rdoGender']) ? ($_POST['rdoGender']=="Male" ? "checked" : '') : ($r['gender']=="Male" ? "checked" : "")); ?> value="Male" type="radio" id="test3"  />
							<label for="test3">Male</label> 
						</div>
						<div class="col s1 corpo-remove-required">
							<input class="" required name="rdoGender" <?=(isset($_POST['rdoGender']) ? ($_POST['rdoGender']=="Female" ? "checked" : '') : ($r['gender']=="Female" ? "checked" : "")); ?> value="Female" type="radio" id="test4"  />
							<label for="test4">Female</label>
						</div>
						<div class="col s4"></div>
					</div>
					<div class="row">
						<div class="col s4 input-field corpo-remove-required">
							<input id="txtEmailAdd" required name="txtEmailAdd" value="<?php echo (isset($_POST['txtEmailAdd']) ? $_POST['txtEmailAdd'] : ($r['email_add'])); ?>" type="email" class="validate">
							<label for="txtEmailAdd">Email Address</label>
						</div>
						<div class="col s4">
							<label>Civil Status</label>
							<select class="browser-default" id="slcCivilStatus" name="slcCivilStatus">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Single" ? "selected" : "") : ($r['civil_status']=="Single" ? "selected": "")) ?> value="Single">Single</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Married" ? "selected" : "") : ($r['civil_status']=="Married" ? "selected": "")) ?> value="Married">Married</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Widowed" ? "selected" : "") : ($r['civil_status']=="Widowed" ? "selected": "")) ?> value="Widowed">Widowed</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Separated" ? "selected" : "") : ($r['civil_status']=="Separated" ? "selected": "")) ?> value="Separated">Separated</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Divorced" ? "selected" : "") : ($r['civil_status']=="Divorced" ? "selected": "")) ?> value="Divorced">Divorced</option>
							</select>
						</div>
						<div class="col s4 input-field">
							<input id="txtSpouse" name="txtSpouse" value="<?php echo (isset($_POST['txtSpouse']) ? $_POST['txtSpouse'] : ($r['name_of_spouse'])); ?>" type="text" disabled class="validate">
							<label for="txtSpouse">Name of Spouse</label>
						</div>
					</div>

					<div class="row">
						<div class="col s2 input-field">
							<?php 
							if ($r['date_of_birth'] !='') {
								$birthdate =strtotime($r['date_of_birth']);
							}
							
							 ?>
							<input id="txtBirthDate" name="txtBirthDate" value="<?php echo (isset($_POST['txtBirthDate']) ? $_POST['txtBirthDate'] : (($r['date_of_birth']!='') ? date('m/d/Y', $birthdate) : '')); ?>" type="text" class="datepicker">
							<label for="txtBirthDate">Date of Birth</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtAddress" name="txtAddress" value="<?php echo (isset($_POST['txtAddress']) ? $_POST['txtAddress'] : ($r['home_address'])); ?>" type="text" class="validate">
							<label for="txtAddress">Home Address</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtMobPhone" name="txtMobPhone" value="<?php echo (isset($_POST['txtMobPhone']) ? $_POST['txtMobPhone'] : ($r['mobile_phone'])); ?>" type="text" class="validate">
							<label for="txtMobPhone">Home/Mobile Phone</label>
						</div>
					</div>
					<div class="row"><div class="s12 col">&nbsp;</div></div>
					<div class="row">
						<div class="col s4">
							<label>Employment Status</label>
							<select class="browser-default" id="slcEmpStatus" name="slcEmpStatus">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Employed" ? "selected" : "") : ($r['employee_status']=="Employed" ? "selected": "")) ?> value="Employed">Employed</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Self-Employed" ? "selected" : "") : ($r['employee_status']=="Self-Employed" ? "selected": "")) ?> value="Self-Employed">Self-Employed</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Unemployed" ? "selected" : "") : ($r['employee_status']=="Unemployed" ? "selected": "")) ?> value="Unemployed">Unemployed</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Retired" ? "selected" : "") : ($r['employee_status']=="Retired" ? "selected": "")) ?> value="Retired">Retired</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Student" ? "selected" : "") : ($r['employee_status']=="Student" ? "selected": "")) ?> value="Student">Student</option>
							</select>
						</div>

						<div class="col s4 input-field">
							<input id="txtNameOfEmployer" name="txtNameOfEmployer" value="<?php echo (isset($_POST['txtNameOfEmployer']) ? $_POST['txtNameOfEmployer'] : ($r['name_of_employer'])); ?>" type="text" class="validate">
							<label for="txtNameOfEmployer">Name of Employer/Business</label>
						</div>

						<div class="col s4 input-field">
							<input id="txtBusinessAddress" name="txtBusinessAddress" value="<?php echo (isset($_POST['txtBusinessAddress']) ? $_POST['txtBusinessAddress'] : ($r['business_address'])); ?>" type="text" class="validate">
							<label for="txtBusinessAddress">Business Address</label>
						</div>
					</div>

					<div class="row">
						<div class="s4 col input-field">
							<input id="txtOfcPhone" name="txtOfcPhone" value="<?php echo (isset($_POST['txtOfcPhone']) ? $_POST['txtOfcPhone'] : ($r['office_phone'])); ?>" type="text" class="validate">
							<label for="txtOfcPhone">Office Phone</label>
						</div>
						<div class="s4 col input-field">
							<input id="txtNatureOfBusiness" name="txtNatureOfBusiness" value="<?php echo (isset($_POST['txtNatureOfBusiness']) ? $_POST['txtNatureOfBusiness'] : ($r['nature_of_business'])); ?>" type="text" class="validate autocompete">
							<label for="txtNatureOfBusiness">Nature of Business</label>
						</div>
						<div class="s4 col input-field">
							<input id="txtOccupation" name="txtOccupation" value="<?php echo (isset($_POST['txtOccupation']) ? $_POST['txtOccupation'] : ($r['occupation'])); ?>" type="text" class="validate">
							<label for="txtOccupation">Occupation</label>
						</div>
					</div>
				</div>
			</div>
			<!--  -->

			<!-- Corporate Start -->
			<div class="row corpo-show hide corpo-add-required">
				<div class="col s10 offset-s1">
					<div class="row">
						<div class="col s6 input-field">
							<input id="txtCorpoName" name="txtCorpoName" value="<?php echo (isset($_POST['txtCorpoName']) ? $_POST['txtCorpoName'] : ($r['firstname'])); ?>" type="text" class="validate">
							<label for="txtCorpoName">Company Name</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtCorpoAddress" name="txtCorpoAddress" value="<?php echo (isset($_POST['txtCorpoAddress']) ? $_POST['txtCorpoAddress'] : ($r['business_address'])); ?>" type="text" class="validate">
							<label for="txtCorpoAddress">Business Address</label>
						</div>
					</div>
					<div class="row">
						<div class="col s4 input-field">
							<input id="txtCorpoEmail" name="txtCorpoEmail" value="<?php echo (isset($_POST['txtCorpoEmail']) ? $_POST['txtCorpoEmail'] : ($r['email_add'])); ?>" type="email" class="validate">
							<label for="txtCorpoEmail">Email Address</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtCorpoOfficePhone" name="txtCorpoOfficePhone" value="<?php echo (isset($_POST['txtCorpoOfficePhone']) ? $_POST['txtCorpoOfficePhone'] : ($r['mobile_phone'])); ?>" type="text" class="validate">
							<label for="txtCorpoOfficePhone">Office Phone</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtCorpoTIN" name="txtCorpoTIN" value="<?php echo (isset($_POST['txtCorpoTIN']) ? $_POST['txtCorpoTIN'] : ($r['corpo_tin'])); ?>" type="text" class="validate">
							<label for="txtCorpoTIN">TIN</label>
						</div>
					</div>
				</div>
			</div>
			<!-- Corporate End -->

			<!-- Common Details -->
			<div class="row">
				<div class="col s10 offset-s1">
					<div class="row">
						<div class="col s4 input-field corpo-hidden">
							<input id="txtBankName" name="txtBankName" value="<?php echo (isset($_POST['txtBankName']) ? $_POST['txtBankName'] : ($r['bank_name'])); ?>" type="text" class="validate">
							<label for="txtBankName">Bank Name</label>
						</div>
						<div class="col s4 input-field corpo-show hide corpo-add-required">
							<input id="txtSSS" name="txtSSS" value="<?php echo (isset($_POST['txtSSS']) ? $_POST['txtSSS'] : ($r['corpo_sss'])); ?>" type="text" class="validate">
							<label for="txtSSS">SSS</label>
						</div>
						<div class="col s4">
							<p>Investment Objective</p>
							<p>
								<input type="checkbox" name="chckInvestmentObjLongTerm" <?=isset($_POST['chckInvestmentObjLongTerm']) ? 'checked' : ($r['is_longTermInvestment'] ? "checked" : "") ?> id="chckInvestmentObjLongTerm" />
								<label for="chckInvestmentObjLongTerm">Long Term Investment</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentObjGrowth']) ? 'checked' : ($r['is_growth'] ? "checked" : "") ?> <?=isset($_POST['chckInvestmentObjGrowth']) ? 'checked' : '' ?> name="chckInvestmentObjGrowth" id="chckInvestmentObjGrowth" />
								<label for="chckInvestmentObjGrowth">Growth</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentObjPreservation']) ? 'checked' : ($r['is_preservationOfCapital'] ? "checked" : "") ?> name="chckInvestmentObjPreservation" id="chckInvestmentObjPreservation" />
								<label for="chckInvestmentObjPreservation">Preservation</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentObjSpeculation']) ? 'checked' : ($r['is_speculation'] ? "checked" : "") ?> <?=isset($_POST['chckInvestmentObjSpeculation']) ? 'checked' : '' ?> name="chckInvestmentObjSpeculation" id="chckInvestmentObjSpeculation" />
								<label for="chckInvestmentObjSpeculation">Speculation</label>
							</p>
						</div>
						<div class="col s4">
							<label>Years of Experience in Trading</label>
							<select class="browser-default" id="slcYrsOfExpInTrading" required name="slcYrsOfExpInTrading">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcYrsOfExpInTrading']) ? ($_POST['slcYrsOfExpInTrading']=="Less than 1 year" ? "selected" : "") : ($r['years_of_trading']=="Less than 1 year" ? "selected": ""))?> value="Less than 1 year">Less than 1 year</option>
								<option <?=(isset($_POST['slcYrsOfExpInTrading']) ? ($_POST['slcYrsOfExpInTrading']=="Less than 5 years" ? "selected" : "") : ($r['years_of_trading']=="Less than 5 years" ? "selected": ""))?> value="Less than 5 years">Less than 5 years</option>
								<option <?=(isset($_POST['slcYrsOfExpInTrading']) ? ($_POST['slcYrsOfExpInTrading']=="More than 5 years" ? "selected" : "") : ($r['years_of_trading']=="More than 5 years" ? "selected": ""))?> value="More than 5 years">More than 5 years</option>
								<option <?=(isset($_POST['slcYrsOfExpInTrading']) ? ($_POST['slcYrsOfExpInTrading']=="Less than 10 years" ? "selected" : "") : ($r['years_of_trading']=="Less than 10 years" ? "selected": ""))?> value="Less than 10 years">Less than 10 years</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s3">
							<p>Source of Income</p>
							<p>
								<input type="checkbox" name="chckSourceIncomeSalary" <?=isset($_POST['chckSourceIncomeSalary']) ? 'checked' : ($r['is_salary'] ? "checked" : "") ?> id="chckSourceIncomeSalary" />
								<label for="chckSourceIncomeSalary">Salary</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckSourceIncomeBusinessInvestments']) ? 'checked' : ($r['is_business_investments'] ? "checked" : "") ?> name="chckSourceIncomeBusinessInvestments" id="chckSourceIncomeBusinessInvestments" />
								<label for="chckSourceIncomeBusinessInvestments">Business/Investments</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckSourceIncomeInheritance']) ? 'checked' : ($r['is_inheritance'] ? "checked" : "") ?> name="chckSourceIncomeInheritance" id="chckSourceIncomeInheritance" />
								<label for="chckSourceIncomeInheritance">Inheritance</label>
							</p>
						</div>
						<div class="col s3">
							<p>&nbsp;</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckSourceIncomeRemittances']) ? 'checked' : ($r['is_remittances'] ? "checked" : "") ?> name="chckSourceIncomeRemittances" id="chckSourceIncomeRemittances" />
								<label for="chckSourceIncomeRemittances">Remittances</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckSourceIncomeOthers']) ? 'checked' : ($r['is_source_income_others'] ? "checked" : "") ?> id="chckSourceIncomeOthers" name="chckSourceIncomeOthers" />
								<label for="chckSourceIncomeOthers">Others</label>
							</p>
							<p class="source-income input-field scale-transition <?=isset($_POST['chckSourceIncomeOthers']) ? '' : ($r['is_source_income_others'] ? "" : 'scale-out') ?> ">
								<input id="txtSourceIncomeOthers" name="txtSourceIncomeOthers" value="<?php echo (isset($_POST['txtSourceIncomeOthers']) ? $_POST['txtSourceIncomeOthers'] : ($r['other_source_income'])); ?>" type="text" class="validate">
								<label for="txtSourceIncomeOthers">Other Source of Income</label>
							</p>
						</div>
						<div class="col s3">
							<p>Investment Experience</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpTimeDeposit']) ? 'checked' : ($r['is_time_deposit'] ? "checked" : "") ?> id="chckInvestmentExpTimeDeposit" name="chckInvestmentExpTimeDeposit" />
								<label for="chckInvestmentExpTimeDeposit">Time Deposit</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpBonds']) ? 'checked' : ($r['is_bonds'] ? "checked" : "") ?> id="chckInvestmentExpBonds" name="chckInvestmentExpBonds" />
								<label for="chckInvestmentExpBonds">Bonds</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpStocks']) ? 'checked' : ($r['is_stocks'] ? "checked" : "") ?> id="chckInvestmentExpStocks" name="chckInvestmentExpStocks" />
								<label for="chckInvestmentExpStocks">Stocks</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpMutualFund']) ? 'checked' : ($r['is_mutual_fund'] ? "checked" : "") ?> id="chckInvestmentExpMutualFund" name="chckInvestmentExpMutualFund" />
								<label for="chckInvestmentExpMutualFund">Mutual Fund</label>
							</p>
						</div>
						<div class="col s3">
							<p>&nbsp;</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpUITF']) ? 'checked' : ($r['is_uitf'] ? "checked" : "") ?> id="chckInvestmentExpUITF" name="chckInvestmentExpUITF" />
								<label for="chckInvestmentExpUITF">UITF</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpNone']) ? 'checked' : ($r['is_none'] ? "checked" : "") ?> id="chckInvestmentExpNone" name="chckInvestmentExpNone" />
								<label for="chckInvestmentExpNone">None</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpOthers']) ? 'checked' : ($r['is_investment_exp_others'] ? "checked" : "") ?> id="chckInvestmentExpOthers" name="chckInvestmentExpOthers" />
								<label for="chckInvestmentExpOthers">Others</label>
							</p>
							<p class="investment-experience input-field scale-transition <?=isset($_POST['chckInvestmentExpOthers']) ? '' : ($r['is_investment_exp_others'] ? "" : 'scale-out') ?>">
								<input id="txtInvestmentExpOthers" name="txtInvestmentExpOthers" value="<?php echo (isset($_POST['txtInvestmentExpOthers']) ? $_POST['txtInvestmentExpOthers'] : ($r['other_investment_exp'])); ?>" type="text" class="validate">
								<label for="txtInvestmentExpOthers">Other Investment Experience</label>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="col s4">
							<label>Annual Income</label>
							<select class="browser-default" required id="slcAnnualIncome" name="slcAnnualIncome">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcAnnualIncome']) ? ($_POST['slcAnnualIncome']=="Less than 1 Million" ? "selected" : ""): ($r['annual_income']=="Less than 1 Million" ? "selected": "")) ?> value="Less than 1 Million">Less than 1 Million</option>
								<option <?=(isset($_POST['slcAnnualIncome']) ? ($_POST['slcAnnualIncome']=="Less than 5 Million" ? "selected" : ""): ($r['annual_income']=="Less than 5 Million" ? "selected": "")) ?> value="Less than 5 Million">Less than 5 Million</option>
								<option <?=(isset($_POST['slcAnnualIncome']) ? ($_POST['slcAnnualIncome']=="More than 5 Million" ? "selected" : ""): ($r['annual_income']=="More than 5 Million" ? "selected": "")) ?> value="More than 5 Million">More than 5 Million</option>
								<option <?=(isset($_POST['slcAnnualIncome']) ? ($_POST['slcAnnualIncome']=="Less than 10 Million" ? "selected" : ""): ($r['annual_income']=="Less than 10 Million" ? "selected": "")) ?> value="Less than 10 Million">Less than 10 Million</option>
							</select>
						</div>
						<div class="col s4">
							<label>Assets</label>
							<select class="browser-default" required id="slcAssets" name="slcAssets">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcAssets']) ? ($_POST['slcAssets']=="Less than 1 Million" ? "selected" : ""): ($r['assets']=="Less than 1 Million" ? "selected": "")) ?> value="Less than 1 Million">Less than 1 Million</option>
								<option <?=(isset($_POST['slcAssets']) ? ($_POST['slcAssets']=="Less than 5 Million" ? "selected" : ""): ($r['assets']=="Less than 5 Million" ? "selected": "")) ?> value="Less than 5 Million">Less than 5 Million</option>
								<option <?=(isset($_POST['slcAssets']) ? ($_POST['slcAssets']=="More than 5 Million" ? "selected" : ""): ($r['assets']=="More than 5 Million" ? "selected": "")) ?> value="More than 5 Million">More than 5 Million</option>
								<option <?=(isset($_POST['slcAssets']) ? ($_POST['slcAssets']=="Less than 10 Million" ? "selected" : ""): ($r['assets']=="Less than 10 Million" ? "selected": "")) ?> value="Less than 10 Million">Less than 10 Million</option>
							</select>
						</div>
						<div class="col s4">
							<label>Net worth</label>
							<select class="browser-default" required id="slcNetWorth" name="slcNetWorth">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcNetWorth']) ? ($_POST['slcNetWorth']=="Less than 1 Million" ? "selected" : ""): ($r['net_worth']=="Less than 1 Million" ? "selected": "")) ?> value="Less than 1 Million">Less than 1 Million</option>
								<option <?=(isset($_POST['slcNetWorth']) ? ($_POST['slcNetWorth']=="Less than 5 Million" ? "selected" : ""): ($r['net_worth']=="Less than 5 Million" ? "selected": "")) ?> value="Less than 5 Million">Less than 5 Million</option>
								<option <?=(isset($_POST['slcNetWorth']) ? ($_POST['slcNetWorth']=="More than 5 Million" ? "selected" : ""): ($r['net_worth']=="More than 5 Million" ? "selected": "")) ?> value="More than 5 Million">More than 5 Million</option>
								<option <?=(isset($_POST['slcNetWorth']) ? ($_POST['slcNetWorth']=="Less than 10 Million" ? "selected" : ""): ($r['net_worth']=="Less than 10 Million" ? "selected": "")) ?> value="Less than 10 Million">Less than 10 Million</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col s10 offset-s1">
					<div class="row"><div class="col s12"><div class="divider"></div></div></div>

					<div class="row">
						<div class="col s12 right-align">
							<input type="submit" value="Save" name="btnSubmitEditClient" id="btnSubmitEditClient" class="btn waves-effect waves-light">
							<a href="client-details?id=<?=$client_id?>" class="btn waves-effect waves-light grey lighten-1">Cancel</a>
						</div>
					</div>

					<div class="row"><div class="col s12">&nbsp;</div></div>
				</div>
			</div>
		</div>
		
	</div>
</form>
	<?php include('includes/editClientFunction.php'); ?>
	<?php include('includes/editClientModal.php'); ?>
<?php include('footer.php') ?>