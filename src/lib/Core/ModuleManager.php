<?php

// namespace lib\Core;

class ModuleManager {

	protected $modulemap = array();
	protected $localPath = '';


// ---------------------------------------------------------
// コンストラク
// ---------------------------------------------------------

	function __construct() {
	}

// ---------------------------------------------------------
// protected メソッド
// ---------------------------------------------------------


	/**
	 * setModuleMap()
	 * 
	 * サイトマップファイルを読み込んでクラス変数（$modulemap）にセットする
	 * $modulemap は配列
	 */
	protected function setModuleMap(array $modules) {
		if(!isset($modules)) {
			return false;
		} else {
			foreach( $modules as $key => $val ) {
				$json = $this->loadJson($val);
				array_push( $this->modulemap, $json );
			}
			return true;
		}
	}

	protected function loadJson($filepath) {
		return json_decode(file_get_contents(dirname(__FILE__)."/../".$filepath), true);
	}



// ---------------------------------------------------------
// public メソッド
// ---------------------------------------------------------

	public function moduleCount() {
		return count( $this->modulemap );
	}

	/**
	 * getModule()
	 * モジュールオブジェクトを返す
	 * 
	 * @param  int 	$index [description]
	 * @return obj
	 */
	public function getModule($index) {
		$path = $this->modulemap[$index]['path'];
		$name = $this->modulemap[$index]['classname'];
		// var_dump($path.$name.'.php');
		require_once(dirname(__FILE__).'/../modules/'.$path.$name.'.php');
		return new $name(dirname(__FILE__).'/../modules/'.$path);
	}


}

?>