<?php

if (!defined("XOOPS_ROOT_PATH")) {
 	die("XOOPS root path not defined");
}

function xoops_module_update_smartdynamic($module) {

	include_once(XOOPS_ROOT_PATH . "/modules/" . $module->getVar('dirname') . "/include/functions.php");
	include_once(XOOPS_ROOT_PATH . "/modules/smartobject/class/smartdbupdater.php");

	$dbupdater = new SmartobjectDbupdater();

    ob_start();

	echo "<code>" . _SDU_UPDATE_UPDATING_DATABASE . "<br />";

	smartdynamic_create_upload_folders();

	// Adding weight and align field in smartdynamic_page
    $table = new SmartDbTable('smartdynamic_frame');
    if (!$table->fieldExists('weight')) {
    	$table->addNewField('weight', "INT(11) default '0'");
    }
    if (!$table->fieldExists('align')) {
    	$table->addNewField('align', "VARCHAR(20) NOT NULL default 'center'");
    }
    if (!$dbupdater->updateTable($table)) {
        /**
         * @todo trap the errors
         */
    }
	unset($table);

	// Adding weight and align field in smartdynamic_page
    $table = new SmartDbTable('smartdynamic_banner');
    if (!$table->fieldExists('border_color')) {
    	$table->addNewField('border_color', "VARCHAR(7) NOT NULL default '#000000'");
    }
    if (!$table->fieldExists('border_size')) {
    	$table->addNewField('border_size', "int(2) NOT NULL default 0");
    }
    if (!$dbupdater->updateTable($table)) {
        /**
         * @todo trap the errors
         */
    }
	unset($table);

	echo "</code>";

    $feedback = ob_get_clean();
    if (method_exists($module, "setMessage")) {
        $module->setMessage($feedback);
    }
    else {
        echo $feedback;
    }

	return true;
}

function xoops_module_install_smartdynamic($module) {

    ob_start();

	include_once(XOOPS_ROOT_PATH . "/modules/" . $module->getVar('dirname') . "/include/functions.php");

	smartdynamic_create_upload_folders();

    $feedback = ob_get_clean();
    if (method_exists($module, "setMessage")) {
        $module->setMessage($feedback);
    }
    else {
        echo $feedback;
    }

	return true;
}


?>