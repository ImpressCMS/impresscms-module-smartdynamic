<?php

/**
* $Id$
* Module: SmartHelp
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once "header.php";

global $xoopsUser;

$xoopsOption['template_main'] = 'smartdynamic_index.html';
include XOOPS_ROOT_PATH."/header.php";

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . $_SERVER['QUERY_STRING'];
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "inquiero")) {	
	$smartdynamic_add_operator = isset($_POST['smartdynamic_the_operator']) ? $_POST['smartdynamic_the_operator'] : false;
	$xoopsTpl->assign("help_inquiero_url", smartdynamic_getInquieroURL($_POST['ref'], $_POST['ref2'] , $smartdynamic_add_operator));
	$xoopsTpl->assign("help_action", 'go');
	$xoopsTpl->assign("smartdynamic_redirectto", XOOPS_URL);
	
	// Saving user name in a cookie
	smartdynamic_setCookieVar('help_uname', $_POST['ref']);
	
	// Saving user company in a cookie
	smartdynamic_setCookieVar('help_company', $_POST['ref2']);
} else {
	// Is there a specific operator requested ?
	$smartdynamic_the_operator = isset($_GET['op']) ? $_GET['op'] : false;

	if ($smartdynamic_the_operator) {
		// Get the user with this uname
		$user_handler = xoops_gethandler('user');
		$criteria = new CriteriaCompo();
		$criteria->add(new Criteria('uname', $smartdynamic_the_operator));
		
		$userObj = $user_handler->getObjects($criteria);
		$userObj = $userObj[0];
		if ((isset($userObj) && is_object($userObj)) || (isset($smartdynamic_operator[$smartdynamic_the_operator]))) {
			$xoopsTpl->assign("smartdynamic_the_operator", $smartdynamic_operator[$smartdynamic_the_operator]);	
		}
	}
	
	$xoopsTpl->assign("help_action", 'form');
	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
  		$editFormAction .= "?" . $_SERVER['QUERY_STRING'];
	}
	$xoopsTpl->assign("help_edit_form_action", $editFormAction);

	// Retreive user name from database or cookie
	global $xoopsUser;
	
	if (is_object($xoopsUser)) {
		$user_name = $xoopsUser->uname();
	} else {
		$user_name = smartdynamic_getCookieVar('help_uname');
	}
	
	// Saving user name in a cookie
	smartdynamic_setCookieVar('help_uname', $user_name);
	
	// Assigning the name to a smarty variable
	$xoopsTpl->assign("help_uname", $user_name);
	
	// Retreive user company from database or cookie
	$user_company = smartdynamic_getCookieVar('help_company');
	
	// Saving user company in a cookie
	smartdynamic_setCookieVar('help_company', $user_company);
	
	// Assigning the name to a smarty variable
	$xoopsTpl->assign("help_company", $user_company);
	
	// Add the javascript code into the header
	$module_header = '<script language="JavaScript" type="text/JavaScript">
	function submitForm(s)  {
		s.submit.value = "  Un instant ...  ";
		s.submit.disabled = true;
		return true;
	}
	</script>';
	
	$xoopsTpl->assign("xoops_module_header", $module_header);
	
	$xoopsTpl->assign("intro_title", _MD_SDYNAMIC_REQUEST_ONLINE_HELP);	
	$xoopsTpl->assign("intro_message", smartdynamic_getConfig('smartdynamic_intro_message'));	
}



include_once "footer.php";
include_once XOOPS_ROOT_PATH.'/footer.php';

?>