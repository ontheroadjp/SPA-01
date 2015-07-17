
<?php
define("SITEMAP_FILE_NAME", "sitemap.json");


class ModuleManager {

	protected $sitemap = array();
	protected $localPath = '';

	// private $defaultModules = array(
	// 	'Home01'			=> 'modules/home/01/'
	// 	, 'HeaderIcon'		=> 'modules/3columns/headericon/'
	// 	, 'H2p'				=> 'modules/1column/h2p/'
	// 	, 'TxtImg'			=> 'modules/2columns/txtimg/'
	// 	, 'ImgTxt'			=> 'modules/2columns/imgtxt/'
	// 	, 'Parallax01'		=> 'modules/3columns/parallax01/'
	// 	, 'Portfolio01'		=> 'modules/portfolio/01/'
	// 	, 'Movie01'			=> 'modules/movie/01/'
	// 	, 'Location01'		=> 'modules/location/01/'
	// 	, 'Location02'		=> 'modules/location/02/'
	// 	, 'Clients01'		=> 'modules/clients/01/'
	// );


// ---------------------------------------------------------
// コンストラク
// ---------------------------------------------------------

	function __construct() {
		// $this->setSitemap();
	}

// ---------------------------------------------------------
// private メソッド
// ---------------------------------------------------------

	private function isSitemapExist() {
		if( file_exists('SITEMAP_FILE_NAME') ) {
			return true;
		} else {
			return false;
		}
	}


// ---------------------------------------------------------
// protected メソッド
// ---------------------------------------------------------

	/**
	 * setSitemap()
	 * サイトマップファイルを読み込んでクラス変数（$sitemap）にセットする
	 * $sitemap は配列
	 * サイトマップファイルが存在しない場合は新規作成する。
	 */
	protected function initModules(array $modules = null) {
		// if( $this->isSitemapExist() ) {
		// 	try {
		// 		$this->sitemap = json_decode(file_get_contents(SITEMAP_FILE_NAME), true);
		// 	} catch( Exception $e ) {
		// 		$e->getMessage();
		// 	}			
		// } else {
		if(!isset($modules)) {
			return false;
		} else {
			// $map = array();
			foreach( $modules as $key => $val ) {
				// if( $json = $this->loadModuleJson($val) ) {
				// if( $json = $this->loadJson($val) ) {
				$json = $this->loadJson($val);
					array_push( $this->sitemap, $json );
				// }
			}
			return true;
		}
		// 	$this->saveSitemap();
		// }
	}

	protected function saveModules($path) {
		// $path = 'sitemap_temp.json';
		if(!isset($this->sitemap)) return false;
		if(!isset($path) && !isset($this->localpath)) return false;
		if(!isset($path) && isset($this->localpath)){
			$path = $this->localpath;
		}
		return file_put_contents( $path, json_encode($this->sitemap,JSON_PRETTY_PRINT) );
	}

	protected function loadJson($filepath) {
		return json_decode(file_get_contents($filepath), true);
	}

	// protected function loadModuleJson($path) {
	// 	return json_decode( file_get_contents($path.'module.json'),true);
	// }


// ---------------------------------------------------------
// public メソッド
// ---------------------------------------------------------


	public function moduleCount() {
		return count( $this->sitemap );
	}

	/**
	 * getModule()
	 * モジュールオブジェクトを返す
	 * 
	 * @param  int 	$index [description]
	 * @return obj
	 */
	public function getModule($index) {
		$path = $this->sitemap[$index]['path'];
		$name = $this->sitemap[$index]['classname'];
		// var_dump($path.$name.'.php');
		require_once('modules/'.$path.$name.'.php');
		return new $name('modules/'.$path);
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
		list($this->sitemap[$first], $this->sitemap[$secound]) = 
			array($this->sitemap[$secound], $this->sitemap[$first]);
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

		// $path = 'modules/2columns/txtimg/module.json';
		// $newmodule = $this->loadModuleJson($path);
		$newmodule = $this->loadJson($path);

		$last = array_splice($this->sitemap, $position);	//挿入する位置～末尾までを切り出す
		array_push($this->sitemap, $newmodule);				//先頭～挿入前位置までの配列に、挿入する値を追加

		for( $n=0; $n<count($last); $n++ ) {
			array_push($this->sitemap, $last[$n]);
		}
//		$array = array_merge($this->sitemap, $last);
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
		unset($this->sitemap[$position]);
		$this->sitemap = array_values($this->sitemap);
		$this->saveModules($this->localPath);
	}


}

?>