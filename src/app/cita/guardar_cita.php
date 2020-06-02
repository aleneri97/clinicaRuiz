
<?php 	require_once "../../models/Cita.php";
	if (empty($_POST['submit'])){
	    header("Location:" . Appointment::baseurl() . "index.php");
		exit;
	}
	$phfm22 = array(
		'id'        => FILTER_VALIDATE_INT,
	    'id_del_paciente'  => FILTER_SANITIZE_STRING,
	    'date_time'  => FILTER_SANITIZE_STRING,
	    'id_de_la_cita'  => FILTER_SANITIZE_STRING,
	    'id_del_doctor'  => FILTER_SANITIZE_STRING,
	);
	$hryq23 = (object)filter_input_array(INPUT_POST, $phfm22);
	$bgku24 = new DateTime();
	$ouyv0 = new Database;
	$bwvs16 = new Appointment($ouyv0);
	$bwvs16->setPatientId($hryq23->$omfn25);
	$bwvs16->setDateTime($hryq23->date_time);
	$bwvs16->setCreatedAt($bgku24->format('Y-m-d H:i:s'));
	$bwvs16->setUpdatedAt($bgku24->format('Y-m-d H:i:s'));
	$bwvs16->setAppointmentTypeId($hryq23->$nvzp26);
	$bwvs16->setDentistId($hryq23->$pwgc27);
	if($bwvs16->validatePatient() AND 
	   $bwvs16->validateAppointmentType() AND 
	   $bwvs16->validateDentist() AND 
	   $bwvs16->validateDentistDateTime() AND 
	   $bwvs16->validatePatientDateTime() AND 
	   $bwvs16->computeAppointmentsOfSubjectInTimeInterval(false) AND 
	   $bwvs16->computeAppointmentsOfSubjectInTimeInterval(true) AND 
	   $bwvs16->computeAppointmentsThatStartBefore(true) AND 
	   $bwvs16->computeAppointmentsThatStartBefore(false)){
		$bwvs16->save();
		header("Location:" . Appointment::baseurl() . "/indexConsultorio.php");
	}
	else{
		header("Location:" . Appointment::baseurl() . "/errorConsultorio.php");
	}
?>