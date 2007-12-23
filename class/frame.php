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
class SmartdynamicFrame extends SmartSeoObject {

    function SmartdynamicFrame() {
        $this->initVar('frameid', XOBJ_DTYPE_INT, '', true);
        $this->initVar('bannerid', XOBJ_DTYPE_INT, '', true, null, '', false, _AM_SDYNAMIC_FRAME_BANNERID_CAPTION, _AM_SDYNAMIC_FRAME_BANNERID_DSC, true);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX, '', false, null, '',  false, _AM_SDYNAMIC_FRAME_NAME_CAPTION, _AM_SDYNAMIC_FRAME_NAME_DSC);
        $this->initVar('text', XOBJ_DTYPE_TXTAREA, '', false, null,'', false,  _AM_SDYNAMIC_FRAME_TEXT_CAPTION, _AM_SDYNAMIC_FRAME_TEXT_DSC);
		$this->initVar('image', XOBJ_DTYPE_TXTBOX, '', false, null, '',  false, _AM_SDYNAMIC_FRAME_IMAGE_CAPTION, _AM_SDYNAMIC_FRAME_IMAGE_DSC);
		$this->initVar('face', XOBJ_DTYPE_TXTBOX, '', false, null, '',  false, _AM_SDYNAMIC_FRAME_FACE_CAPTION, _AM_SDYNAMIC_FRAME_FACE_DSC);
		$this->initVar('color', XOBJ_DTYPE_TXTBOX, '', false, null, '',  false, _AM_SDYNAMIC_FRAME_COLOR_CAPTION, _AM_SDYNAMIC_FRAME_COLOR_DSC);
		$this->initVar('size', XOBJ_DTYPE_TXTBOX, 14, false, null, '',  false, _AM_SDYNAMIC_FRAME_SIZE_CAPTION, _AM_SDYNAMIC_FRAME_SIZE_DSC);
		$this->initVar('pagedelay', XOBJ_DTYPE_TXTBOX, 5, false, null, '',  false, _AM_SDYNAMIC_FRAME_PAGEDELAY_CAPTION, _AM_SDYNAMIC_FRAME_PAGEDELAY_DSC);
		$this->initVar('transition', XOBJ_DTYPE_TXTBOX, '', false, null, '',  false, _AM_SDYNAMIC_FRAME_TRANSITION_CAPTION, _AM_SDYNAMIC_FRAME_TRANSITION_DSC);
		$this->initVar('align', XOBJ_DTYPE_TXTBOX, 'center', false, null, '',  false, _AM_SDYNAMIC_FRAME_ALIGN_CAPTION, _AM_SDYNAMIC_FRAME_ALIGN_DSC);
		$this->initVar('url', XOBJ_DTYPE_TXTBOX, '', false, null, '',  false, _AM_SDYNAMIC_FRAME_URL_CAPTION, _AM_SDYNAMIC_FRAME_URL_DSC);

        $this->setControl('image', 'image');
    //    $this->setControl('color', 'color');

        $this->setControl('bannerid', array('itemHandler' => 'banner',
                                        'method' => 'getList',
                                        'module' => 'smartdynamic'));

        $this->setControl('face', array('itemHandler' => 'frame',
                                        'method' => 'getFaces',
                                        'module' => 'smartdynamic'));

        $this->setControl('transition', array('itemHandler' => 'frame',
                                        'method' => 'getTransitions',
                                        'module' => 'smartdynamic'));

        $this->setControl('align', array('itemHandler' => 'frame',
                                        'method' => 'getAlignOptions',
                                        'module' => 'smartdynamic'));
        $this->initCommonVar('weight');
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
}

class SmartdynamicFrameHandler extends SmartPersistableObjectHandler {
    function SmartdynamicFrameHandler($db) {
        $this->SmartPersistableObjectHandler($db, 'frame', 'frameid', 'name', 'description', 'smartdynamic');
    }

    function getFaces() {
    	$ret = array('arial' => 'Arial',
    				 'courrier' => 'Courrier');
    	return $ret;

    }

    function getTransitions() {
    	$ret = array('scrollup' => 'Scroll Up',
    				 'scrolldown' => 'Scroll Down',
    				 'crossfade' => 'Cross Fade',
    				 'fade' => 'Fade');
    	return $ret;

    }
    function getAlignOptions() {
    	$ret = array('left' => _AM_SDYNAMIC_FRAME_ALIGN_LEFT,
    				 'center' => _AM_SDYNAMIC_FRAME_ALIGN_CENTER,
    				 'right' => _AM_SDYNAMIC_FRAME_ALIGN_RIGHT);
    	return $ret;

    }
}
?>