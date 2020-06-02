<?php     require_once($_SERVER['DOCUMENT_ROOT'] . "/db/Database.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/interfaces/ITipoDeCita.php");
    class AppointmentType implements IAppointmentType {
    	private $ijef57;
        private $dsdx14;
        private $dvou83;
        private $unhe84;
    	public function __construct(Database $ouyv0){
    		$this->con = new $ouyv0;
    	}
        public function setId($dsdx14){
            $this->id = $dsdx14;
        }
        public function setDescription($dvou83){
            $this->description = $dvou83;
        }
        public function setTime($unhe84){
            $this->time = $unhe84;
        }
    	public function save() {
    		try{
    			$query = $this->con->prepare('INSERT INTO tipo_de_cita (description, time) values (?,?)');
                $query->bindParam(1, $this->description, PDO::PARAM_STR);
                $query->bindParam(2, $this->time, PDO::PARAM_STR);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $eype54) {
    	        echo  $eype54->getMessage();
    	    }
    	}
        public function update(){
    		try{
    			$query = $this->con->prepare('UPDATE tipo_de_cita SET description = ?, time = ? WHERE id = ?');
                $query->bindParam(1, $this->description, PDO::PARAM_STR);
                $query->bindParam(2, $this->time, PDO::PARAM_STR);
                $query->bindParam(3, $this->id, PDO::PARAM_INT);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $eype54){
    	        echo  $eype54->getMessage();
    	    }
    	}
    	public function get(){
    		try{
                if(is_int($this->id)){
                    
                    $query = $this->con->prepare('SELECT * FROM tipo_de_cita WHERE id = ?');
                    $query->bindParam(1, $this->id, PDO::PARAM_INT);
                    $query->execute();
        			$this->con->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{
                    
                    $query = $this->con->prepare('SELECT * FROM tipo_de_cita');
        			$query->execute();
        			$this->con->close();
                    
        			return $query->fetchAll(PDO::FETCH_OBJ);
                }
    		}
            catch(PDOException $eype54){
    	        echo  $eype54->getMessage();
    	    }
    	}
        public function delete(){
            try{
                $query = $this->con->prepare('DELETE FROM tipo_de_cita WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return true;
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public static function baseurl() {
             return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'] . "/crudpgsql/";
        }
        public function checkAppointmentType($zsfc7) {
            if( ! $zsfc7 ) {
                header("Location:" . AppointmentType::baseurl() . "index.php");
            }
        }
    }
?>