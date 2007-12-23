<?php

/**
* $Id$
* Module: SmartDynamic
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

if (!defined("SMARTDYNAMIC_NOCPFUNC")) {
	include_once '../../../include/cp_header.php';
}

include_once XOOPS_ROOT_PATH . "/class/xoopsformloader.php";

include_once XOOPS_ROOT_PATH.'/modules/smartdynamic/include/common.php';

if( !defined("SMARTDYNAMIC_ADMIN_URL") ){
	define('SMARTDYNAMIC_ADMIN_URL', SMARTDYNAMIC_URL . "admin/");
}

if( !defined("SMARTDYNAMIC_ADMIN_ROOT_PATH") ){
	define('SMARTDYNAMIC_ADMIN_ROOT_PATH', SMARTDYNAMIC_ROOT_PATH . "admin/");
}
smart_loadCommonLanguageFile();
?>