<?php 
    require_once "../../models/Paciente.php";
	$ouyv0 = new Database;
	$lulf13 = new Patient($ouyv0);
	$dsdx14 = filter_input(INPUT_GET, 'patient', FILTER_VALIDATE_INT);
	if( $dsdx14 ){
		$lulf13->setId($dsdx14);
		$lulf13->deleteProductAppointment();
		$lulf13->deleteAppointment();
		$lulf13->delete();
	}
	header("Location:" . Patient::baseurl() . "/indexConsultorio.php");
?>