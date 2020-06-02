<?php     require_once($_SERVER['DOCUMENT_ROOT'] . "/db/Database.php");
    require_once($_SERVER['DOCUMENT_ROOT'] . "/interfaces/ICita.php");
    class Appointment implements IAppointment {
    	private $ijef57;
        private $dsdx14;
        private $vxmg58;
        private $rjiw59;
        private $lefp60;
        private $sxix61;
        private $mfdb62;
        private $rldb63;
        private $tazv64;
    	public function __construct(Database $ouyv0){
    		$this->con = new $ouyv0;
    	}
        public function setId($dsdx14){
            $this->id = $dsdx14;
        }
        public function setPatientId($vxmg58){
            $this->patientId = $vxmg58;
        }
        public function setDentistId($tazv64){
            $this->dentistId = $tazv64;
        }
        public function setMustBeRescheduled($rjiw59){
            $this->mustBeRescheduled = $rjiw59;
        }
        public function setDateTime($lefp60){
            $this->dateTime = $lefp60;
        }
        public function setCreatedAt($sxix61){
            $this->createdAt = $sxix61;
        }
        public function setUpdatedAt($mfdb62){
            $this->updatedAt = $mfdb62;
        }
        public function setAppointmentTypeId($rldb63){
            $this->appointmentTypeId = $rldb63;
        }
    	public function save() {
    		try{
                $query = $this->con->prepare('INSERT INTO citas VALUES(DEFAULT, ?,?,?,?,?,?,?)');
                $query->bindParam(1, $this->patientId, PDO::PARAM_STR);
                $query->bindParam(2, $this->mustBeRescheduled, PDO::PARAM_STR);
                $query->bindParam(3, $this->dateTime, PDO::PARAM_STR);
                $query->bindParam(4, $this->createdAt, PDO::PARAM_STR);
                $query->bindParam(5, $this->updatedAt, PDO::PARAM_STR);
                $query->bindParam(6, $this->appointmentTypeId, PDO::PARAM_STR);
                $query->bindParam(7, $this->dentistId, PDO::PARAM_STR);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $eype54) {
    	        echo  $eype54->getMessage();
    	    }
    	}
        public function update(){
    		try{
    			$query = $this->con->prepare('UPDATE citas SET id_del_paciente = ?, reagendar = ?, date_time = ?, created_at = ?, updated_at = ?, tipo_de_cita_id = ?, id_del_doctor = ? WHERE id = ?');
                $query->bindParam(1, $this->patientId, PDO::PARAM_STR);
                $query->bindParam(2, $this->mustBeRescheduled, PDO::PARAM_STR);
                $query->bindParam(3, $this->dateTime, PDO::PARAM_STR);
                $query->bindParam(4, $this->createdAt, PDO::PARAM_STR);
                $query->bindParam(5, $this->updatedAt, PDO::PARAM_STR);
                $query->bindParam(6, $this->appointmentTypeId, PDO::PARAM_STR);
                $query->bindParam(7, $this->dentistId, PDO::PARAM_STR);
                $query->bindParam(8, $this->id, PDO::PARAM_INT);
    			$query->execute();
    			$this->con->close();
    		}
            catch(PDOException $eype54){
    	        echo  $eype54->getMessage();
    	    }
    	}
        public function getPatientNames(){
            try{
                $query = $this->con->prepare('SELECT id AS p_id, nombre AS p_firstname, apellido AS p_lastname FROM pacientes');
                $query->execute();
                $this->con->close();
                
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function getAppointmentNames(){
            try{
                $query = $this->con->prepare('SELECT id AS app_id, description AS app_name FROM tipo_de_cita');
                $query->execute();
                $this->con->close();
                
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function getDentistNames(){
            try{
                $query = $this->con->prepare('SELECT id AS d_id, nombre AS d_firstname, apellido AS d_lastname FROM doctores');
                $query->execute();
                $this->con->close();
                
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
    	public function get(){
    		try{
                if(is_int($this->id)){
                    
                    $query = $this->con->prepare('SELECT app.id AS id, app.date_time AS date_time, p.id AS p_id, p.nombre AS p_firstname, p.apellido AS p_lastname, appt.id AS appt_id, appt.description AS description, d.nombre AS d_firstname, d.id AS d_id, d.apellido AS d_lastname, app.reagendar AS reagendar FROM citas app, pacientes p, tipo_de_cita appt, doctores d WHERE app.id_del_paciente = p.id AND app.tipo_de_cita_id = appt.id AND app.id_del_doctor = d.id AND app.id = ?');
                    $query->bindParam(1, $this->id, PDO::PARAM_INT);
                    $query->execute();
        			$this->con->close();
        			return $query->fetch(PDO::FETCH_OBJ);
                }
                else{
                    
                    $query = $this->con->prepare('SELECT p.id AS p_id, app.id AS id, p.nombre AS p_firstname, appt.id AS appt_id, p.apellido AS p_lastname, app.date_time AS date_time, appt.description AS description, d.nombre AS d_firstname, d.id AS d_id, d.apellido AS d_lastname, app.reagendar AS reagendar from pacientes p, citas app, tipo_de_cita appt, doctores d WHERE p.id = app.id_del_paciente AND appt.id = app.tipo_de_cita_id AND d.id = app.id_del_doctor');
        			$query->execute();
        			$this->con->close();
                    
        			return $query->fetchAll(PDO::FETCH_OBJ);
                }
    		}
            catch(PDOException $eype54){
    	        echo  $eype54->getMessage();
    	    }
        }
    	public function getTodaysAppointments(){
    		try{
                $query = $this->con->prepare('SELECT * FROM getCitasDeHoy()');
                $query->execute();
                $this->con->close();
                
                return $query->fetchAll(PDO::FETCH_OBJ);
    		}
            catch(PDOException $eype54){
    	        echo  $eype54->getMessage();
    	    }
        }
        public function getPastAppointments(){
            try{
                $query = $this->con->prepare('SELECT * FROM getCitasAnteriores()');
                $query->execute();
                $this->con->close();
                
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function getFutureAppointments(){
            try{
                $query = $this->con->prepare('SELECT * FROM getCitasAFuturo()');
                $query->execute();
                $this->con->close();
                
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
    	public function getAppointmentsInDateRange($pujo73, $gywh74){
    		try{     
                $bpkf75 = new DateTime();
                $ztcw55 = $bpkf75->createFromFormat('d/m/Y', $pujo73);
                $wnvx76 = new DateTime();
                $colb56 = $wnvx76->createFromFormat('d/m/Y', $gywh74);
                $rdge77 = "SELECT a.id, a.reagendar, a.date_time, p.nombre AS patient_first_name, p.apellido AS patient_last_name, at.description, d.nombre AS dentist_first_name, d.apellido AS dentist_last_name FROM citas a JOIN pacientes p ON p.id = a.id_del_paciente JOIN tipo_de_cita at ON a.tipo_de_cita_id = at.id JOIN doctores d ON d.id = a.id_del_doctor WHERE date_time::date >= $ztcw55 AND date_time::date <= $colb56";
                $query = $this->con->prepare($rdge77);
                $query->execute();
                $this->con->close();
                return $query->fetchAll(PDO::FETCH_OBJ);
    		}
            catch(PDOException $eype54){
    	        echo  $eype54->getMessage();
    	    }
    	}
        public function deleteProductAppointment(){
            try{
                $query = $this->con->prepare('DELETE FROM cita_producto WHERE id_de_la_cita = ?');
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
                $query = $this->con->prepare('DELETE FROM citas WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
                $this->con->close();
                return true;
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function validatePatient(){
            try{
                $query = $this->con->prepare('SELECT id FROM pacientes WHERE id = ?');
                $query->bindParam(1, $this->patientId, PDO::PARAM_INT);
                $query->execute();
                $fvvi78 = $query->rowCount();

                $this->con->close();

                if($fvvi78 == 0){
                    return false;
                }
                else {
                    return true;
                }
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function validateAppointmentType(){
            try{
                $query = $this->con->prepare('SELECT id FROM tipo_de_cita WHERE id = ?');
                $query->bindParam(1, $this->appointmentTypeId, PDO::PARAM_INT);
                $query->execute();
                $fvvi78 = $query->rowCount();

                $this->con->close();

                if($fvvi78 == 0){
                    return false;
                }
                else {
                    return true;
                }                
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function validateDentist(){
            try{
                $query = $this->con->prepare('SELECT id FROM doctores WHERE id = ?');
                $query->bindParam(1, $this->dentistId, PDO::PARAM_INT);
                $query->execute();
                $fvvi78 = $query->rowCount();
                $this->con->close();
                if($fvvi78 == 0){
                    return false;
                }
                else {
                    return true;
                }
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function validatePatientDateTime(){
            try{
                $query = $this->con->prepare('SELECT date_time FROM citas WHERE citas.date_time = ? AND citas.id_del_paciente = ?');
                $query->bindParam(1, $this->dateTime, PDO::PARAM_STR);
                $query->bindParam(2, $this->patientId, PDO::PARAM_INT);
                $query->execute();
                $fvvi78 = $query->rowCount();
                $this->con->close();
                if($fvvi78 == 0){
                    return true;
                }
                else {
                    return false;
                }
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public function computeAppointmentsThatStartBefore($xyqn79){
            if($xyqn79){
                $ecfc80 = $this->con->prepare('SELECT * FROM getFinCita(?, ?) WHERE end_time::date <= ?::date');
                $ecfc80->bindParam(1, $this->dateTime, PDO::PARAM_STR);
                $ecfc80->bindParam(2, $this->patientId, PDO::PARAM_INT);
                $ecfc80->bindParam(3, $this->dateTime, PDO::PARAM_STR);
                $ecfc80->execute();
                $wflf81 = $ecfc80->rowCount();
                $this->con->close();
                if($wflf81 == 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else {
                $ecfc80 = $this->con->prepare('SELECT * FROM getFinCitaDoctor(?, ?) WHERE end_time::date <= ?::date');
                $ecfc80->bindParam(1, $this->dateTime, PDO::PARAM_STR);
                $ecfc80->bindParam(2, $this->dentistId, PDO::PARAM_INT);
                $ecfc80->bindParam(3, $this->dateTime, PDO::PARAM_STR);
                $ecfc80->execute();
                $wflf81 = $ecfc80->rowCount();
                $this->con->close();
                if($wflf81 == 0){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        public function computeAppointmentsOfSubjectInTimeInterval($xyqn79){
            if($xyqn79){
                $dbxo82 = $this->con->prepare('SELECT * FROM getFinCita(?, ?) WHERE end_time > ?');
                $dbxo82->bindParam(1, $this->dateTime, PDO::PARAM_STR);
                $dbxo82->bindParam(2, $this->patientId, PDO::PARAM_INT);
                $dbxo82->bindParam(3, $this->dateTime, PDO::PARAM_STR);
                $dbxo82->execute();
                $wflf81 = $dbxo82->rowCount();
                $this->con->close();
                if($wflf81 == 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{ 
                $ecfc80 = $this->con->prepare('SELECT * FROM getFinCitaDoctor(?, ?) WHERE end_time > ?');
                $ecfc80->bindParam(1, $this->dateTime, PDO::PARAM_STR);
                $ecfc80->bindParam(2, $this->dentistId, PDO::PARAM_INT);
                $ecfc80->bindParam(3, $this->dateTime, PDO::PARAM_STR);
                $ecfc80->execute();
                $fvvi78 = $ecfc80->rowCount();
                $this->con->close();
                if($fvvi78 == 0){
                    return true;
                }
                else{
                    return false;
                }
        }
    }
        public function validateDentistDateTime(){
            try{
                $query = $this->con->prepare('SELECT date_time FROM citas WHERE citas.date_time = ? AND citas.id_del_doctor = ?');
                $query->bindParam(1, $this->dateTime, PDO::PARAM_STR);
                $query->bindParam(2, $this->dentistId, PDO::PARAM_INT);
                $query->execute();
                $fvvi78 = $query->rowCount();
                $this->con->close();
                if($fvvi78 == 0){
                    return true;
                }
                else {
                    return false;
                }
            }
            catch(PDOException $eype54){
                echo  $eype54->getMessage();
            }
        }
        public static function baseurl() {
            return stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://' . $_SERVER['HTTP_HOST'];
        }
        public function checkAppointment($bwvs16) {
            if( ! $bwvs16 ) {
                header("Location:" . Appointment::baseurl() . "/indexConsultorio.php");
            }
        }
    }
?>