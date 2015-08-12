<?php
// 指定の URL 以外からのアクセスを弾く処理を追加する
?>

<?php

$type = $_POST['type'];

require_once('core/PanelGroup.php');
require_once('modules/ModuleUtilities.php');

$defaultPanelGroup = array(
	HOME => array(
		'Home01'	=> 'modules/home/01/module.json'
	),
	ONE_COLUMN => array(
		'H2p'		=> 'modules/1column/h2p/module.json'

	),
	TWO_COLUMNS => array(
		'TxtImg'	=> 'modules/2columns/txtimg/module.json',
		'TxtImgRev'	=> 'modules/2columns/txtimg_rev/module.json',
		'ImgTxt'	=> 'modules/2columns/imgtxt/module.json',
		'ImgTxtRev'	=> 'modules/2columns/imgtxt_rev/module.json',
	),
	THREE_COLUMNS => array(
		'HeaderIcon'=> 'modules/3columns/headericon/module.json',
		'Parallax01'=> 'modules/3columns/parallax01/module.json'

	),
	LOCATION => array(
		'Location01'		=> 'modules/location/01/module.json',
		'Location02'		=> 'modules/location/02/module.json'

	)
);

/**
 * createPanelGroupObjects()
 *
 * @param  array  $array [description]
 * @return [type]        [description]
 */
function createPanelGroupObjects(array $array){
	$objs = array();
	foreach( $array as $key => $val ) {
		array_push($objs, new PanelGroup($array[$key]));
	}
	return $objs;
}

/**
 * getCarouselHTML()
 *
 * @param  [type]  $defaultPanelGroup [description]
 * @param  integer $id                [description]
 * @return [type]                     [description]
 */
function getCarouselHTML($defaultPanelGroup, $id = 0) {
	$modules = array();
	for($n=0;$n<$defaultPanelGroup->moduleCount();$n++){
		array_push($modules, $defaultPanelGroup->getModule($n)->getDoc());
	}
	return ModuleUtilities::wrapCarousel($modules, $id);
}


switch($type) {
	case 'editDoc':
		$panelGroupObjects = createPanelGroupObjects($defaultPanelGroup);
		$carouselsHTML = array();
		for($n=0;$n<count($panelGroupObjects);$n++){
			array_push( $carouselsHTML, getCarouselHTML($panelGroupObjects[$n], 'panel-carousel-'.$n) );
		}
		$pillsHTML = ModuleUtilities::wrapPills($carouselsHTML);
		return ModuleUtilities::wrapPanelControll($pillsHTML);
		break;

	case 'panelControlButtons':
		echo $obj->getPanelControlButtons();
		break;
}


?>



