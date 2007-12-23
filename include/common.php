<?php

/**
* $Id$
* Module: SmartDynamic
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/
if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

if( !defined("SMARTDYNAMIC_DIRNAME") ){
	define("SMARTDYNAMIC_DIRNAME", 'smartdynamic');
}

if( !defined("SMARTDYNAMIC_URL") ){
	define("SMARTDYNAMIC_URL", XOOPS_URL.'/modules/'.SMARTDYNAMIC_DIRNAME.'/');
}
if( !defined("SMARTDYNAMIC_ROOT_PATH") ){
	define("SMARTDYNAMIC_ROOT_PATH", XOOPS_ROOT_PATH.'/modules/'.SMARTDYNAMIC_DIRNAME.'/');
}

if( !defined("SMARTDYNAMIC_IMAGES_URL") ){
	define("SMARTDYNAMIC_IMAGES_URL", SMARTDYNAMIC_URL.'/images/');
}

/** Include SmartObject Framework **/
include_once XOOPS_ROOT_PATH.'/modules/smartobject/include/common.php';

include_once(SMARTDYNAMIC_ROOT_PATH . "include/functions.php");

// Creating the SmartModule object
$smartdynamic_module =& smart_getModuleInfo(SMARTDYNAMIC_DIRNAME);

// Find if the user is admin of the module
$smartdynamic_isAdmin = smart_userIsAdmin(SMARTDYNAMIC_DIRNAME);

$myts = MyTextSanitizer::getInstance();
$smartdynamic_moduleName = $smartdynamic_module->getVar('name');

// Creating the SmartModule config Object
$smartdynamic_config =& smart_getModuleConfig(SMARTDYNAMIC_DIRNAME);

$smartdynamic_template_handler = xoops_getmodulehandler('template', 'smartdynamic');
$smartdynamic_banner_handler = xoops_getmodulehandler('banner', 'smartdynamic');
$smartdynamic_frame_handler = xoops_getmodulehandler('frame', 'smartdynamic');

?>