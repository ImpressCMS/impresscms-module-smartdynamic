<?php

/**
* $Id$
* Module: SmartHelp
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

$modversion['name'] = "SmartDynamic";
$modversion['version'] = 1.0;
$modversion['author'] = "The SmartFactory [www.smartfactory.ca]";
$modversion['description']	= _MI_SDYNAMIC_MODULE_DESC;
$modversion['credits'] = "Allister";
$modversion['license'] = "GNU General Public License (GPL)";
$modversion['help']	= "";
$modversion['official']	= 0;
$modversion['image'] = "images/module_logo.gif";
$modversion['dirname']	= "smartdynamic";

// Added by marcan for the About page in admin section

$modversion['people']['developers'][] = "marcan (Marc-André Lanciault)";

//$modversion['people']['testers'][] = "Andy Cleff";

//$modversion['people']['translators'][] = "translator 1";

//$modversion['people']['documenters'][] = "documenter 1";

//$modversion['people']['other'][] = "other 1";
$modversion['developer_website_url'] = "http://smartfactory.ca";
$modversion['developer_website_name'] = "The SmartFactory";
$modversion['developer_email'] = "marcan@smartfactory.ca";
$modversion['status_version'] = "Beta";
$modversion['status'] = "Beta";
$modversion['date'] = "Unreleased";

$modversion['warning'] = _CO_SOBJECT_WARNING_BETA;

$modversion['demo_site_url'] = "";
$modversion['demo_site_name'] = "";
$modversion['support_site_url'] = "";
$modversion['support_site_name'] = "";
$modversion['submit_bug'] = "";
$modversion['submit_feature'] = "";

$modversion['author_word'] = "";

// Admin things
$modversion['hasAdmin']	= 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

$modversion['hasMain'] = 1;

$modversion['sqlfile']['mysql'] = "sql/mysql.sql";

$modversion['onInstall'] = "include/onupdate.inc.php";
$modversion['onUpdate'] = "include/onupdate.inc.php";

$modversion['tables'][0] = "smartdynamic_template";
$modversion['tables'][1] = "smartdynamic_banner";
$modversion['tables'][2] = "smartdynamic_frame";

// Search
$modversion['hasSearch'] = 0;

// Menu
$modversion['hasMain'] = 1;

$i=0;

$i++;
$modversion['blocks'][$i]['file'] = "smartdynamic_block.php";
$modversion['blocks'][$i]['name'] = _MI_SDYNAMIC_BLOCK . ' ' . $i;
$modversion['blocks'][$i]['description'] = "Display a single banner";
$modversion['blocks'][$i]['show_func'] = "smartdynamic_block_show";
$modversion['blocks'][$i]['edit_func'] = "smartdynamic_block_edit";
$modversion['blocks'][$i]['template'] = "smartdynamic_block.html";

$i++;
$modversion['blocks'][$i]['file'] = "smartdynamic_block.php";
$modversion['blocks'][$i]['name'] = _MI_SDYNAMIC_BLOCK . ' ' . $i;
$modversion['blocks'][$i]['description'] = "Display a single banner";
$modversion['blocks'][$i]['show_func'] = "smartdynamic_block_show";
$modversion['blocks'][$i]['edit_func'] = "smartdynamic_block_edit";
$modversion['blocks'][$i]['template'] = "smartdynamic_block.html";

$i++;
$modversion['blocks'][$i]['file'] = "smartdynamic_block.php";
$modversion['blocks'][$i]['name'] = _MI_SDYNAMIC_BLOCK . ' ' . $i;
$modversion['blocks'][$i]['description'] = "Display a single banner";
$modversion['blocks'][$i]['show_func'] = "smartdynamic_block_show";
$modversion['blocks'][$i]['edit_func'] = "smartdynamic_block_edit";
$modversion['blocks'][$i]['template'] = "smartdynamic_block.html";

$i++;
$modversion['blocks'][$i]['file'] = "smartdynamic_block.php";
$modversion['blocks'][$i]['name'] = _MI_SDYNAMIC_BLOCK . ' ' . $i;
$modversion['blocks'][$i]['description'] = "Display a single banner";
$modversion['blocks'][$i]['show_func'] = "smartdynamic_block_show";
$modversion['blocks'][$i]['edit_func'] = "smartdynamic_block_edit";
$modversion['blocks'][$i]['template'] = "smartdynamic_block.html";

$i++;
$modversion['blocks'][$i]['file'] = "smartdynamic_block.php";
$modversion['blocks'][$i]['name'] = _MI_SDYNAMIC_BLOCK . ' ' . $i;
$modversion['blocks'][$i]['description'] = "Display a single banner";
$modversion['blocks'][$i]['show_func'] = "smartdynamic_block_show";
$modversion['blocks'][$i]['edit_func'] = "smartdynamic_block_edit";
$modversion['blocks'][$i]['template'] = "smartdynamic_block.html";


// Templates
$i=0;

$i++;
$modversion['templates'][$i]['file']	= 'smartdynamic_banner.html';
$modversion['templates'][$i]['description'] = 'HTML code for flash banner';



// Config options
$i = 0;
/*
$i++;
$modversion['config'][$i]['name'] = 'smartdynamic_intro_message';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_INTRO_MSG';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_INTRO_MSG_DSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'smartdynamic_register_title';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_REGISTER_TITLE';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_REGISTER_TITLE_DSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'smartdynamic_register_image';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_REGISTER_IMAGE';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_REGISTER_IMAGE_DSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'smartdynamic_register_text';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_REGISTER_TEXT';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_REGISTER_TEXT_DSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'smartdynamic_register_footer';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_REGISTER_FOOTER';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_REGISTER_FOOTER_DSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'smartdynamic_block_header';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_BLOCK_HEADER';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_BLOCK_HEADER_DSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'smartdynamic_block_footer';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_BLOCK_FOOTER';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_BLOCK_FOOTER_DSC';
$modversion['config'][$i]['formtype'] = 'textarea';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'inquiero_url';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_INQUIERO_URL';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_INQUIERO_URLDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = 'http://www.inquiero.com';

$i++;
$modversion['config'][$i]['name'] = 'inquiero_login';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_INQUIERO_LOGIN';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_INQUIERO_LOGINDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'inquiero_bgcolor';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_INQUIERO_BGCOLOR';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_INQUIERO_BGCOLORDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'inquiero_txtcolor';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_INQUIERO_TXTCOLOR';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_INQUIERO_TXTCOLORDSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'inquiero_button';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_INQUIERO_BUTTON';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_INQUIERO_BUTTONSC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'inquiero_mode';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_INQUIERO_MODE';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_INQUIERO_MODESC';
$modversion['config'][$i]['formtype'] = 'textbox';
$modversion['config'][$i]['valuetype'] = 'text';
$modversion['config'][$i]['default'] = '';

$i++;
$modversion['config'][$i]['name'] = 'allow_anonymous';
$modversion['config'][$i]['title'] = '_MI_SDYNAMIC_INQUIERO_ANONYMOUS';
$modversion['config'][$i]['description'] = '_MI_SDYNAMIC_INQUIERO_ANONYMOUSDSC';
$modversion['config'][$i]['formtype'] = 'yesno';
$modversion['config'][$i]['valuetype'] = 'int';
$modversion['config'][$i]['default'] = true;

*/

// On Update
if( ! empty( $_POST['fct'] ) && ! empty( $_POST['op'] ) && $_POST['fct'] == 'modulesadmin' && $_POST['op'] == 'update_ok' && $_POST['dirname'] == $modversion['dirname'] ) {

	// referer check
	$ref = xoops_getenv('HTTP_REFERER');
	if( $ref == '' || strpos( $ref , XOOPS_URL.'/modules/system/admin.php' ) === 0 ) {
		// Keep the values of block's options when module is updated (by nobunobu)
		include dirname( __FILE__ ) . "/include/updateblock.inc.php" ;
	}
}
?>