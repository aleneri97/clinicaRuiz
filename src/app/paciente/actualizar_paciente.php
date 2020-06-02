<?php 	require_once "../../models/Paciente.php";
	if (empty($_POST['submit'])){
	      header("Location:" . Patient::baseurl() . "/indexConsultorio.php");
	      exit;
	}
	$phfm22 = array(
	    'id'        => FILTER_VALIDATE_INT,
	    'firstname'  => FILTER_SANITIZE_STRING,
	    'lastname'  => FILTER_SANITIZE_STRING,
	    'fecha_de_nacimiento'  => FILTER_SANITIZE_STRING,
	    'correo_electronico'  => FILTER_SANITIZE_STRING,
	    'telefono'  => FILTER_VALIDATE_INT,
	    'createdAt' => FILTER_SANITIZE_STRING,
	);
	$hryq23 = (object)filter_input_array(INPUT_POST, $phfm22);
	var_dump($hryq23->id);
	if( $hryq23->id === false ){
	    header("Location:" . Patient::baseurl() . "index.php");
	}
	$ouyv0 = new Database;
	$cbjb1 = new Patient($ouyv0);
	$cbjb1->setId($hryq23->id);
	$cbjb1->setFirstName($hryq23->$opdz36);
	$cbjb1->setLastName($hryq23->$pinr37);
	$cbjb1->setBirthdate($hryq23->fecha_de_nacimiento);
	$cbjb1->setEmail($hryq23->correo_electronico);
	$cbjb1->setCellphone($hryq23->telefono);
	$cbjb1->setCreatedAt($hryq23->createdAt);
	$cbjb1->update();
?>
<script type="text/javascript">
	window.location="../../indexConsultorio.php";
</script>