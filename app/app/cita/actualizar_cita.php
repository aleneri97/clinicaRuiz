<?php 	require_once "../../models/Cita.php";
	if (empty($_POST['submit'])){
	      header("Location:" . Appointment::baseurl() . "/indexConsultorio.php");
	      exit;
	}
	$phfm22 = array(
	    'id'        => FILTER_VALIDATE_INT,
	    'date_time' => FILTER_SANITIZE_STRING,
	    'id_del_paciente'  => FILTER_VALIDATE_INT,
	    'id_de_la_cita' => FILTER_VALIDATE_INT,
	    'id_del_doctor' => FILTER_VALIDATE_INT,
	    'reagendar' => FILTER_SANITIZE_STRING,
	);
	$hryq23 = (object)filter_input_array(INPUT_POST, $phfm22);
	if( $hryq23->id === false ){
	    header("Location:" . Appointment::baseurl() . "index.php");
	}
	$ouyv0 = new Database;
	$bgku24 = new DateTime();
	$bwvs16 = new Appointment($ouyv0);
	$bwvs16->setId($hryq23->id);
	$bwvs16->setPatientId($hryq23->$omfn25);
	$bwvs16->setDentistId($hryq23->$pwgc27);
	$bwvs16->setMustBeRescheduled($hryq23->$ejug28);
	$bwvs16->setDateTime($hryq23->date_time);
	$bwvs16->setUpdatedAt($bgku24->format('Y-m-d H:i:s'));
	$bwvs16->setAppointmentTypeId($hryq23->$nvzp26);
	if($bwvs16->validatePatient() AND $bwvs16->validateAppointmentType() AND $bwvs16->validateDentist() AND $bwvs16->validateDentistDateTime() AND $bwvs16->validatePatientDateTime() AND $bwvs16->computeAppointmentsOfSubjectInTimeInterval(false) AND $bwvs16->computeAppointmentsOfSubjectInTimeInterval(true) AND $bwvs16->computeAppointmentsThatStartBefore(true) AND $bwvs16->computeAppointmentsThatStartBefore(false)){
		$bwvs16->update();
		header("Location:" . Appointment::baseurl() . "/indexConsultorio.phpultorio.php");
	}
	else{
		header("Location:" . Appointment::baseurl() . "/errorConsultorio.php");
	}
?>