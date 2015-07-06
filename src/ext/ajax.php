<?php
	$path = 'modules/Services/01/Services.php';

//	require_once('modules/Module.php');
	require_once('modules/Services/01/Services.php');
	$obj = new Services('modules/Services/01/');
	echo $obj->getEditDoc();
?>



