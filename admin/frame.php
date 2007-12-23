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
    global $smartdynamic_frame_handler;

    $object = $smartdynamic_frame_handler->get($objectid);
    if (!$object->isNew()){

        if ($showmenu) {
            smart_adminMenu(0, _AM_SDYNAMIC_FRAMES . ' > ' . _AM_SDYNAMIC_FRAME_EDIT);
        }

        smart_collapsableBar('frameedit', _AM_SDYNAMIC_FRAME_EDIT, _AM_SDYNAMIC_FRAME_EDIT_DSC);

        $sform = $object->getForm(_AM_SDYNAMIC_FRAME_EDIT, 'addframe');
        $sform->display();
        smart_close_collapsable('frameedit');
    } else {
        if ($showmenu) {
            smart_adminMenu(0, _AM_SDYNAMIC_FRAMES . ' > ' . _AM_SDYNAMIC_FRAME_CREATE);
        }

		if ($_GET['bannerid']) {
			$object->setVar('bannerid', intval($_GET['bannerid']));
		}

        smart_collapsableBar('framecreate', _AM_SDYNAMIC_FRAME_CREATE, _AM_SDYNAMIC_FRAME_CREATE_DSC);
        $sform = $object->getForm(_AM_SDYNAMIC_FRAME_CREATE, 'addframe');
        $sform->display();
        smart_close_collapsable('framecreate');
    }
}

include_once("admin_header.php");

$op = '';

if (isset($_GET['op'])) $op = $_GET['op'];
if (isset($_POST['op'])) $op = $_POST['op'];

switch ($op) {
    case "mod":
        $objectid = isset($_GET[$smartdynamic_frame_handler->keyName]) ? intval($_GET[$smartdynamic_frame_handler->keyName]) : 0;

        smart_xoops_cp_header();

        editobject(true, $objectid);
        break;

    case "addframe":
        include_once XOOPS_ROOT_PATH."/modules/smartobject/class/smartobjectcontroller.php";
        $controller = new SmartObjectController($smartdynamic_frame_handler);
        $controller->storeFromDefaultForm(_AM_SDYNAMIC_FRAME_CREATED, _AM_SDYNAMIC_FRAME_MODIFIED);

        break;

    case "del":
        include_once XOOPS_ROOT_PATH."/modules/smartobject/class/smartobjectcontroller.php";
        $controller = new SmartObjectController($smartdynamic_frame_handler);
        $controller->handleObjectDeletion();
        break;

    case "default":
    default:

		include_once "admin_header.php";

		smart_xoops_cp_header();

		smart_adminMenu(0, _AM_SDYNAMIC_FRAMES);

		smart_collapsableBar('createdframes', _AM_SDYNAMIC_FRAMES_CREATED, _AM_SDYNAMIC_FRAMES_CREATED_DSC);

		$criteria = new CriteriaCompo();

		include_once SMARTOBJECT_ROOT_PATH."class/smartobjecttable.php";
		$objectTable = new SmartObjectTable($smartdynamic_frame_handler, $criteria);
		$objectTable->addColumn(new SmartObjectColumn('name', 'left', 150));
		$objectTable->addColumn(new SmartObjectColumn('description'));

		$objectTable->addIntroButton('addframe', 'frame.php?op=mod', _AM_SDYNAMIC_FRAME_CREATE);

		$objectTable->render();
		smart_close_collapsable('createdframes');

        break;
}

smart_modFooter();
xoops_cp_footer();

?>