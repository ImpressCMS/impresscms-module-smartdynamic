<?php
// $Id$
// ------------------------------------------------------------------------ //
// 				 XOOPS - PHP Content Management System                      //
//					 Copyright (c) 2000 XOOPS.org                           //
// 						<http://www.xoops.org/>                             //
// ------------------------------------------------------------------------ //
// This program is free software; you can redistribute it and/or modify     //
// it under the terms of the GNU General Public License as published by     //
// the Free Software Foundation; either version 2 of the License, or        //
// (at your option) any later version.                                      //

// You may not change or alter any portion of this comment or credits       //
// of supporting developers from this source code or any supporting         //
// source code which is considered copyrighted (c) material of the          //
// original comment or credit authors.                                      //
// This program is distributed in the hope that it will be useful,          //
// but WITHOUT ANY WARRANTY; without even the implied warranty of           //
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
// GNU General Public License for more details.                             //

// You should have received a copy of the GNU General Public License        //
// along with this program; if not, write to the Free Software              //
// Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------ //
// URL: http://www.xoops.org/												//
// Project: The XOOPS Project                                               //
// -------------------------------------------------------------------------//

if (!defined("XOOPS_ROOT_PATH")) {
    die("XOOPS root path not defined");
}
include_once XOOPS_ROOT_PATH."/modules/smartobject/class/smartseoobject.php";
class SmartdynamicTemplate extends SmartSeoObject {

    function SmartdynamicTemplate() {
        $this->initVar('templateid', XOBJ_DTYPE_INT, '', true);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX, '', true, 255, '', false, _AM_SDYNAMIC_TEMPLATE_NAME_CAPTION, _AM_SDYNAMIC_TEMPLATE_NAME_DSC, true);
        $this->initVar('swffile', XOBJ_DTYPE_TXTBOX, '', true, 255, '', false, _AM_SDYNAMIC_TEMPLATE_SWFFILE_CAPTION, _AM_SDYNAMIC_TEMPLATE_SWFFILE_DSC, true);
        $this->initVar('description', XOBJ_DTYPE_TXTAREA, '', false, null,'', false, _AM_SDYNAMIC_TEMPLATE_DESCRIPTION_CAPTION, _AM_SDYNAMIC_TEMPLATE_DESCRIPTION_DSC);
        $this->initVar('width', XOBJ_DTYPE_INT, '', false, null, '', false, _AM_SDYNAMIC_TEMPLATE_WIDTH_CAPTION, _AM_SDYNAMIC_TEMPLATE_WIDTH_DSC);
        $this->initVar('height', XOBJ_DTYPE_INT, '', false, null, '', false, _AM_SDYNAMIC_TEMPLATE_HEIGHT_CAPTION, _AM_SDYNAMIC_TEMPLATE_HEIGHT_DSC);

        $this->setControl('swffile', array('itemHandler' => 'template',
                                        'method' => 'getAllSwfFiles',
                                        'module' => 'smartdynamic'));

        $this->SmartObject();
    }

    /**
    * returns a specific variable for the object in a proper format
    *
    * @access public
    * @param string $key key of the object's variable to be returned
    * @param string $format format to use for the output
    * @return mixed formatted value of the variable
    */
    function getVar($key, $format = 's') {
        if ($format == 's' && in_array($key, array())) {
            return call_user_func(array($this,$key));
        }
        return parent::getVar($key, $format);
    }
}

class SmartdynamicTemplateHandler extends SmartPersistableObjectHandler {
    function SmartdynamicTemplateHandler($db) {
        $this->SmartPersistableObjectHandler($db, 'template', 'templateid', 'name', 'description', 'smartdynamic');
    }

    function getAllSwfFiles() {
    	include_once(XOOPS_ROOT_PATH . '/class/xoopslists');
    	$ret = XoopsLists::getFileListAsArray($this->getImagePath());
    	return $ret;
    }

    function beforeSave(&$obj) {
    	$url = $this->getImagePath() . $obj->getVar('swffile');
    	$width = $obj->getVar('width');
    	$height = $obj->getVar('height');;

    	smart_getImageSize($url, $width, $height);

    	$obj->setVar('width', $width);
    	$obj->setVar('height', $height);

    	return true;
    }
}
?>