<?php     require_once($_SERVER['DOCUMENT_ROOT'] . "/db/Database.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/interfaces/IPaciente.php");

    class Patient implements IPatient {
    	private $ijef57;
        private $dsdx14;
        private $utgl86;
        private $lfnm87;
        private $aswc90;
        private $sxix61;
        private $znkm89;
        private $prdp88;
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
        public function setBirthdate($aswc90){
            $this->fecha_de_nacimiento = $aswc90;
        }
        public function setCreatedAt($sxix61){
            $this->createdAt = $sxix61;
        }
        public function setEmail($znkm89){
            $this->correo_electronico = $znkm89;
        }
        public function setCellphone($prdp88){
            $this->telefono = $prdp88;
        }
    	public function save() {
    		try{
    			$query = $this->con->prepare('INSERT INTO pacientes (nombre, apellido, fecha_de_nacimiento, created_at, correo_electronico, telefono) values (?,?,?,?,?,?)');
                $query->bindParam(1, $this->firstName, PDO::PARAM_STR);
                $query->bindParam(2, $this->lastName, PDO::PARAM_STR);
                $query->bindParam(3, $this->fecha_de_nacimiento, PDO::PARAM_STR);
                $query->bindParam(4, $this->createdAt, PDO::PARAM_STR);
                $query->bindParam(5, $this->correo_electronico, PDO::PARAM_STR);
                $query->bindParam(6, $this->telefono, PDO::PARAM_STR);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $eype54) {
    	        echo  $eype54->getMessage();
    	    }
    	}
        public function update(){
    		try{
    			$query = $this->con->prepare('UPDATE pacientes SET nombre = ?, apellido = ?, fecha_de_nacimiento = ?, created_at = ?, correo_electronico = ?, telefono = ? WHERE id = ?');
                $query->bindParam(1, $this->firstName, PDO::PARAM_STR);
                $query->bindParam(2, $this->lastName, PDO::PARAM_STR);
                $query->bindParam(3, $this->fecha_de_nacimiento, PDO::PARAM_STR);
                $query->bindParam(4, $this->createdAt, PDO::PARAM_STR);
                $query->bindParam(5, $this->correo_electronico, PDO::PARAM_STR);
                $query->bindParam(6, $this->telefono, PDO::PARAM_STR);
                $query->bindParam(7, $this->id, PDO::PARAM_INT);
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
                    $query = $this->con->prepare('SELECT * FROM pacientes WHERE id = ?');
                    $query->bindParam(1, $this->id, PDO::PARAM_INT);
                    $query->execute();
        			$this->con->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{

                    $query = $this->con->prepare('SELECT * FROM pacientes');
        			$query->execute();
        			$this->con->close();

        			return $query->fetchAll(PDO::FETCH_OBJ);
                }
    		}
            catch(PDOException $eype54){
    	        echo  $eype54->getMessage();
    	    }
    	}

        public function deleteProductAppointment(){
            try{
                $query = $this->con->prepare('DELETE FROM cita_producto p WHERE p.id_de_la_cita = (SELECT id FROM citas WHERE id_del_paciente = ?)');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return true;
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function deleteAppointment(){
            try{
                $query = $this->con->prepare('DELETE FROM citas app WHERE app.id_del_paciente = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return true;
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function delete(){
            try{
                $query = $this->con->prepare('DELETE FROM pacientes WHERE id = ?');
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
             return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'];
        }
        public function checkPatient($cbjb1) {
            if( ! $cbjb1 ) {
                header("Location:" . Patient::baseurl() . "/indexConsultorio.php");
            }
        }
    }
?>