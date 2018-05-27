$(document).ready(function() {

	$('.resolveIssueModalLink').click(function() {
		var issueID = $(this).data('issueid');
		
		$('#resolveIssueModal p').text($('#tblOpenIssues #issue'+issueID).text());
		$('#resolveIssueModal #issueID').val(issueID);

		console.log(issueID);
	});

	getAllTime();
	function getAllTime() {
		var thisDate = new Date(),
			month = new Array();
			month[0] = "January",
			month[1] = "February",
			month[2] = "March",
			month[3] = "April",
			month[4] = "May",
			month[5] = "June",
			month[6] = "July",
			month[7] = "August",
			month[8] = "September",
			month[9] = "October",
			month[10] = "November",
			month[11] = "December",
			thisMonth = month[thisDate.getMonth()],
			thisYear = thisDate.getFullYear(),
			thisDay = thisDate.getDate(), 
			hours = thisDate.getHours(), 
			minutes = thisDate.getMinutes(), 
			seconds = thisDate.getSeconds(), 
			ampm = hours >= 12 ? 'PM' : 'AM';
		thisMonth = thisDate.getMonth() + 1;
		thisMonth = thisMonth < 10 ? '0' + thisMonth : thisMonth;
		thisDay = thisDay < 10 ? '0' + thisDay : thisDay;
		hours = hours % 12;
		hours = hours ? hours : 12; // the hour '0' should be '12'
		hours = hours < 10 ? '0' + hours : hours;
		minutes = minutes < 10 ? '0' + minutes : minutes;
		seconds = seconds < 10 ? '0' + seconds : seconds;


		$('.date-time-holder').html(thisMonth + '/' + thisDay + '/' + thisYear + ' ' + hours + ':' + minutes + ':' + seconds + ' ' + ampm);
	}
	setInterval(function(){
		getAllTime();
		}, 1000);
	function checkCheckbox1() {
		if ((!$('#chckInvestmentObjLongTerm').is(':checked')) && (!$('#chckInvestmentObjGrowth').is(':checked')) && (!$('#chckInvestmentObjPreservation').is(':checked')) && (!$('#chckInvestmentObjSpeculation').is(':checked'))) {
			$('#chckInvestmentObjLongTerm').attr('required', true);
		} else {
			$('#chckInvestmentObjLongTerm').attr('required', false);
		}
	}
	function checkCheckbox2() {
		if ((!$('#chckSourceIncomeSalary').is(':checked')) && (!$('#chckSourceIncomeBusinessInvestments').is(':checked')) && (!$('#chckSourceIncomeInheritance').is(':checked')) && (!$('#chckSourceIncomeRemittances').is(':checked')) && (!$('#chckSourceIncomeOthers').is(':checked'))) {
			$('#chckSourceIncomeSalary').attr('required', true);
		} else {
			$('#chckSourceIncomeSalary').attr('required', false);
		}
	}
	function checkCheckbox3() {
		if ((!$('#chckInvestmentExpTimeDeposit').is(':checked')) && (!$('#chckInvestmentExpBonds').is(':checked')) && (!$('#chckInvestmentExpStocks').is(':checked')) && (!$('#chckInvestmentExpMutualFund').is(':checked')) && (!$('#chckInvestmentExpUITF').is(':checked')) && (!$('#chckInvestmentExpNone').is(':checked')) && (!$('#chckInvestmentExpOthers').is(':checked'))) {
			$('#chckInvestmentExpTimeDeposit').attr('required', true);
		} else {
			$('#chckInvestmentExpTimeDeposit').attr('required', false);
		}
	}
	checkCheckbox1();
	checkCheckbox2();
	checkCheckbox3();
	$('#chckInvestmentObjLongTerm, #chckInvestmentObjGrowth, #chckInvestmentObjPreservation, #chckInvestmentObjSpeculation').change(function() {
		checkCheckbox1();
	});
	$('#chckSourceIncomeSalary,#chckSourceIncomeBusinessInvestments, #chckSourceIncomeInheritance, #chckSourceIncomeRemittances, #chckSourceIncomeOthers').change(function() {
		checkCheckbox2();
	});

	$('#chckInvestmentExpTimeDeposit,#chckInvestmentExpBonds, #chckInvestmentExpStocks, #chckInvestmentExpMutualFund, #chckInvestmentExpUITF, #chckInvestmentExpNone, #chckInvestmentExpOthers').change(function() {
		checkCheckbox3();
	});
		


		


	$('.dropdown-trigger').dropdown();
	$(".button-collapse").sideNav();
    $('select').material_select();
    $('.modal').modal();
    $('.delete-on-click').click(function() {
    	$(this).addClass('scale-out');
    });
    $('.client-list .deleteClient').click(function() {
    	$(this).siblings('.delete-container').removeClass('scale-out');
    	$(this).closest('tr').addClass('red lighten-2 white-text');
    });
    $('.client-list .delete-container .cancel').click(function() {
    	$(this).closest('.delete-container').addClass('scale-out');
    	$(this).closest('tr').removeClass('red lighten-2 white-text');
    });

	$('.hide-on-click.scale-transition').click(function() {
		$(this).removeClass('scale-in').addClass('scale-out');
	});

	function checkDropdownStatus($this) {
		if ($this.val() == 'Corporate') {
			$('.corpo-hidden').addClass('hide');
			$('.corpo-hidden input').val('');
			$('.corpo-hidden label').removeClass();
			$('.corpo-show').removeClass('hide');
			$('.corpo-remove-required input').attr('required', false);
			$('.corpo-add-required input').attr('required', true);
		} else {
			$('.corpo-hidden').removeClass('hide');
			$('.corpo-show').addClass('hide');
			$('.corpo-show input').val('');
			$('.corpo-show label').removeClass();
			$('.corpo-remove-required input').attr('required', true);
			$('.corpo-add-required input').attr('required', false);
		}
	}
	if ($('#slcStatus').length) {
		checkDropdownStatus($('#slcStatus'));

		$('#slcStatus').on('change',function() {
			checkDropdownStatus($(this));
		});
	}

	if ($('.add-client-page #slcCivilStatus, .edit-client-page #slcCivilStatus').length) {
		if ($('#slcCivilStatus').val() == "Married") {
			$('#txtSpouse').attr('disabled', false);
		} else {
			$('#txtSpouse').attr('disabled', true);
		}
	}
	$('.add-client-page #slcCivilStatus, .edit-client-page #slcCivilStatus').on('change', function() {
		if ($(this).val() == "Married") {
			$('#txtSpouse').attr('disabled', false);
		} else {
			$('#txtSpouse').attr('disabled', true);
		}
	});

	$('.add-client-page #slcEmpStatus, .edit-client-page #slcEmpStatus').on('change', function() {
		if ($(this).val() == "Unemployed" || $(this).val() == "Retired" || $(this).val() == "Student") {
			$('#txtNameOfEmployer, #txtBusinessAddress, #txtOfcPhone, #txtNatureOfBusiness, #txtOccupation').attr('disabled', true);
			$('#txtNameOfEmployer, #txtBusinessAddress, #txtOfcPhone, #txtNatureOfBusiness, #txtOccupation').val('');
		} else {
			$('#txtNameOfEmployer, #txtBusinessAddress, #txtOfcPhone, #txtNatureOfBusiness, #txtOccupation').attr('disabled', false);
			$('#txtNameOfEmployer, #txtBusinessAddress, #txtOfcPhone, #txtNatureOfBusiness, #txtOccupation').val('');
		}
	});


	//$('.add-client-page .datepicker, .edit-client-page .datepicker').pickadate({
	//	selectMonths: true, // Creates a dropdown to control month
	//	selectYears: 99, // Creates a dropdown of 15 years to control year,
	//	clear: 'Clear',
	//	close: 'Ok',
	//	format: 'mm/dd/yyyy',
	//	closeOnSelect: true, // Close upon selecting a date,
	//	container: undefined, // ex. 'body' will append picker to body
	//	max: 'now',
	//});
	//$('.client-detail-page .datepicker').pickadate({
	//	selectMonths: true, // Creates a dropdown to control month
	//	selectYears: 50, // Creates a dropdown of 15 years to control year,
	//	clear: 'Clear',
	//	close: 'Ok',
	//	format: 'mm/dd/yyyy',
	//	closeOnSelect: false, // Close upon selecting a date,
	//	container: undefined// ex. 'body' will append picker to body
	//});

	$('#chckSourceIncomeOthers').click(function() {
		if ($(this).is(':checked')) {
			$('.source-income').removeClass('scale-out').addClass('scale-in');
			$('.source-income input').attr('required', true).removeClass('valid').val('');
			$('.source-income label').removeClass('active');
		} else {
			$('.source-income').removeClass('scale-in').addClass('scale-out');
			$('.source-income input').attr('required', false).removeClass('valid').val('');
			$('.source-income label').removeClass('active');
		}
	});

	$('#chckInvestmentExpOthers').click(function() {
		if ($(this).is(':checked')) {
			$('.investment-experience').removeClass('scale-out').addClass('scale-in');
			$('.investment-experience input').attr('required', true).removeClass('valid').val('');
			$('.investment-experience label').removeClass('active');
		} else {
			$('.investment-experience').removeClass('scale-in').addClass('scale-out');
			$('.investment-experience input').attr('required', false).removeClass('valid').val('');
			$('.investment-experience label').removeClass('active');
		}
	});

	$('.add-client-page #txtNatureOfBusiness,.edit-client-page #txtNatureOfBusiness').autocomplete({
		data: {
			"Accounting / Finance": null,
			"Administrative  Human Resources" : null,
			"Agriculture" : null,
			"Beauty" : null,
			"Building / Construction" : null,
			"Computer / IT" : null,
			"Education / Training" : null,
			"Energy" : null,
			"Engineering" : null,
			"Government" : null,
			"Healthcare" : null,
			"Hotel/Restaurant" : null,
			"Insurance" : null,
			"Logistics / Transportion " : null,
			"Manufacturing" : null,
			"Marketing" : null,
			"Media / Communication" : null,
			"Real Estate" : null,
			"Sales" : null,
			"Services" : null,
			"Trade / Retail" : null
		},
		minLength: 0
	});

	$('.error-div').click(function() {
		$('.error-row').fadeOut('slow');
	});
	if ($('#txtareaSecurityCompany').length) {
		if (($('#txtareaSecurityCompany').val().toLowerCase() == 'ap securities') || ($('#txtareaSecurityCompany').val().toLowerCase() == 'eagle')) {
			$('#additionalSecCom').slideDown(function() {
			});
		} else {
			$('#additionalSecCom').slideUp();
			$('#additionalSecCom label').removeClass();
			$('#additionalSecCom input').each(function() {
				$(this).val('').removeClass();
			})
		}
	}
	$('#txtareaSecurityCompany').on('keyup keydown change', function() {
		if (($(this).val().toLowerCase() == 'ap securities') || ($(this).val().toLowerCase() == 'eagle')) {
			$('#additionalSecCom').slideDown(function() {
			});
		} else {
			$('#additionalSecCom').slideUp();
			$('#additionalSecCom label').removeClass();
			$('#additionalSecCom input').each(function() {
				$(this).val('').removeClass();
			})
		}
	});
	// Add Client Script
	var addClientFormSubmit = 0;
	$('#addClientFormSubmit,#editClientFormSubmit').on('click', function(e) {
		addClientFormSubmit++;
		$('#btnSubmitAddClient,#btnSubmitEditClient').click();
	});
	$('#addClientForm, #editClientForm').submit(function(e) {
		var txtUserID = $('#txtUserID').val().trim(),
			txtInitialPassword = $('#txtInitialPassword').val().trim(),
			txtareaSecurityCompany = $('#txtareaSecurityCompany').val().trim(),
			txtPlaceOfBirth = $('#txtPlaceOfBirth').val().trim(),
			txtNationality = $('#txtNationality').val().trim(),
			txtEmailAdd = $('#txtEmailAdd').val().trim(),
			txtSpouse = $('#txtSpouse').val().trim(),
			txtBirthDate = $('#txtBirthDate').val().trim(),
			txtAddress = $('#txtAddress').val().trim(),
			txtMobPhone = $('#txtMobPhone').val().trim(),
			txtNameOfEmployer = $('#txtNameOfEmployer').val().trim(),
			txtBusinessAddress = $('#txtBusinessAddress').val().trim(),
			txtOfcPhone = $('#txtOfcPhone').val().trim(),
			txtNatureOfBusiness = $('#txtNatureOfBusiness').val().trim()
			txtOccupation = $('#txtOccupation').val().trim(),
			txtBankName = $('#txtBankName').val().trim();

		// if ($('#txtUserID').val().trim() == "") {
		// 	$('#txtUserID').addClass('invalid').focus();
		// 	e.preventDefault();
		// } else 
		if ($('#slcStatus').val() != 'Corporate') {
			if($('#txtFirstname').val().trim()=="") {
				$('#txtFirstname').addClass('invalid').focus();
				e.preventDefault();
			} else if($('#txtLastname').val().trim()=="") {
				$('#txtLastname').addClass('invalid').focus();
				e.preventDefault();
			} else if ($('#txtBirthDate').val()!="") {
				var testDate = new Date($('#txtBirthDate').val());
				if (testDate.getFullYear() == "2018") {
					$('#txtBirthDate').focus().addClass('invalid');
					e.preventDefault();
				}
			}
		}
		if (addClientFormSubmit > 0) {
			return;
		} else if (testInputs()) {
			$('.missingFieldInfo .modal-content p').html("<ul class='inline-list'>" + listNullFields() +"</ul>");
			$('.missingFieldInfo').modal();
			$('.missingFieldInfo').modal("open");
			e.preventDefault();
		} else {
			return;
		}

		function testInputs() {
			var errorCntr = 0;
			if (txtUserID == '') {
				errorCntr++;
			}
			if (txtInitialPassword == '') {
				errorCntr++;
			}
			if (txtareaSecurityCompany == '') {
				errorCntr++;
			}

			if ($('#slcStatus').val() != 'Corporate') {
				if (txtPlaceOfBirth == '') {
					errorCntr++;
				}
				if (txtNationality == '') {
					errorCntr++;
				}
				if (txtEmailAdd == '') {
					errorCntr++;
				}
				if (txtBirthDate == '') {
					errorCntr++;
				}
				if (txtAddress == '') {
					errorCntr++;
				}
				if (txtMobPhone == '') {
					errorCntr++;
				}
				if (txtBankName == '') {
					errorCntr++;
				}
				if ($('#slcStatus').val() == null) {
					errorCntr++;
				}
				if ((!$('#test3').is(':checked')) && (!$('#test4').is(':checked'))) {
					errorCntr++;
				}
				if (!$('#slcCivilStatus').val() == null) {
					if (txtSpouse == '') {
						errorCntr++;
					}
				}
				if ($('#slcEmpStatus').val() == null) {
					errorCntr++;
				} else if ($('#slcEmpStatus').val() == "Employed" || $('#slcEmpStatus').val() == "Self-Employed") {
					if (txtNameOfEmployer == '') {
						errorCntr++;
					}
					if (txtBusinessAddress == '') {
						errorCntr++;
					}
					if (txtOfcPhone == '') {
						errorCntr++;
					}
					if (txtNatureOfBusiness == '') {
						errorCntr++;
					}
					if (txtOccupation == '') {
						errorCntr++;
					}
				}
			}

			if ($('#slcAccountStatus').val() == null) {
				errorCntr++;
			}
			if ($('#slcSeminar').val() == null) {
				errorCntr++;
			}
			// if ($('#slcInvestmentObjective').val() == null) {
			// 	errorCntr++;
			// }

			if ((!$('#chckInvestmentObjLongTerm').is(':checked')) && (!$('#chckInvestmentObjGrowth').is(':checked')) && (!$('#chckInvestmentObjPreservation').is(':checked')) && (!$('#chckInvestmentObjSpeculation').is(':checked'))) {
				errorCntr++;
			}
			if ($('#slcYrsOfExpInTrading').val() == null) {
				errorCntr++;
			}
			if ($('#slcAnnualIncome').val() == null) {
				errorCntr++;
			}
			if ($('#slcAssets').val() == null) {
				errorCntr++;
			}
			if ($('#slcNetWorth').val() == null) {
				errorCntr++;
			}

			if ((!$('#chckSourceIncomeSalary').is(':checked')) && (!$('#chckSourceIncomeBusinessInvestments').is(':checked')) && (!$('#chckSourceIncomeInheritance').is(':checked')) && (!$('#chckSourceIncomeRemittances').is(':checked')) && (!$('#chckSourceIncomeOthers').is(':checked'))) {
				errorCntr++;
			}
			if ($('#chckSourceIncomeOthers').is(':checked')) {
				if ($('#txtSourceIncomeOthers').val().trim() == '') {
					errorCntr++;
				}
			}

			if ((!$('#chckInvestmentExpTimeDeposit').is(':checked')) && (!$('#chckInvestmentExpBonds').is(':checked')) && (!$('#chckInvestmentExpStocks').is(':checked')) && (!$('#chckInvestmentExpMutualFund').is(':checked')) && (!$('#chckInvestmentExpUITF').is(':checked')) && (!$('#chckInvestmentExpNone').is(':checked')) && (!$('#chckInvestmentExpOthers').is(':checked'))) {
				errorCntr++;
			}
			if ($('#chckInvestmentExpOthers').is(':checked')) {
				if ($('#txtInvestmentExpOthers').val().trim() == '') {
					errorCntr++;
				}
			}

			if (errorCntr > 0) {
				return true;
			} else {
				return false;
			} } // end of testInputs()

		function listNullFields() {
			var nullFields = "";
			
			if (txtUserID == '') {
				nullFields = "<li>User ID</li>";
			}
			if (txtInitialPassword == '') {
				nullFields += "<li>Initial Password</li>";
			}
			if ($('#slcStatus').val() == null) {
				nullFields += "<li>Status</li>";
			}
			if ($('#slcAccountStatus').val() == null) {
				nullFields += "<li>Account Status</li>";
			}
			if ($('#slcSeminar').val() == null) {
				nullFields += "<li>Seminar</li>";
			}
			if (txtareaSecurityCompany == '') {
				nullFields += "<li>Security Company</li>";
			}

			if ($('#slcStatus').val() != 'Corporate') {
				if (txtPlaceOfBirth == '') {
					nullFields += "<li>Place of Birth</li>";
				}
				if (txtNationality == '') {
					nullFields += "<li>Nationality</li>";
				}
				if ((!$('#test3').is(':checked')) && (!$('#test4').is(':checked'))) {
					nullFields += "<li>Gender</li>";
				}
				if (txtEmailAdd == '') {
					nullFields += "<li>Email Address</li>";
				}
				if ($('#slcCivilStatus').val() == null) {
					nullFields += "<li>Civil Status</li>";
				} else {
					if ($('#slcCivilStatus').val() == 'Married') {
						if (txtSpouse == '') {
							nullFields += "<li>Name of Spouse</li>";
						}
					}
				}
				if (txtBirthDate == '') {
					nullFields += "<li>Date of Birth</li>";
				}
				if (txtAddress == '') {
					nullFields += "<li>Home Address</li>";
				}
				if (txtMobPhone == '') {
					nullFields += "<li>Home/Mobile Phone</li>";
				}
				if ($('#slcEmpStatus').val() == null) {
					nullFields += "<li>Employment Status</li>";
				} else if ($('#slcEmpStatus').val() == "Employed" || $('#slcEmpStatus').val() == "Self-Employed") {
					if (txtNameOfEmployer == '') {
						nullFields += "<li>Name of Employer/Business</li>";
					}
					if (txtBusinessAddress == '') {
						nullFields += "<li>Business Address</li>";
					}
					if (txtOfcPhone == '') {
						nullFields += "<li>Office Phone</li>";
					}
					if (txtNatureOfBusiness == '') {
						nullFields += "<li>Nature of Business</li>";
					}
					if (txtOccupation == '') {
						nullFields += "<li>Occupation</li>";
					}
				}
				if (txtBankName == '') {
					nullFields += "<li>Bank name</li>";
				}
			}
			// if ($('#slcInvestmentObjective').val() == null) {
			// 	nullFields += "<li>Investment Objective</li>";
			// }

			if ((!$('#chckInvestmentObjLongTerm').is(':checked')) && (!$('#chckInvestmentObjGrowth').is(':checked')) && (!$('#chckInvestmentObjPreservation').is(':checked')) && (!$('#chckInvestmentObjSpeculation').is(':checked'))) {
				nullFields += "<li>Investment Objective</li>";
			}
			if ($('#slcYrsOfExpInTrading').val() == null) {
				nullFields += "<li>Years of Experience in Trading</li>";
			}

			if ((!$('#chckSourceIncomeSalary').is(':checked')) && (!$('#chckSourceIncomeBusinessInvestments').is(':checked')) && (!$('#chckSourceIncomeInheritance').is(':checked')) && (!$('#chckSourceIncomeRemittances').is(':checked')) && (!$('#chckSourceIncomeOthers').is(':checked'))) {
				nullFields += "<li>Source of Income</li>";
			}
			if ($('#chckSourceIncomeOthers').is(':checked')) {
				if ($('#txtSourceIncomeOthers').val().trim() == '') {
				nullFields += "<li>Other Source of Income</li>";
				}
			}

			if ((!$('#chckInvestmentExpTimeDeposit').is(':checked')) && (!$('#chckInvestmentExpBonds').is(':checked')) && (!$('#chckInvestmentExpStocks').is(':checked')) && (!$('#chckInvestmentExpMutualFund').is(':checked')) && (!$('#chckInvestmentExpUITF').is(':checked')) && (!$('#chckInvestmentExpNone').is(':checked')) && (!$('#chckInvestmentExpOthers').is(':checked'))) {
				nullFields += "<li>Investment Experience</li>";
			}
			if ($('#chckInvestmentExpOthers').is(':checked')) {
				if ($('#txtInvestmentExpOthers').val().trim() == '') {
					nullFields += "<li>Other Investment Experience</li>";
				}
			}
			if ($('#slcAnnualIncome').val() == null) {
				nullFields += "<li>Annual Income</li>";
			}
			if ($('#slcAssets').val() == null) {
				nullFields += "<li>Assets</li>";
			}
			if ($('#slcNetWorth').val() == null) {
				nullFields += "<li>Net Worth</li>";
			}

			return nullFields;	} // end of listNullFields()

	});
	var table = $('#client-listing').DataTable({
		order: [0, 'asc'],
		"lengthChange": false,
		"columns" : [
			{ 'width': '5%' },
			{ 'width': '5%', sortable: false },
			{ 'width': '11%' },
			{ 'width': '11%' },
			{ 'width': '15%' },
			{ 'width': '7%' },
			{ 'width': '15%' },
			{ 'width': '6%' },
			{ 'width': '12%' },
			{ 'width': '14%' }
		]
	});
	$('.editDepoLink').click(function() {
		var fName = $(this).data('filename');
		var bName = $(this).data('bankname');
		var amount = $(this).data('amount');
		var dDate = $(this).data('duedate');
		var aReflected = $(this).data('amountreflected');
		var email = $(this).data('email');
		var depoID = $(this).data('depoid');


		$('#depoID').val(depoID);


		// $('#editFileDeposit').val(fName);
		$('#EditBankName').val(bName);
		$('#EditAmount').val(amount);
		$('#EditDueDate').val(dDate);
		$('#EditAmountReflected').val(aReflected);
		$('#txtEmail').val(email);
		console.log($('#depoID').val());
		Materialize.updateTextFields();
	});

    $('.editWithdrawalLink').click(function() {
		var widthrawalid = $(this).data('widthrawalid');
		var dateofrequest = $(this).data('dateofrequest');
		var amount = $(this).data('amount');
		var duedate = $(this).data('duedate');
		var filename = $(this).data('filename');
		var email = $(this).data('email');

		$('#wID').val(widthrawalid);
		$('#txtEditDateOfRequest').val(dateofrequest);
		$('#txtEditWidthrawalAmount').val(amount);
		$('#txtEditWithdrawalDueDate').val(duedate);
		$('#txtEditWithdrawalEmail').val(email);
		$('#defaultFileName').val(filename);

		Materialize.updateTextFields();
    });

	$('.editAccountLink').click(function() {
		var accID = $(this).data('accountid');
		var accUser = $(this).data('user');
		var accFname = $(this).data('fname');
		var accLname = $(this).data('lname');
		var accUtype = $(this).data('utype');

		$('#txtEditFirstName').val(accFname);
		$('#txtEditLastName').val(accLname);
		$('#txtEditUsername').val(accUser);
		$('#accountID').val(accID);
		$('#slcEditAccountType').val(accUtype);
		Materialize.updateTextFields();
	});
	// var table = $('#account-listing').DataTable({
	// 	order: [1, 'asc'],
	// 	"columns" : [
	// 		{"width" : '20%'},
	// 		{"width" : '20%'},
	// 		{"width" : '15%'},
	// 		{"width" : '10%'}
	// 	]
	// });
	// $('#client-listing').pageMe({
	// 	pagerSelector:'#myPager',
	// 	activeColor: 'blue',
	// 	prevText:'Anterior',
	// 	nextText:'Siguiente',
	// 	showPrevNext:true,
	// 	hidePageNumbers:false,
	// 	perPage:10
	// });
});