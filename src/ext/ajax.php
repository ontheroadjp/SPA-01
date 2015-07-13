<?php

	$path = 'modules/2columns/txtimg/TxtImg.php';
	require_once('modules/2columns/txtimg/TxtImg.php');
	$obj = new TxtImg('modules/2columns/txtimg/');

	$type = $_POST['type'];


	switch($type) {
		case 'editDoc':
			echo $obj->getEditDoc();
			break;
		case 'panelControlButtons':
			echo $obj->getPanelControlButtons();
			break;
	}
//	echo $obj->getEditDoc();
?>



