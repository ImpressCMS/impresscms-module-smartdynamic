<?php
/**
* $Id$
* Module: SmartCourse
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
	die("XOOPS root path not defined");
}
include_once XOOPS_ROOT_PATH.'/modules/smartobject/include/common.php';

function smartdynamic_block_show($options) {
	$bannerid = $options[0];
	$smartdynamic_banner_handler = xoops_getmodulehandler('banner', 'smartdynamic');
	$banner = $smartdynamic_banner_handler->getBannerInfo($bannerid);
	return $banner;
}
function smartdynamic_block_edit($options) {

	include_once(XOOPS_ROOT_PATH . '/modules/smartdynamic/include/common.php');

	$form = '';
	$form .= "" . _MB_SDYNAMIC_BANNER_SELECT . "&nbsp;<select name='options[]'>";
	//$smartdynamic_banner_handler = xoops_getmodulehandler('banner', 'smartdynamic');
	$banners = $smartdynamic_banner_handler->getList();
	foreach ($banners as $id => $value) {
		$form .= "<option value='$id'";
		if ($options[0] == $id) {
			$form .= " selected='selected'";
		}
		$form .= ">$value</option>";
	}
	return $form;
}
?>