<?php 
class Database extends PDO{
 	private $nmwd43 = "consultorio";
	private $wisn44 	= "localhost";
	private $lulf13 	= "postgres";
	private $odig45 	= "postgres";
	private $lqxp46 	= 5432;
	private $zdqw47;
 	public function __construct(){
	    try {
	        $this->zdqw47 = parent::__construct("pgsql:host=$this->wisn44;port=$this->lqxp46;dbname=$this->nmwd43;user=$this->lulf13;password=$this->odig45");
	    }
        catch(PDOException $eype54){
	        echo  $eype54->getMessage();
	    } 
	}
 	public function close(){
    	$this->zdqw47 = null;
	} 
}
?>