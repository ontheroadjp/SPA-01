
<?php

define("SITEMAP_FILE_NAME", "sitemap.json");

require_once('ModuleManager.php');

class SitemapManager extends ModuleManager {

	// private $sitemap = array();
	private $defaultModules = array(
		'Home01'			=> 'modules/home/01/module.json'
		, 'HeaderIcon'		=> 'modules/3columns/headericon/module.json'
		, 'H2p'				=> 'modules/1column/h2p/module.json'
		, 'TxtImg'			=> 'modules/2columns/txtimg/module.json'
		, 'ImgTxt'			=> 'modules/2columns/imgtxt/module.json'
		, 'Parallax01'		=> 'modules/3columns/parallax01/module.json'
		, 'Portfolio01'		=> 'modules/portfolio/01/module.json'
		, 'Movie01'			=> 'modules/movie/01/module.json'
		, 'Location01'		=> 'modules/location/01/module.json'
		, 'Location02'		=> 'modules/location/02/module.json'
		, 'Clients01'		=> 'modules/clients/01/module.json'
	);


	function __construct() {
		$this->localPath = SITEMAP_FILE_NAME;
		$this->initModules( $this->defaultModules );
	}

	/**
	 * setSitemap()
	 * サイトマップファイルを読み込んでクラス変数（$sitemap）にセットする
	 * $sitemap は配列
	 * サイトマップファイルが存在しない場合は新規作成する。
	 */
	protected function initModules( array $modules = null) {
		if( $this->isSitemapExist() ) {
			$this->sitemap = json_decode(file_get_contents(SITEMAP_FILE_NAME), true);
		} else {
			if( parent::initModules($modules) ) {
				$this->saveModules(SITEMAP_FILE_NAME);
			}
		}
	}

	private function isSitemapExist() {
		if( file_exists(SITEMAP_FILE_NAME) ) {
			return true;
		} else {
			return false;
		}
	}


}

?>