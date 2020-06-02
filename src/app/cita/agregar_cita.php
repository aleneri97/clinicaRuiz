<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agregar Cita</title>
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
          <div class="intro-heading text-uppercase" style="color: #ffc107">Agregar Cita</div>
        </div>
      </div>
    </header>
    <section><center>
        <?php             require_once "../../models/Cita.php";
            require_once "../../models/TipoDeCita.php";
            require_once "../../models/Paciente.php";
            require_once "../../models/Doctor.php";
        ?>
        <div class="container">
            <div class="col-lg-12 text-center">
                <form action="<?php echo Appointment::baseurl() ?>/app/cita/guardar_cita.php" method="POST">
                    <div class="form-group text-center">
                        <h2 class="section-heading text-uppercase" for="date_time">Patient</h2>
                        <select style="width: 500px" class="text-center btn btn-primary" id="id_del_paciente" name="id_del_paciente">
                        <option value="" selected disabled hidden>Choose a patient</option>
                        <?php                             $ouyv0 = new Database;
                            $cbjb1 = new Patient($ouyv0);
                            $phbv2 = $cbjb1->get();    
                        ?>    
                        <?php 
                            foreach( $phbv2 as $fuhz3 )
                            {
                                echo "<option value='" . $fuhz3->id . "'>" . $fuhz3->nombre . " " . $fuhz3->apellido . "</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase"  for="date_time">Dia y Hora</h2>
                        <input type="datetime-local" style="width: 500px" class="text-center btn btn-primary" name="date_time" id="date_time">
                    </div>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase" for="appointment_type">Tipo De Cita</h2>
                        <?php                             $ouyv0 = new Database;
                            $zsfc7 = new AppointmentType($ouyv0);
                            $qiwk8 = $zsfc7->get();  
                        ?>
                        <select style="width: 500px" class="text-center btn btn-primary" id="id_de_la_cita" name="id_de_la_cita">
                        <option value="" selected disabled hidden>Selecciona un tipo de cita</option>
                        <?php                            foreach( $qiwk8 as $zsfc7 )
                            {
                               echo "<option value='" . $zsfc7->id . "'>" . $zsfc7->description . " ($" . $zsfc7->precio . ") </option>";
                            } 
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase" for="dentist">Doctor</h2>
                        <?php                             $ouyv0 = new Database;
                            $drel11 = new Dentist($ouyv0);
                            $uqtz12 = $drel11->get();    
                        ?>
                        <select style="width: 500px" class="text-center btn btn-primary" id="id_del_doctor" name="id_del_doctor">
                        <option value="" selected disabled hidden>Choose a dentist</option>
                            <?php                                 foreach( $uqtz12 as $drel11 )
                                {
                                    echo "<option value='" . $drel11->id . "'>Dr(a). " . $drel11->nombre . " " . $drel11->apellido . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Save appointment" />
                    </div>
                </form>
            </div>
        </div>
    </section></center>
</body>
</html>