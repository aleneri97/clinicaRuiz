<?php     require_once "../../models/Cita.php";
	$ouyv0 = new Database;
	$lulf13 = new Appointment($ouyv0);
	$dsdx14 = filter_input(INPUT_GET, 'appointment', FILTER_VALIDATE_INT);
	if( $dsdx14 ){
		$lulf13->setId($dsdx14);
		$lulf13->deleteProductAppointment();
		$lulf13->delete();
	}
	header("Location:" . Appointment::baseurl() . "/indexConsultorio.php");
?>