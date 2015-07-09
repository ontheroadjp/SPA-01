<?php

	$path = 'modules/Services/01/Services.php';
	require_once('modules/Services/01/Services.php');
	$obj = new Services('modules/Services/01/');

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



