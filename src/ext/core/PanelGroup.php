

<?php

define('HOME', 'home');
define('1COLUMN', '1column');
define('2COLUMNS', '2columns');
define('3COLUMNS', '3columns');
define('LOCATION', 'location');

class PanelGroup {
	private $panelGroup = array(
		HOME => array(
			'Home01'	=> 'modules/home/01/'
		),
		1COLUMN => array(
			'H2p'		=> 'modules/1column/h2p/'

		),
		2COLUMNS => array(
			'TxtImg'	=> 'modules/2columns/txtimg/',
			'ImgTxt'	=> 'modules/2columns/imgtxt/'

		),
		3COLUMNS => array(
			'HeaderIcon'=> 'modules/3columns/headericon/',
			'Parallax01'=> 'modules/3columns/parallax01/'

		),
		LOCATION => array(
			'Location01'		=> 'modules/location/01/',
			'Location02'		=> 'modules/location/02/'

		)

	);

	public function getPanelGroup( $group = 2COLUMNS ) {
		foreach(){

		}

		for( $n=0; $n<$panelGroup[$group]; $n++ ) {
			$module = $mm->getModule($n);
		if( $editmode == 1 ) { 
			echo $module->getEditDoc();
		} else {
			echo $module->getDoc();
		}
	}

	}
}


?>

