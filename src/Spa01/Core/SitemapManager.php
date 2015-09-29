<?php

// namespace Spa01\Core;

define("SITEMAP_FILE_NAME", "sitemap.json");

require_once(dirname(__FILE__).'/ModuleManager.php');

class SitemapManager extends ModuleManager {


	// private $sitemap = array();
	private $defaultModules = array(
		'Home01'			=> "dirname(__FILE__)/../Modules/home/01/module.json"
		, 'HeaderIcon'		=> "dirname(__FILE__)/../Modules/3columns/headericon/module.json"
		, 'H2p'				=> "dirname(__FILE__)/../Modules/1column/h2p/module.json"

		, 'TxtImgRev'		=> "dirname(__FILE__)/../Modules/2columns/txtimg_rev/module.json"
		, 'TxtImg'			=> "dirname(__FILE__)/../Modules/2columns/txtimg/module.json"
		, 'ImgTxt'			=> "dirname(__FILE__)/../Modules/2columns/imgtxt/module.json"
		, 'ImgTxtRev'		=> "dirname(__FILE__)/../Modules/2columns/imgtxt_rev/module.json"

		, 'Parallax01'		=> "dirname(__FILE__)/../Modules/3columns/parallax01/module.json"
		, 'Portfolio01'		=> "dirname(__FILE__)/../Modules/portfolio/01/module.json"
		, 'Movie01'			=> "dirname(__FILE__)/../Modules/movie/01/module.json"
		, 'Location01'		=> "dirname(__FILE__)/../Modules/location/01/module.json"
		, 'Location02'		=> "dirname(__FILE__)/../Modules/location/02/module.json"
		, 'Clients01'		=> "dirname(__FILE__)/../Modules/clients/01/module.json"
	);


	function __construct() {
		$this->localPath = dirname(__FILE__).'/../../'.SITEMAP_FILE_NAME;

		// sitemap.json が存在する場合はロード
		if( $this->isSitemapExist() ) {
			$this->sitemap = json_decode(file_get_contents($this->localPath), true);

		// sitemap.json がない場合は新規作成
		} else {
			parent::setModuleMap($this->defaultModules);
			// foreach( $this->defaultModules as $name => $path ) {
			// 	$json = json_decode(file_get_contents($path), true);
			// 	array_push( $this->sitemap, $json );
			// }
			$this->saveModules($this->localPath);
		}

	}

	protected function isSitemapExist() {
		return file_exists(dirname(__FILE__).'/../'.'SITEMAP_FILE_NAME');
	}


	protected function saveModules($path) {
		if(!isset($this->modulemap)) return false;
		if(!isset($path) && !isset($this->localpath)) return false;
		if(!isset($path) && isset($this->localpath)){
			$path = $this->localpath;
		}
		return file_put_contents( $path, json_encode($this->modulemap,JSON_PRETTY_PRINT) );
	}


	/**
	 * swapModule()
	 * モジュールマップ上のモジュールの順序（前後）を入替る
	 *
	 * @param  [type] $first   [description]
	 * @param  [type] $secound [description]
	 * @return [type]          [description]
	 */
	public function swapModule($first, $secound){
		list($this->modulemap[$first], $this->modulemap[$secound]) = 
			array($this->modulemap[$secound], $this->modulemap[$first]);
		$this->saveModules($this->localPath);
	}

	/**
	 * addModule()
	 * モジュールマップに新規モジュールを追加する
	 *
	 * @param [type] $newmodule [description]
	 * @param [type] $position  [description]
	 */
	public function addModule($path, $position) {
		$newmodule = $this->loadJson($path);

		$last = array_splice($this->modulemap, $position);	//挿入する位置～末尾までを切り出す
		array_push($this->modulemap, $newmodule);				//先頭～挿入前位置までの配列に、挿入する値を追加

		for( $n=0; $n<count($last); $n++ ) {
			array_push($this->modulemap, $last[$n]);
		}
//		$array = array_merge($this->modulemap, $last);
		$this->saveModules($this->localPath);
	}

	/**
	 * deleteModule()
	 * モジュールマップ内のモジュールを削除する
	 *
	 * @param  [type] $position [description]
	 * @return [type]           [description]
	 */
	public function deleteModule($position){
		unset($this->modulemap[$position]);
		$this->modulemap = array_values($this->modulemap);
		$this->saveModules($this->localPath);
	}



	/**
	 * setSitemap()
	 * サイトマップファイルを読み込んでクラス変数（$sitemap）にセットする
	 * $sitemap は配列
	 * サイトマップファイルが存在しない場合は新規作成する。
	 */
	// protected function initModules( array $modules) {
	// 	if( $this->isSitemapExist() ) {
	// 		$this->sitemap = json_decode(file_get_contents($this->localPath), true);
	// 	} else {
	// 		if( parent::initModules($modules) ) {
	// 			$this->saveModules($this->localPath);
	// 		}
	// 	}
	// }




}

?>