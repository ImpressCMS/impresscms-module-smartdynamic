<?php

/**
* $Id$
* Module: SmartDynamic
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

//include_once("banner.php");

include_once("banner.php");
exit;

smart_xoops_cp_header();

smart_adminMenu(0, _AM_SDYNAMIC_FRAMES);

$bannerid = 2;

$bannerObj = $smartdynamic_banner_handler->get($bannerid);

$banner['id'] = $bannerObj->getVar('name');
$banner['width'] = $bannerObj->getWidth();
$banner['height'] = $bannerObj->getHeight();
$banner['url'] = $smartdynamic_template_handler->getImageUrl() . $bannerObj->getTemplateSwffile();
$banner['xmlsrc'] = SMARTDYNAMIC_URL . 'generate_xml.php?r=' . XOOPS_ROOT_PATH . 'zzzabczzz' . $bannerid;

include_once XOOPS_ROOT_PATH . '/class/template.php';

$xoopsTpl =& new XoopsTpl();

$xoopsTpl->assign('banner', $banner);

$xoopsTpl->display('db:smartdynamic_banner.html');

smart_modFooter();
xoops_cp_footer();
?>