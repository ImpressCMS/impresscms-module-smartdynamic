<?php

/**
* $Id$
* Module: SmartHelp
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

include_once XOOPS_ROOT_PATH.'/modules/smartdynamic/include/common.php';

function smartdynamic_create_upload_folders()
{
	$handlers_array = array('template', 'frame');
	foreach($handlers_array as $item) {
		$hanlder =& xoops_getmodulehandler($item, 'smartdynamic');
		smart_admin_mkdir($hanlder->getImagePath());
	}
}
?>