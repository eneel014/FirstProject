<?php 	
function incompleteInfo($r) {
	$incCounter = 0;
	($r['user_id']=='' ? $incCounter++ : '');
	($r['initial_password']=='' ? $incCounter++ : '');
	($r['status']=='' ? $incCounter++ : '');
	($r['account_status']=='' ? $incCounter++ : '');
	($r['seminar']=='' ? $incCounter++ : '');
	($r['security_company']=='' ? $incCounter++ : '');
	($r['referred_by']=='' ? $incCounter++ : '');
	if ($r['status'] != 'Corporate') {
		($r['firstname']=='' ? $incCounter++ : '');
		($r['lastname']=='' ? $incCounter++ : '');
		($r['mother_mname']=='' ? $incCounter++ : '');
		($r['place_of_birth']=='' ? $incCounter++ : '');
		($r['nationality']=='' ? $incCounter++ : '');
		($r['gender']=='' ? $incCounter++ : '');
		($r['email_add']=='' ? $incCounter++ : '');
		($r['civil_status']=='' ? $incCounter++ : '');
		if ($r['civil_status']=='Married') {
			($r['name_of_spouse']=='' ? $incCounter++ : '');
		}
		($r['date_of_birth']=='' ? $incCounter++ : '');
		($r['home_address']=='' ? $incCounter++ : '');
		($r['mobile_phone']=='' ? $incCounter++ : '');

		($r['employee_status']=='' ? $incCounter++ : '');
		if ($r['employee_status'] == 'Employed' || $r['employee_status'] == 'Self-Employed') {
			($r['name_of_employer']=='' ? $incCounter++ : '');
			($r['business_address']=='' ? $incCounter++ : '');
			($r['office_phone']=='' ? $incCounter++ : '');
			($r['nature_of_business']=='' ? $incCounter++ : '');
			($r['occupation']=='' ? $incCounter++ : '');
		}
		($r['bank_name']=='' ? $incCounter++ : '');
	}

	
	// ($r['investment_objective']=='' ? $incCounter++ : '');


	if ((!$r['is_longTermInvestment']) && (!$r['is_growth']) && (!$r['is_preservationOfCapital']) && (!$r['is_speculation'])) {
		$incCounter++;
	}
	($r['years_of_trading']=='' ? $incCounter++ : '');

	if ((!$r['is_salary']) && (!$r['is_business_investments']) && (!$r['is_inheritance']) && (!$r['is_remittances']) && (!$r['is_source_income_others'])) {
		$incCounter++;
	}
	if ($r['is_source_income_others']) {
		($r['other_source_income']=='' ? $incCounter++ : '');
	}

	if ((!$r['is_time_deposit']) && (!$r['is_bonds']) && (!$r['is_stocks']) && (!$r['is_mutual_fund']) && (!$r['is_uitf']) && (!$r['is_none']) && (!$r['is_investment_exp_others'])) {
		$incCounter++;
	}
	if ($r['is_investment_exp_others']) {
		($r['other_investment_exp']=='' ? $incCounter++ : '');
	}
	

	($r['annual_income']=='' ? $incCounter++ : '');
	($r['assets']=='' ? $incCounter++ : '');
	($r['net_worth']=='' ? $incCounter++ : '');

	return $incCounter;
}

function incompleteDocument($docResult, $secCompany) {
	// return print_r($docResult);
	$incDocCounter = 0;
	$docResults = $docResult->fetch_assoc();
	if ($docResults['caif']=='') { $incDocCounter++; }
	if ($docResults['id1']=='') { $incDocCounter++; }
	if ($docResults['id2']=='') { $incDocCounter++; }
	if ($secCompany != 'AP Securities') {
		if ($docResults['proof_of_billing']=='') { $incDocCounter++; }
	}
	
	if ($docResults['bank_certificate']=='') { $incDocCounter++; }

	return $incDocCounter;
	
}