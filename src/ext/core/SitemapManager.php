
<?php
define("SITEMAP_FILE_NAME", "sitemap.json");

require_once('ModuleManager.php');
class SitemapManager extends ModuleManager {

	private $sitemap = array();
	private $defaultModules = array(
		'Home01'			=> 'modules/home/01/'
		, 'HeaderIcon'		=> 'modules/3columns/headericon/'
		, 'H2p'				=> 'modules/1column/h2p/'
		, 'TxtImg'			=> 'modules/2columns/txtimg/'
		, 'ImgTxt'			=> 'modules/2columns/imgtxt/'
		, 'Parallax01'		=> 'modules/3columns/parallax01/'
		, 'Portfolio01'		=> 'modules/portfolio/01/'
		, 'Movie01'			=> 'modules/movie/01/'
		, 'Location01'		=> 'modules/location/01/'
		, 'Location02'		=> 'modules/location/02/'
		, 'Clients01'		=> 'modules/clients/01/'
	);


	function __construct() {
		$this->setSitemap();
	}

	/**
	 * setSitemap()
	 * サイトマップファイルを読み込んでクラス変数（$sitemap）にセットする
	 * $sitemap は配列
	 * サイトマップファイルが存在しない場合は新規作成する。
	 */
	private function setSitemap() {
		if( $this->isSitemapExist() ) {
			try {
				$this->sitemap = json_decode(file_get_contents(SITEMAP_FILE_NAME), true);
			} catch( Exception $e ) {
				$e->getMessage();
			}			
		} else {
			$newmap = array();
			foreach( $this->defaultModules as $key => $val ) {
				try {
					$json = json_decode(file_get_contents($val.'module.json'),true);
				} catch( Exception $e ) {
					$e->getMessage();
				}
				array_push( $this->sitemap, $json );
			}
			$this->saveSitemap();
		}
	}

	private function isSitemapExist() {
		if( file_exists(SITEMAP_FILE_NAME) ) {
			return true;
		} else {
			return false;
		}
	}

	private function saveSitemap() {
		return file_put_contents( SITEMAP_FILE_NAME, json_encode($this->sitemap,JSON_PRETTY_PRINT) );
	}

	public function moduleCount() {
		return count( $this->sitemap );
	}


	public function getModule($index) {
		$path = $this->sitemap[$index]['path'];
		$name = $this->sitemap[$index]['classname'];
		//var_dump($path.'/'.$name.'.php');
		require_once('modules/'.$path.$name.'.php');
		return new $name('modules/'.$path);
	}

// ---------------------- ここまで sitemap.json 関連 ------------------

	private function loadModuleJson($path) {
		return json_decode( file_get_contents($path.'module.json'),true);
	}


	/**
	 * swapModule()
	 * サイトマップ上のモジュールを上下入替る（swap）
	 *
	 * @param  [type] $first   [description]
	 * @param  [type] $secound [description]
	 * @return [type]          [description]
	 */
	public function swapModule($first, $secound){
		list($this->sitemap[$first], $this->sitemap[$secound]) = 
			array($this->sitemap[$secound], $this->sitemap[$first]);
		$this->saveSitemap();
	}

	/**
	 * addModule()
	 * サイトマップにモジュールを追加する
	 *
	 * @param [type] $newmodule [description]
	 * @param [type] $position  [description]
	 */
	public function addModule($newmodule, $position) {

		$path = 'modules/2columns/txtimg/';
		$newmodule = $this->loadModuleJson($path);

		$last = array_splice($this->sitemap, $position);	//挿入する位置～末尾までを切り出す
		array_push($this->sitemap, $newmodule);				//先頭～挿入前位置までの配列に、挿入する値を追加

		for( $n=0; $n<count($last); $n++ ) {
			array_push($this->sitemap, $last[$n]);
		}
//		$array = array_merge($this->sitemap, $last);
		$this->saveSitemap();
	}

	/**
	 * deleteModule()
	 * サイトマップのモジュールを削除する
	 *
	 * @param  [type] $position [description]
	 * @return [type]           [description]
	 */
	public function deleteModule($position){
		unset($this->sitemap[$position]);
		$this->sitemap = array_values($this->sitemap);
		$this->saveSitemap();
	}


}

?>