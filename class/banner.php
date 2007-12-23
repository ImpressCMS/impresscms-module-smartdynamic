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
class SmartdynamicBanner extends SmartSeoObject {

	var $_templateObj = false;

    function SmartdynamicBanner() {
        $this->initVar('bannerid', XOBJ_DTYPE_INT, '', true);
        $this->initVar('templateid', XOBJ_DTYPE_INT, '', true, null, '', false, _AM_SDYNAMIC_BANNER_TEMPLATEID_CAPTION, _AM_SDYNAMIC_BANNER_TEMPLATEID_DSC, true);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX, '', true, 255, '', false, _AM_SDYNAMIC_BANNER_NAME_CAPTION, _AM_SDYNAMIC_BANNER_NAME_DSC, true);
        $this->initVar('description', XOBJ_DTYPE_TXTAREA, '', false, null,'', false,  _AM_SDYNAMIC_BANNER_DESCRIPTION_CAPTION, _AM_SDYNAMIC_BANNER_DESCRIPTION_DSC);
		$this->initVar('border_color', XOBJ_DTYPE_TXTBOX, '#000000', false, null, '',  false, _AM_SDYNAMIC_BANNER_BORDER_COLOR_CAPTION, _AM_SDYNAMIC_BANNER_BORDER_COLOR_DSC);
		$this->initVar('border_size', XOBJ_DTYPE_TXTBOX, '0', false, null, '',  false, _AM_SDYNAMIC_BANNER_BORDER_SIZE_CAPTION, _AM_SDYNAMIC_BANNER_BORDER_SIZE_DSC);

        $this->setControl('templateid', array('itemHandler' => 'template',
                                        'method' => 'getList',
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
        if ($format == 's' && in_array($key, array('templateid'))) {
            return call_user_func(array($this,$key));
        }
        return parent::getVar($key, $format);
    }

    function templateid(){

        $smartdynamic_template_handler = xoops_getmodulehandler('template', 'smartdynamic');

        $obj =& $smartdynamic_template_handler->get($this->getVar('templateid', 'e'));
        $ret = $obj->getVar('name');
        return $ret;
    }

    function getBannerName() {
    	return $this->getVar('name');
    }

    function getInfoArray() {
    	$banner = array();
    	$banner['id'] = $this->getVar('bannerid');
		$banner['width'] = $this->getWidth();
		$banner['height'] = $this->getHeight();
		$banner['border_color'] = $this->getVar('border_color');
		$banner['border_size'] = $this->getVar('border_size');
		$banner['url'] = XOOPS_URL . '/uploads/smartdynamic/template/' . $this->getTemplateSwffile();
		$banner['xmlsrc'] = XOOPS_URL . '/modules/smartdynamic/generate_xml.php?r=' . XOOPS_ROOT_PATH . 'zzzabczzz' . $this->getVar('bannerid');
		return $banner;
    }

    function getFrames() {
    	$smartdynamic_frame_handler = xoops_getmodulehandler('frame', 'smartdynamic');
    	$criteria = new CriteriaCompo();
    	$criteria->add(new Criteria('bannerid', $this->getVar('bannerid')));
    	return $smartdynamic_frame_handler->getObjects($criteria);
    }

    function getTemplateObject() {
    	$smartdynamic_template_handler = xoops_getmodulehandler('template', 'smartdynamic');
    	$this->_templateObj = $smartdynamic_template_handler->get($this->getVar('templateid', 'e'));
    }

    function getTemplateSwffile() {

    	if (!$this->_templateObj) {
    		$this->getTemplateObject();
    	}
    	return $this->_templateObj->getVar('swffile');
    }

    function getWidth() {
    	if (!$this->_templateObj) {
    		$this->getTemplateObject();
    	}
    	return $this->_templateObj->getVar('width');
    }

    function getHeight() {
    	if (!$this->_templateObj) {
    		$this->getTemplateObject();
    	}
    	return $this->_templateObj->getVar('height');
    }
}

class SmartdynamicBannerHandler extends SmartPersistableObjectHandler {
    function SmartdynamicBannerHandler($db) {
        $this->SmartPersistableObjectHandler($db, 'banner', 'bannerid', 'name', 'description', 'smartdynamic');
    }

    function getBannerInfo($bannerid) {
		$bannerObj = $this->get($bannerid);
		$banner = $bannerObj->getInfoArray();
		return $banner;
    }
}
?>