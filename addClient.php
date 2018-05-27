<?php $pageTitle = "Clients"; ?>
<?php $bCrumbs = "Clients List"; ?>
<?php $bodyClass = "add-client-page"; ?>
<?php $navActive = "clients" ?>
<?php include('header.php'); ?>
<form method="POST" name="addClientForm" id="addClientForm">
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
					<?php if (isset($_GET['type'])): ?>
						<input type="hidden" name="accountType" id="accountType" value="<?=$_GET['type'];?>">
					<?php else: ?>
						<script>window.location.href='clients.php';</script>
					<?php endif ?>
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
							<input id="txtUserID" name="txtUserID" value="<?php echo (isset($_POST['txtUserID']) ? $_POST['txtUserID'] : ''); ?>" autocomplete="new-password" type="text" class="validate">
							<label for="txtUserID">User ID</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtInitialPassword" name="txtInitialPassword" value="<?php echo (isset($_POST['txtInitialPassword']) ? $_POST['txtInitialPassword'] : ''); ?>" autocomplete="new-password" type="text" class="validate">
							<label for="txtInitialPassword">Initial Password</label>
						</div>
					</div>
					<div class="row">
						<div class="col s4">
							<label>Status</label>
							<select required class="browser-default" name="slcStatus" id="slcStatus">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcStatus']) ? ($_POST['slcStatus']=="Individual" ? "selected" : "") : '') ?> value="Individual">Individual</option>
								<option <?=(isset($_POST['slcStatus']) ? ($_POST['slcStatus']=="Joint" ? "selected" : "") : '') ?> value="Joint">Joint</option>
								<option <?=(isset($_POST['slcStatus']) ? ($_POST['slcStatus']=="Fund" ? "selected" : "") : '') ?> value="Fund">Fund</option>
								<option <?=(isset($_POST['slcStatus']) ? ($_POST['slcStatus']=="Corporate" ? "selected" : "") : '') ?> value="Corporate">Corporate</option>
							</select>
						</div>
						<div class="col s4">
							<label>Account Status</label>
							<select required class="browser-default" id="slcAccountStatus" name="slcAccountStatus">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcAccountStatus']) ? ($_POST['slcAccountStatus']=="Active" ? "selected" : "") : '') ?> value="Active">Active</option>
								<option <?=(isset($_POST['slcAccountStatus']) ? ($_POST['slcAccountStatus']=="Close" ? "selected" : "") : '') ?> value="Close">Close</option>
							</select>
						</div>
						<div class="col s4">
							<label>Seminar</label>
							<select required class="browser-default" id="slcSeminar" name="slcSeminar">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcSeminar']) ? ($_POST['slcSeminar']=="N/A" ? "selected" : "") : '') ?> value="N/A">N/A</option>
								<option <?=(isset($_POST['slcSeminar']) ? ($_POST['slcSeminar']=="Basic" ? "selected" : "") : '') ?> value="Basic">Basic</option>
								<option <?=(isset($_POST['slcSeminar']) ? ($_POST['slcSeminar']=="Advance" ? "selected" : "") : '') ?> value="Advance">Advance</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col s6 input-field">
							<input id="txtareaSecurityCompany" required name="txtareaSecurityCompany" type="text" value="<?php echo (isset($_POST['txtareaSecurityCompany']) ? $_POST['txtareaSecurityCompany'] : ''); ?>" class="validate">
							<label for="txtareaSecurityCompany">Security Company</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtReferredBy" required name="txtReferredBy" type="text" value="<?php echo (isset($_POST['txtReferredBy']) ? $_POST['txtReferredBy'] : ''); ?>" class="validate">
							<label for="txtReferredBy">Referred By/Agent's Name</label>
						</div>
					</div>

					<div id="additionalSecCom" class="row grey lighten-4" style="display: none;">
						<div class="col s6 input-field">
							<input id="txtareaSecurityCompany1" name="txtareaSecurityCompany1" type="text" value="<?php echo (isset($_POST['txtareaSecurityCompany1']) ? $_POST['txtareaSecurityCompany1'] : ''); ?>" class="validate">
							<label for="txtareaSecurityCompany1">Security Company History</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtUserID1" name="txtUserID1" type="text" value="<?php echo (isset($_POST['txtUserID1']) ? $_POST['txtUserID1'] : ''); ?>" class="validate">
							<label for="txtUserID1">User ID</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtareaSecurityCompany2" name="txtareaSecurityCompany2" type="text" value="<?php echo (isset($_POST['txtareaSecurityCompany2']) ? $_POST['txtareaSecurityCompany2'] : ''); ?>" class="validate">
							<label for="txtareaSecurityCompany2"></label>
						</div>
						<div class="col s6 input-field">
							<input id="txtUserID2" name="txtUserID2" type="text" value="<?php echo (isset($_POST['txtUserID2']) ? $_POST['txtUserID2'] : ''); ?>" class="validate">
							<label for="txtUserID2"></label>
						</div>
						<div class="col s6 input-field">
							<input id="txtareaSecurityCompany3" name="txtareaSecurityCompany3" type="text" value="<?php echo (isset($_POST['txtareaSecurityCompany3']) ? $_POST['txtareaSecurityCompany3'] : ''); ?>" class="validate">
							<label for="txtareaSecurityCompany3"></label>
						</div>
						<div class="col s6 input-field">
							<input id="txtUserID3" name="txtUserID3" type="text" value="<?php echo (isset($_POST['txtUserID3']) ? $_POST['txtUserID3'] : ''); ?>" class="validate">
							<label for="txtUserID3"></label>
						</div>
					</div>

					<div class="row">
						<div class="col s12 input-field">
							<textarea name="txtAreaRemarks" class="materialize-textarea" id="txtAreaRemarks"></textarea>
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
							<input id="txtFirstname" name="txtFirstname" required="required" value="<?php echo (isset($_POST['txtFirstname']) ? $_POST['txtFirstname'] : ''); ?>" type="text" class="validate">
							<label for="txtFirstname">First Name</label>
						</div>
						<div class="col s4 input-field corpo-remove-required">
							<input id="txtLastname" name="txtLastname" required="required" value="<?php echo (isset($_POST['txtLastname']) ? $_POST['txtLastname'] : ''); ?>" type="text" class="validate">
							<label for="txtLastname">Last Name</label>
						</div>
						<div class="col s4 input-field corpo-remove-required">
							<input id="txtMotherMaiden" name="txtMotherMaiden" required="required" value="<?php echo (isset($_POST['txtMotherMaiden']) ? $_POST['txtMotherMaiden'] : ''); ?>" type="text" class="validate">
							<label for="txtMotherMaiden">Mother's Maiden Name</label>
						</div>
					</div>
					<div class="row valign-wrapper">
						<div class="col s4 input-field">
							<input id="txtPlaceOfBirth" name="txtPlaceOfBirth" value="<?php echo (isset($_POST['txtPlaceOfBirth']) ? $_POST['txtPlaceOfBirth'] : ''); ?>" type="text" class="validate">
							<label for="txtPlaceOfBirth">Place of Birth</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtNationality" name="txtNationality" value="<?php echo (isset($_POST['txtNationality']) ? $_POST['txtNationality'] : ''); ?>" type="text" class="validate">
							<label for="txtNationality">Nationality</label>
						</div>
						<div class="col s1 corpo-remove-required">
							<input class="" name="rdoGender" required <?=(isset($_POST['rdoGender']) ? ($_POST['rdoGender']=="Male" ? "checked" : '') : ""); ?> value="Male" type="radio" id="test3"  />
							<label for="test3">Male</label> 
						</div>
						<div class="col s1 corpo-remove-required">
							<input class="" name="rdoGender" required <?=(isset($_POST['rdoGender']) ? ($_POST['rdoGender']=="Female" ? "checked" : '') : ""); ?> value="Female" type="radio" id="test4"  />
							<label for="test4">Female</label>
						</div>
						<div class="col s4"></div>
					</div>
					<div class="row">
						<div class="col s4 input-field corpo-remove-required">
							<input id="txtEmailAdd" name="txtEmailAdd" required value="<?php echo (isset($_POST['txtEmailAdd']) ? $_POST['txtEmailAdd'] : ''); ?>" type="email" class="validate">
							<label for="txtEmailAdd">Email Address</label>
						</div>
						<div class="col s4">
							<label>Civil Status</label>
							<select class="browser-default" id="slcCivilStatus" name="slcCivilStatus">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Single" ? "selected" : "") : "") ?> value="Single">Single</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Married" ? "selected" : "") : "") ?> value="Married">Married</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Widowed" ? "selected" : "") : "") ?> value="Widowed">Widowed</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Separated" ? "selected" : "") : "") ?> value="Separated">Separated</option>
								<option <?=(isset($_POST['slcCivilStatus']) ? ($_POST['slcCivilStatus']=="Divorced" ? "selected" : "") : "") ?> value="Divorced">Divorced</option>
							</select>
						</div>
						<div class="col s4 input-field">
							<input id="txtSpouse" name="txtSpouse" value="<?php echo (isset($_POST['txtSpouse']) ? $_POST['txtSpouse'] : ''); ?>" type="text" disabled class="validate">
							<label for="txtSpouse">Name of Spouse</label>
						</div>
					</div>

					<div class="row">
						<div class="col s2 input-field">
							<input id="txtBirthDate" name="txtBirthDate" value="<?php echo (isset($_POST['txtBirthDate']) ? $_POST['txtBirthDate'] : ''); ?>" type="text" class="datepicker">
							<label for="txtBirthDate">Date of Birth</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtAddress" name="txtAddress" value="<?php echo (isset($_POST['txtAddress']) ? $_POST['txtAddress'] : ''); ?>" type="text" class="validate">
							<label for="txtAddress">Home Address</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtMobPhone" name="txtMobPhone" value="<?php echo (isset($_POST['txtMobPhone']) ? $_POST['txtMobPhone'] : ''); ?>" type="text" class="validate">
							<label for="txtMobPhone">Home/Mobile Phone</label>
						</div>
					</div>
					<div class="row"><div class="s12 col">&nbsp;</div></div>
					<div class="row">
						<div class="col s4">
							<label>Employment Status</label>
							<select class="browser-default" id="slcEmpStatus" name="slcEmpStatus">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Employed" ? "selected" : "") : '') ?> value="Employed">Employed</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Self-Employed" ? "selected" : "") : '') ?> value="Self-Employed">Self-Employed</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Unemployed" ? "selected" : "") : '') ?> value="Unemployed">Unemployed</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Retired" ? "selected" : "") : '') ?> value="Retired">Retired</option>
								<option <?=(isset($_POST['slcEmpStatus']) ? ($_POST['slcEmpStatus']=="Student" ? "selected" : "") : '') ?> value="Student">Student</option>
							</select>
						</div>

						<div class="col s4 input-field">
							<input id="txtNameOfEmployer" name="txtNameOfEmployer" value="<?php echo (isset($_POST['txtNameOfEmployer']) ? $_POST['txtNameOfEmployer'] : ''); ?>" type="text" class="validate">
							<label for="txtNameOfEmployer">Name of Employer/Business</label>
						</div>

						<div class="col s4 input-field">
							<input id="txtBusinessAddress" name="txtBusinessAddress" value="<?php echo (isset($_POST['txtBusinessAddress']) ? $_POST['txtBusinessAddress'] : ''); ?>" type="text" class="validate">
							<label for="txtBusinessAddress">Business Address</label>
						</div>
					</div>

					<div class="row">
						<div class="s4 col input-field">
							<input id="txtOfcPhone" name="txtOfcPhone" value="<?php echo (isset($_POST['txtOfcPhone']) ? $_POST['txtOfcPhone'] : ''); ?>" type="text" class="validate">
							<label for="txtOfcPhone">Office Phone</label>
						</div>
						<div class="s4 col input-field">
							<input id="txtNatureOfBusiness" name="txtNatureOfBusiness" value="<?php echo (isset($_POST['txtNatureOfBusiness']) ? $_POST['txtNatureOfBusiness'] : ''); ?>" type="text" class="validate autocompete">
							<label for="txtNatureOfBusiness">Nature of Business</label>
						</div>
						<div class="s4 col input-field">
							<input id="txtOccupation" name="txtOccupation" value="<?php echo (isset($_POST['txtOccupation']) ? $_POST['txtOccupation'] : ''); ?>" type="text" class="validate">
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
							<input id="txtCorpoName" name="txtCorpoName" value="<?php echo (isset($_POST['txtCorpoName']) ? $_POST['txtCorpoName'] : ''); ?>" type="text" class="validate">
							<label for="txtCorpoName">Company Name</label>
						</div>
						<div class="col s6 input-field">
							<input id="txtCorpoAddress" name="txtCorpoAddress" value="<?php echo (isset($_POST['txtCorpoAddress']) ? $_POST['txtCorpoAddress'] : ''); ?>" type="text" class="validate">
							<label for="txtCorpoAddress">Business Address</label>
						</div>
					</div>
					<div class="row">
						<div class="col s4 input-field">
							<input id="txtCorpoEmail" name="txtCorpoEmail" value="<?php echo (isset($_POST['txtCorpoEmail']) ? $_POST['txtCorpoEmail'] : ''); ?>" type="email" class="validate">
							<label for="txtCorpoEmail">Email Address</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtCorpoOfficePhone" name="txtCorpoOfficePhone" value="<?php echo (isset($_POST['txtCorpoOfficePhone']) ? $_POST['txtCorpoOfficePhone'] : ''); ?>" type="text" class="validate">
							<label for="txtCorpoOfficePhone">Office Phone</label>
						</div>
						<div class="col s4 input-field">
							<input id="txtCorpoTIN" name="txtCorpoTIN" value="<?php echo (isset($_POST['txtCorpoTIN']) ? $_POST['txtCorpoTIN'] : ''); ?>" type="text" class="validate">
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
							<input id="txtBankName" name="txtBankName" value="<?php echo (isset($_POST['txtBankName']) ? $_POST['txtBankName'] : ''); ?>" type="text" class="validate">
							<label for="txtBankName">Bank Name</label>
						</div>
						<div class="col s4 input-field corpo-show hide corpo-add-required">
							<input id="txtSSS" name="txtSSS" value="<?php echo (isset($_POST['txtSSS']) ? $_POST['txtSSS'] : ''); ?>" type="text" class="validate">
							<label for="txtSSS">SSS</label>
						</div>
						<div class="col s4">
							<p>Investment Objective</p>
							<p>
								<input required type="checkbox" name="chckInvestmentObjLongTerm" <?=isset($_POST['chckInvestmentObjLongTerm']) ? 'checked' : '' ?> id="chckInvestmentObjLongTerm" />
								<label for="chckInvestmentObjLongTerm">Long Term Investment</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentObjGrowth']) ? 'checked' : '' ?> name="chckInvestmentObjGrowth" id="chckInvestmentObjGrowth" />
								<label for="chckInvestmentObjGrowth">Growth</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentObjPreservation']) ? 'checked' : '' ?> name="chckInvestmentObjPreservation" id="chckInvestmentObjPreservation" />
								<label for="chckInvestmentObjPreservation">Preservation</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentObjSpeculation']) ? 'checked' : '' ?> name="chckInvestmentObjSpeculation" id="chckInvestmentObjSpeculation" />
								<label for="chckInvestmentObjSpeculation">Speculation</label>
							</p>
						</div>
						<div class="col s4">
							<label>Years of Experience in Trading</label>
							<select required class="browser-default" id="slcYrsOfExpInTrading" name="slcYrsOfExpInTrading">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcYrsOfExpInTrading']) ? ($_POST['slcYrsOfExpInTrading']=="Less than 1 year" ? "selected" : "") : "")?> value="Less than 1 year">Less than 1 year</option>
								<option <?=(isset($_POST['slcYrsOfExpInTrading']) ? ($_POST['slcYrsOfExpInTrading']=="Less than 5 years" ? "selected" : "") : "")?> value="Less than 5 years">Less than 5 years</option>
								<option <?=(isset($_POST['slcYrsOfExpInTrading']) ? ($_POST['slcYrsOfExpInTrading']=="More than 5 years" ? "selected" : "") : "")?> value="More than 5 years">More than 5 years</option>
								<option <?=(isset($_POST['slcYrsOfExpInTrading']) ? ($_POST['slcYrsOfExpInTrading']=="Less than 10 years" ? "selected" : "") : "")?> value="Less than 10 years">Less than 10 years</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col s3">
							<p>Source of Income</p>
							<p>
								<input type="checkbox" required name="chckSourceIncomeSalary" <?=isset($_POST['chckSourceIncomeSalary']) ? 'checked' : '' ?> id="chckSourceIncomeSalary" />
								<label for="chckSourceIncomeSalary">Salary</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckSourceIncomeBusinessInvestments']) ? 'checked' : '' ?> name="chckSourceIncomeBusinessInvestments" id="chckSourceIncomeBusinessInvestments" />
								<label for="chckSourceIncomeBusinessInvestments">Business/Investments</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckSourceIncomeInheritance']) ? 'checked' : '' ?> name="chckSourceIncomeInheritance" id="chckSourceIncomeInheritance" />
								<label for="chckSourceIncomeInheritance">Inheritance</label>
							</p>
						</div>
						<div class="col s3">
							<p>&nbsp;</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckSourceIncomeRemittances']) ? 'checked' : '' ?> name="chckSourceIncomeRemittances" id="chckSourceIncomeRemittances" />
								<label for="chckSourceIncomeRemittances">Remittances</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckSourceIncomeOthers']) ? 'checked' : '' ?> id="chckSourceIncomeOthers" name="chckSourceIncomeOthers" />
								<label for="chckSourceIncomeOthers">Others</label>
							</p>
							<p class="source-income input-field scale-transition <?=isset($_POST['chckSourceIncomeOthers']) ? '' : 'scale-out' ?> ">
								<input id="txtSourceIncomeOthers" name="txtSourceIncomeOthers" value="<?php echo (isset($_POST['txtSourceIncomeOthers']) ? $_POST['txtSourceIncomeOthers'] : ''); ?>" type="text" class="validate">
								<label for="txtSourceIncomeOthers">Other Source of Income</label>
							</p>
						</div>
						<div class="col s3">
							<p>Investment Experience</p>
							<p>
								<input type="checkbox" required <?=isset($_POST['chckInvestmentExpTimeDeposit']) ? 'checked' : '' ?> id="chckInvestmentExpTimeDeposit" name="chckInvestmentExpTimeDeposit" />
								<label for="chckInvestmentExpTimeDeposit">Time Deposit</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpBonds']) ? 'checked' : '' ?> id="chckInvestmentExpBonds" name="chckInvestmentExpBonds" />
								<label for="chckInvestmentExpBonds">Bonds</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpStocks']) ? 'checked' : '' ?> id="chckInvestmentExpStocks" name="chckInvestmentExpStocks" />
								<label for="chckInvestmentExpStocks">Stocks</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpMutualFund']) ? 'checked' : '' ?> id="chckInvestmentExpMutualFund" name="chckInvestmentExpMutualFund" />
								<label for="chckInvestmentExpMutualFund">Mutual Fund</label>
							</p>
						</div>
						<div class="col s3">
							<p>&nbsp;</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpUITF']) ? 'checked' : '' ?> id="chckInvestmentExpUITF" name="chckInvestmentExpUITF" />
								<label for="chckInvestmentExpUITF">UITF</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpNone']) ? 'checked' : '' ?> id="chckInvestmentExpNone" name="chckInvestmentExpNone" />
								<label for="chckInvestmentExpNone">None</label>
							</p>
							<p>
								<input type="checkbox" <?=isset($_POST['chckInvestmentExpOthers']) ? 'checked' : '' ?> id="chckInvestmentExpOthers" name="chckInvestmentExpOthers" />
								<label for="chckInvestmentExpOthers">Others</label>
							</p>
							<p class="investment-experience input-field scale-transition <?=isset($_POST['chckInvestmentExpOthers']) ? '' : 'scale-out' ?>">
								<input id="txtInvestmentExpOthers" name="txtInvestmentExpOthers" value="<?php echo (isset($_POST['txtInvestmentExpOthers']) ? $_POST['txtInvestmentExpOthers'] : ''); ?>" type="text" class="validate">
								<label for="txtInvestmentExpOthers">Other Investment Experience</label>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="col s4">
							<label>Annual Income</label>
							<select class="browser-default" required id="slcAnnualIncome" name="slcAnnualIncome">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcAnnualIncome']) ? ($_POST['slcAnnualIncome']=="Less than 1 Million" ? "selected" : ""): "") ?> value="Less than 1 Million">Less than 1 Million</option>
								<option <?=(isset($_POST['slcAnnualIncome']) ? ($_POST['slcAnnualIncome']=="Less than 5 Million" ? "selected" : ""): "") ?> value="Less than 5 Million">Less than 5 Million</option>
								<option <?=(isset($_POST['slcAnnualIncome']) ? ($_POST['slcAnnualIncome']=="More than 5 Million" ? "selected" : ""): "") ?> value="More than 5 Million">More than 5 Million</option>
								<option <?=(isset($_POST['slcAnnualIncome']) ? ($_POST['slcAnnualIncome']=="Less than 10 Million" ? "selected" : ""): "") ?> value="Less than 10 Million">Less than 10 Million</option>
							</select>
						</div>
						<div class="col s4">
							<label>Assets</label>
							<select class="browser-default" required id="slcAssets" name="slcAssets">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcAssets']) ? ($_POST['slcAssets']=="Less than 1 Million" ? "selected" : ""): "") ?> value="Less than 1 Million">Less than 1 Million</option>
								<option <?=(isset($_POST['slcAssets']) ? ($_POST['slcAssets']=="Less than 5 Million" ? "selected" : ""): "") ?> value="Less than 5 Million">Less than 5 Million</option>
								<option <?=(isset($_POST['slcAssets']) ? ($_POST['slcAssets']=="More than 5 Million" ? "selected" : ""): "") ?> value="More than 5 Million">More than 5 Million</option>
								<option <?=(isset($_POST['slcAssets']) ? ($_POST['slcAssets']=="Less than 10 Million" ? "selected" : ""): "") ?> value="Less than 10 Million">Less than 10 Million</option>
							</select>
						</div>
						<div class="col s4">
							<label>Net worth</label>
							<select class="browser-default" required id="slcNetWorth" name="slcNetWorth">
								<option value="" selected disabled="">Choose your option</option>
								<option <?=(isset($_POST['slcNetWorth']) ? ($_POST['slcNetWorth']=="Less than 1 Million" ? "selected" : ""): "") ?> value="Less than 1 Million">Less than 1 Million</option>
								<option <?=(isset($_POST['slcNetWorth']) ? ($_POST['slcNetWorth']=="Less than 5 Million" ? "selected" : ""): "") ?> value="Less than 5 Million">Less than 5 Million</option>
								<option <?=(isset($_POST['slcNetWorth']) ? ($_POST['slcNetWorth']=="More than 5 Million" ? "selected" : ""): "") ?> value="More than 5 Million">More than 5 Million</option>
								<option <?=(isset($_POST['slcNetWorth']) ? ($_POST['slcNetWorth']=="Less than 10 Million" ? "selected" : ""): "") ?> value="Less than 10 Million">Less than 10 Million</option>
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
							<input type="submit" value="Save" name="btnSubmitAddClient" id="btnSubmitAddClient" class="btn waves-effect waves-light">
							<a href="clients" class="btn grey lighten-1 waves-effect waves-light">Cancel</a>
						</div>
					</div>

					<div class="row"><div class="col s12">&nbsp;</div></div>
				</div>
			</div>
		</div>
		
	</div>

</form>
	<?php include('includes/addClientFunction.php'); ?>
	<?php include('includes/addClientModal.php'); ?>
<?php include('footer.php') ?>