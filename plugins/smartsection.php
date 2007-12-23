<?php

/**
* $Id$
* Module: SmartDynamic
* Author: The SmartFactory <www.smartfactory.ca>
* Licence: GNU
*/

/**
 * Usage of SmartDynamic plugin system
 *
 * A plugin need to be named by the dirname of the module.
 * The plugin needs to defined an array called $pluginPatterns in which
 * the index will be the string to replace and the value will be one
 * of these values :
 * - ModuleName : Clone name when 2 words can be capitalized
 * - Modulename : Clone name with only the first letter capitalized
 * - modulename : Clone name all lowercase
 * - MODULENAME : Clone name all uppercase
 * - MODULEN    : Clone name all uppercase trunked to the first 6 letters
 */

/**
 * SmartDynamic plugin for SmartSection
 */

$pluginPatterns['SmartSection'] = 'ModuleName';
$pluginPatterns['SSECTION'] = 'MODULEN';
?>