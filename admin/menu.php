<?php

/**
* $Id$
* Module: SmartHelp
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

$i=0;

$adminmenu[$i]['title'] = _AM_SDYNAMIC_BANNERS;
$adminmenu[$i]['link'] = "admin/banner.php";

$i++;
$adminmenu[$i]['title'] = _AM_SDYNAMIC_TEMPLATES;
$adminmenu[$i]['link'] = "admin/template.php";


if (isset($xoopsModule)) {
	$i=0;

	$headermenu[$i]['title'] = _PREFERENCES;
	$headermenu[$i]['link'] = '../../system/admin.php?fct=preferences&amp;op=showmod&amp;mod=' . $xoopsModule->getVar('mid');

	$i++;
	$headermenu[$i]['title'] = _CO_SOBJECT_UPDATE_MODULE;
	$headermenu[$i]['link'] = XOOPS_URL . "/modules/system/admin.php?fct=modulesadmin&op=update&module=" . $xoopsModule->getVar('dirname');

	$i++;
	$headermenu[$i]['title'] = _AM_SOBJECT_ABOUT;
	$headermenu[$i]['link'] = SMARTDYNAMIC_URL . "admin/about.php";
}
?>
