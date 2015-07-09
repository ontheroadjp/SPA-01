
<?php
define("SITEMAP_FILE_NAME", "sitemap.json");


class ModuleManager {

	private $sitemap = array();

	private $defaultModules = array(
		'Home' => 'modules/home/01/'
		, 'Services' => 'modules/services/01/'
		, 'Parallax' => 'modules/parallax/01/'
		, 'Portfolio' => 'modules/portfolio/01/'
		, 'Movie' => 'modules/movie/01/'
		, 'Location' => 'modules/location/01/'
		, 'Clients' => 'modules/clients/01/'
	);

	function __construct() {
		$this->setSitemap();
	}

	private function isSitemapExist() {
		if( file_exists(SITEMAP_FILE_NAME) ) {
			return true;
		} else {
			return false;
		}
	}

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
			try {
				file_put_contents( SITEMAP_FILE_NAME, json_encode($this->sitemap,JSON_PRETTY_PRINT) );
			} catch( Exception $e ) {
				$e->getMessage();
			}
		}
	}

	public function moduleCount() {
		return count( $this->sitemap );
	}


	public function getModule($index) {
		$path = $this->sitemap[$index]['path'];
		$name = $this->sitemap[$index]['classname'];
		require_once('modules/'.$path.$name.'.php');
		return new $name('modules/'.$path);
	}

	public function addModule(){

	}

	public function swapModule($first, $secound){
				echo '<h1>hello</h1>';

		list($this->sitemap[$first], $this->sitemap[$secound]) = 
			array($this->sitemap[$secound], $this->sitemap[$first]);

		file_put_contents( SITEMAP_FILE_NAME, json_encode($this->sitemap,JSON_PRETTY_PRINT) );

	}

	public function deleteModule(){

	}


}

?>