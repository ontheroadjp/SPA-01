

<?php

define('HOME', 'home');
define('ONE_COLUMN', '1column');
define('TWO_COLUMNS', '2columns');
define('THREE_COLUMNS', '3columns');
define('LOCATION', 'location');

require_once('ModuleManager.php');

	// private $defaultModules = array(
	// 	'Home01'			=> 'modules/home/01/module.json'
	// 	, 'HeaderIcon'		=> 'modules/3columns/headericon/module.json'
	// 	, 'H2p'				=> 'modules/1column/h2p/module.json'
	// 	, 'TxtImg'			=> 'modules/2columns/txtimg/module.json'
	// 	, 'ImgTxt'			=> 'modules/2columns/imgtxt/module.json'
	// 	, 'Parallax01'		=> 'modules/3columns/parallax01/module.json'
	// 	, 'Portfolio01'		=> 'modules/portfolio/01/module.json'
	// 	, 'Movie01'			=> 'modules/movie/01/module.json'
	// 	, 'Location01'		=> 'modules/location/01/module.json'
	// 	, 'Location02'		=> 'modules/location/02/module.json'
	// 	, 'Clients01'		=> 'modules/clients/01/module.json'
	// );


class PanelGroup extends ModuleManager {
	private $panelGroup = array(
		HOME => array(
			'Home01'	=> 'modules/home/01/'
		),
		ONE_COLUMN => array(
			'H2p'		=> 'modules/1column/h2p/'

		),
		TWO_COLUMNS => array(
			'TxtImg'	=> 'modules/2columns/txtimg/module.json',
			'ImgTxt'	=> 'modules/2columns/imgtxt/module.json'
		),
		THREE_COLUMNS => array(
			'HeaderIcon'=> 'modules/3columns/headericon/',
			'Parallax01'=> 'modules/3columns/parallax01/'

		),
		LOCATION => array(
			'Location01'		=> 'modules/location/01/',
			'Location02'		=> 'modules/location/02/'

		)

	);

	function __construct() {
		// $this->localPath = SITEMAP_FILE_NAME;
		$this->initModules( $this->panelGroup[TWO_COLUMNS] );
	}

	protected function initModules( array $modules = null) {
		parent::initModules($modules);
	}
}


?>

