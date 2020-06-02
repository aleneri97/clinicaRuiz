<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Editar Cita</title>
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="../../css/agency.min.css" rel="stylesheet">
</head>
<body>
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-heading text-uppercase" style="color: #ffc107">Editar Cita</div>
        </div>
      </div>
    </header>
    <section>
        <?php         require_once "../../models/Cita.php";
        require_once "../../models/TipoDeCita.php";
        require_once "../../models/Paciente.php";
        require_once "../../models/Doctor.php";
        $dsdx14 = filter_input(INPUT_GET, 'appointment', FILTER_VALIDATE_INT);
        if( ! $dsdx14 ){
            header("Location:" . Appointment::baseurl() . "/indexConsultorio.php");
        }
        $ouyv0 = new Database;
        $pmgi15 = new Appointment($ouyv0);
        $pmgi15->setId($dsdx14);
        $bwvs16 = $pmgi15->get();
        ?>
        <div class="container">
            <div class="col-lg-12">
                <form action="<?php echo Appointment::baseurl() ?>/app/cita/actualizar_cita.php" method="POST">
                    <center>
                        <div class="form-group">
                            <h1 style="color: #ffc107" class="text-uppercase"><?php echo $bwvs16->d_firstname . " " .  $bwvs16->d_lastname?></h1>
                            <input type="hidden" name="id_del_paciente" id="id_del_paciente" value="<?php echo $bwvs16->$ebbr19 ?>" />
                        </div>
                        <div class="form-group">
                            <h4 class="section-heading text-uppercase" for="date_time">Dia y Hora</h4>
                            <?php                                 $ffgk20 = new DateTime($bwvs16->date_time);
                            ?>
                            <input type="datetime-local" style="width: 500px" class="text-center btn btn-primary" name="date_time" id="date_time" value="<?php echo $ffgk20->format('Y-m-d H:i:s'); ?>">
                        </div>
                        <div class="form-group">
                            <h4 class="section-heading text-uppercase" for="id_de_la_cita">Tipo De Cita</h4>
                            <?php                                 $ouyv0 = new Database;
                                $zsfc7 = new AppointmentType($ouyv0);
                                $qiwk8 = $zsfc7->get();  
                            ?>
                            <select style="width: 500px" class="text-center btn btn-primary" id="id_de_la_cita" name="id_de_la_cita">
                                <?php                                     foreach( $qiwk8 as $zsfc7 )
                                    {
                                        echo "<option value='" . $zsfc7->id . "'>" . $zsfc7->description . " ($" . $zsfc7->precio . ") </option>";
                                    } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h4 class="section-heading text-uppercase" for="dentist">Doctor</h4>
                            <?php                                 $ouyv0 = new Database;
                                $drel11 = new Dentist($ouyv0);
                                $uqtz12 = $drel11->get();    
                            ?>
                            <select style="width: 500px" class="text-center btn btn-primary" id="id_del_doctor" name="id_del_doctor">
                                <?php                                     foreach( $uqtz12 as $drel11 )
                                    {
                                        echo "<option value='" . $drel11->id . "'>Dr(a). " . $drel11->nombre . " " . $drel11->apellido . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                        <h4 class="section-heading text-uppercase"  for="date_time">Reagendar</h4>
                        <select style="width: 500px" class="text-center btn btn-primary" id="reagendar" name="reagendar">
                            <option value="true">Yes</option>
                            <option selected value="false">No</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $bwvs16->id ?>" />
                    <input type="submit" name="submit" class="btn btn-primary" value="UPDATE APPOINTMENT"/>
                    </center>
                </form>
            </div>
        </div>
    </section>
</body>
</html>