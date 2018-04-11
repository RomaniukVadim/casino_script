<?php
function payToReferer($referalLogin, $baseAmount) {
	$partData = array();
	$part_options = mysql_query("SELECT * FROM settings WHERE `key` LIKE 'partner_%';");
	$resSize = mysql_num_rows($part_options);
	
	for($i = 0; $i < $resSize; $i++) {
		$opt = mysql_fetch_assoc($part_options);
		$partData[$opt['key']] = $opt['val'];
	}
	$isModuleEnabled = $partData['partner_switch'];
	$percentage = $partData['partner_percentage'];
	
	//$ref0 = mysql_fetch_row(mysql_query("SELECT referer, partner_blocked FROM clients WHERE login='$referalLogin'"));
	$sql_str = sprintf("SELECT referer, partner_blocked FROM clients WHERE login='%s';", $referalLogin);
	$ref0 = mysql_fetch_row(mysql_query($sql_str));
	
	$refererId = $ref0[0];
	$isPartnerBlocked = $ref0[1];

	if(($isModuleEnabled == 1) && ($refererId != -1) && ($isPartnerBlocked == 0)) {
		$profit = round($baseAmount * ($percentage / 100), 2);
		//mysql_query("UPDATE clients SET cash_ref = cash_ref + $profit, cash_ref_total = cash_ref_total + $profit WHERE id=$refererId;");
		$sql_str = sprintf("UPDATE clients SET cash_ref = cash_ref + %s, cash_ref_total = cash_ref_total + %s WHERE id=%s;", $profit, $profit, $refererId);
		mysql_query($sql_str);
	}
}


?>