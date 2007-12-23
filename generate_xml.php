<?
error_reporting(0);
$nodes = array();
$i = 0;

$infos = $_GET['r'];

$aInfos = explode('zzzabczzz', $infos);

$root_path = $aInfos[0];
$bannerid = $aInfos[1];

include_once($root_path . '/mainfile.php');
include_once($root_path . '/modules/smartobject/class/smartloader.php');
$smartdynamic_frame_handler = xoops_getmodulehandler('frame', 'smartdynamic');

$smartdynamic_root_path = $root_path . '/modules/smartdynamic/';
$smartdynamic_images_url_path = XOOPS_URL . '/uploads/smartdynamic/frame/';

$criteria = new CriteriaCompo();
$criteria->add(new Criteria('bannerid', $bannerid));
$criteria->setSort('weight');
$framesObj = $smartdynamic_frame_handler->getObjects($criteria);

$myts = MyTextSanitizer::getInstance();

foreach ($framesObj as $frameObj) {
	$nodes[$i]['jpegURL'] = $smartdynamic_images_url_path . $frameObj->getVar('image');
	$nodes[$i]['transition'] = $frameObj->getVar('transition');
	$nodes[$i]['pagedelay'] = $frameObj->getVar('pagedelay');
	$nodes[$i]['link'] = $frameObj->getVar('url');
	$nodes[$i]['color'] = $frameObj->getVar('color');
	$nodes[$i]['size'] = $frameObj->getVar('size');
	$nodes[$i]['face'] = $frameObj->getVar('face');
	$nodes[$i]['text'] = $frameObj->getVar('text', 'n');
//xoops_debug("text original : " . $nodes[$i]['text']);
	$nodes[$i]['text'] = str_replace('<', 'a1a', $nodes[$i]['text']);
	$nodes[$i]['text'] = str_replace('>', 'a2a', $nodes[$i]['text']);
	$nodes[$i]['text'] = str_replace('"', 'a3a', $nodes[$i]['text']);
	$nodes[$i]['text'] = $myts->displayTarea($nodes[$i]['text']);
//xoops_debug("apres displayTaera : " . $nodes[$i]['text']);
	$nodes[$i]['text'] = smart_htmlnumericentities($nodes[$i]['text']);
//xoops_debug(" htmlnumericalentities : " . $nodes[$i]['text']);
	$nodes[$i]['text'] = str_replace('a1a', '&lt;', $nodes[$i]['text']);
	$nodes[$i]['text'] = str_replace('a2a', '&gt;', $nodes[$i]['text']);
	$nodes[$i]['text'] = str_replace('a3a', '"', $nodes[$i]['text']);
//xoops_debug("text reconversion des <>  : " . $nodes[$i]['text']);

	$nodes[$i]['page'] = htmlSpecialChars('<p align="' . $frameObj->getVar('align') . '"><font size="' . $nodes[$i]['size'] . '" color="' . $nodes[$i]['color'] . '" face="' . $nodes[$i]['face'] . '">theTextGoesHere123</font></p>');
	$nodes[$i]['page'] = str_replace('theTextGoesHere123', $nodes[$i]['text'], $nodes[$i]['page']);
//xoops_debug("finale : " . $nodes[$i]['page']);
	$i++;
}

$xml_template = $smartdynamic_root_path . 'templates/smartdynamic_xml_template.html';

if(is_file($xml_template)){
    $filesize = filesize($xml_template);
    $handle = fopen($xml_template, 'r');
    $xml_template_content = fread($handle, $filesize);
    fclose($handle);
}

$frame_template = $smartdynamic_root_path . 'templates/smartdynamic_frame_template.html';
if(is_file($frame_template)){
    $filesize = filesize($frame_template);
    $handle = fopen($frame_template, 'r');
    $frame_template_content = fread($handle, $filesize);
    fclose($handle);
}
$all_frames = '';

foreach($nodes as $node) {
	$new_frame_content = $frame_template_content;
	$new_frame_content = str_replace('<{$jpegURL}>', $node['jpegURL'], $new_frame_content);
	$new_frame_content = str_replace('<{$transition}>', $node['transition'], $new_frame_content);
	$new_frame_content = str_replace('<{$page}>', $node['page'], $new_frame_content);
	$new_frame_content = str_replace('<{$pagedelay}>', $node['pagedelay'], $new_frame_content);
	$new_frame_content = str_replace('<{$link}>', $node['link'], $new_frame_content);
	$all_frames .= $new_frame_content;
}

$xml_to_output = str_replace('<{$all_frames}>',$all_frames, $xml_template_content);
echo $xml_to_output;
?>