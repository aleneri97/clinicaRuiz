<?php     require_once($_SERVER['DOCUMENT_ROOT'] . "/db/Database.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/interfaces/IDoctor.php");
    class Dentist implements IDentist {
    	private $ijef57;
        private $dsdx14;
        private $utgl86;
        private $lfnm87;
        private $prdp88;
        private $znkm89;
        private $aswc90;
        private $qrle91;
        private $xuhh92;
    	public function __construct(Database $ouyv0){
    		$this->con = new $ouyv0;
    	}
        public function setId($dsdx14){
            $this->id = $dsdx14;
        }
        public function setFirstName($utgl86){
            $this->firstName = $utgl86;
        }
        public function setLastName($lfnm87){
            $this->lastName = $lfnm87;
        }
        public function setCellPhone($prdp88){
            $this->telefono = $prdp88;
        }
        public function setEmail($znkm89){
            $this->correo_electronico = $znkm89;
        }
        public function setBirthdate($aswc90){
            $this->fecha_de_nacimiento = $aswc90;
        }
        public function setStartDate($qrle91){
            $this->startDate = $qrle91;
        }
        public function setStatus($xuhh92){
            $this->estado = $xuhh92;
        }
    	public function save() {
    		try{
    			$query = $this->con->prepare('INSERT INTO doctores (nombre, apellido, telefono, correo_electronico, fecha_de_nacimiento, fecha_de_inicio, estado) values (?,?,?,?,?,?,?)');
                $query->bindParam(1, $this->firstName, PDO::PARAM_STR);
                $query->bindParam(2, $this->lastName, PDO::PARAM_STR);
                $query->bindParam(3, $this->telefono, PDO::PARAM_STR);
                $query->bindParam(4, $this->correo_electronico, PDO::PARAM_STR);
                $query->bindParam(5, $this->fecha_de_nacimiento, PDO::PARAM_STR);
                $query->bindParam(6, $this->startDate, PDO::PARAM_STR);
                $query->bindParam(7, $this->estado, PDO::PARAM_STR);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $eype54) {
    	        echo  $eype54->getMessage();
    	    }
    	}
        public function update(){
    		try{
    			$query = $this->con->prepare('UPDATE doctores SET nombre = ?, apellido = ?, telefono = ?, correo_electronico = ?, fecha_de_nacimiento = ?, fecha_de_inicio = ?, estado = ? WHERE id = ?');
    			$query->bindParam(1, $this->firstName, PDO::PARAM_STR);
                $query->bindParam(2, $this->lastName, PDO::PARAM_STR);
                $query->bindParam(3, $this->telefono, PDO::PARAM_STR);
                $query->bindParam(4, $this->correo_electronico, PDO::PARAM_STR);
                $query->bindParam(5, $this->fecha_de_nacimiento, PDO::PARAM_STR);
                $query->bindParam(6, $this->startDate, PDO::PARAM_STR);
                $query->bindParam(7, $this->estado, PDO::PARAM_STR);
                $query->bindParam(8, $this->id, PDO::PARAM_INT);
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
                    
                    $query = $this->con->prepare('SELECT * FROM doctores WHERE id = ?');
                    $query->bindParam(1, $this->id, PDO::PARAM_INT);
                    $query->execute();
        			$this->con->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{
                    
                    $query = $this->con->prepare('SELECT * FROM doctores');
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
                $query = $this->con->prepare('DELETE FROM doctores WHERE id = ?');
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
        public function checkDentist($drel11) {
            if( ! $drel11 ) {
                header("Location:" . Dentist::baseurl() . "index.php");
            }
        }
    }
?>