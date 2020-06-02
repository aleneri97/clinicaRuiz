<?php 	class Database {
		private static $qcuw32 	= 'farmacia' ; 
		private static $zsup33 	= 'localhost' ;
		private static $jjkg34 	= 'root';
		private static $kmvd35 	= 'root';
		private static $ipcv36  = null;
		public function __construct() {
			exit('Init function is not allowed');
		}
		public static function connect(){
	    	if ( null == self::$ipcv36 ) {      
		    	try {
		        	self::$ipcv36 =  new PDO( "mysql:host=".self::$zsup33.";"."dbname=".self::$qcuw32, self::$jjkg34, self::$kmvd35);  
		        }
		        catch(PDOException $nnav37) {
		        	die($nnav37->getMessage());  
		        }
	       	} 
	       	return self::$ipcv36;
		}
		public static function disconnect() {
			self::$ipcv36 = null;
		}
	}
?>
