<?
	
require_once(__DIR__."/../../vendor/autoload.php");

class App{
	
	function __construct(){

	}

	function _config($file = null){
		return new Config\Config($file);
	}
}

?>