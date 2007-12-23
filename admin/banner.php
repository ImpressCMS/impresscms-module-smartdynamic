<?php
//  ------------------------------------------------------------------------ //
//                		Subscription Module for XOOPS													 //
//               Copyright (c) 2005 Third Eye Software, Inc.						 		 //
//                 <http://products.thirdeyesoftware.com/>									 //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

function editobject($showmenu = false, $objectid = 0)
{
    global $smartdynamic_banner_handler, $smartdynamic_frame_handler;

    $object = $smartdynamic_banner_handler->get($objectid);
    if (!$object->isNew()){

        if ($showmenu) {
            smart_adminMenu(0, _AM_SDYNAMIC_BANNERS . ' > ' . _AM_SDYNAMIC_BANNER_EDIT);
        }

        smart_collapsableBar('banneredit', _AM_SDYNAMIC_BANNER_EDIT, _AM_SDYNAMIC_BANNER_EDIT_DSC);

        $sform = $object->getForm(_AM_SDYNAMIC_BANNER_EDIT, 'addbanner');
        $sform->display();
        smart_close_collapsable('banneredit');

		smart_collapsableBar('createdframes', _AM_SDYNAMIC_FRAMES_CREATED, _AM_SDYNAMIC_FRAMES_CREATED_DSC);

		$criteria = new CriteriaCompo();

		$criteria->add(new Criteria('bannerid', $objectid));

		include_once SMARTOBJECT_ROOT_PATH."class/smartobjecttable.php";
		$objectTable = new SmartObjectTable($smartdynamic_frame_handler, $criteria);
		$objectTable->addColumn(new SmartObjectColumn('name'));
		$objectTable->addColumn(new SmartObjectColumn('weight', 'center', '50'));

		$objectTable->addIntroButton('addframe', 'frame.php?op=mod&bannerid=' . $objectid, _AM_SDYNAMIC_FRAME_CREATE);
		$objectTable->setDefaultSort('weight');

		$objectTable->render();
		smart_close_collapsable('createdframes');

		smart_collapsableBar('bannerpreview', _AM_SDYNAMIC_BANNER_PREVIEW, _AM_SDYNAMIC_BANNER_PREVIEW_DSC);
		$banner = $smartdynamic_banner_handler->getBannerInfo($objectid);
		$xoopsTpl = new XoopsTpl();
		$xoopsTpl->assign('block', $banner);
		$xoopsTpl->display('db:smartdynamic_block.html');
		smart_close_collapsable('bannerpreview');

		echo "Debuging purposes : <a href='" . $banner['xmlsrc'] . "' target='_blank'>See the XML</a>";
    } else {
        if ($showmenu) {
            smart_adminMenu(0, _AM_SDYNAMIC_BANNERS . ' > ' . _AM_SDYNAMIC_BANNER_CREATE);
        }

        smart_collapsableBar('bannercreate', _AM_SDYNAMIC_BANNER_CREATE, _AM_SDYNAMIC_BANNER_CREATE_DSC);
        $sform = $object->getForm(_AM_SDYNAMIC_BANNER_CREATE, 'addbanner');
        $sform->display();
        smart_close_collapsable('bannercreate');
    }
}

include_once("admin_header.php");

$op = '';

if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

switch ($op) {
    case "mod":
        $objectid = isset($_GET[$smartdynamic_banner_handler->keyName]) ? intval($_GET[$smartdynamic_banner_handler->keyName]) : 0;

        smart_xoops_cp_header();

        editobject(true, $objectid);
        break;

    case "addbanner":
        include_once XOOPS_ROOT_PATH."/modules/smartobject/class/smartobjectcontroller.php";
        $controller = new SmartObjectController($smartdynamic_banner_handler);
        $controller->storeFromDefaultForm(_AM_SDYNAMIC_BANNER_CREATED, _AM_SDYNAMIC_BANNER_MODIFIED);

        break;

    case "del":
        include_once XOOPS_ROOT_PATH."/modules/smartobject/class/smartobjectcontroller.php";
        $controller = new SmartObjectController($smartdynamic_banner_handler);
        $controller->handleObjectDeletion();
        break;

    case "default":
    default:

		include_once "admin_header.php";

		smart_xoops_cp_header();

		smart_adminMenu(0, _AM_SDYNAMIC_BANNERS);

		smart_collapsableBar('createdbanners', _AM_SDYNAMIC_BANNERS_CREATED, _AM_SDYNAMIC_BANNERS_CREATED_DSC);

		$criteria = new CriteriaCompo();

		include_once SMARTOBJECT_ROOT_PATH."class/smartobjecttable.php";
		$objectTable = new SmartObjectTable($smartdynamic_banner_handler, $criteria);
		$objectTable->addColumn(new SmartObjectColumn('name', 'left', 150, 'getBannerName'));
		$objectTable->addColumn(new SmartObjectColumn('description'));

		$objectTable->addIntroButton('addbanner', 'banner.php?op=mod', _AM_SDYNAMIC_BANNER_CREATE);

		$objectTable->render();
		smart_close_collapsable('createdbanners');

        break;
}

smart_modFooter();
xoops_cp_footer();

?>
