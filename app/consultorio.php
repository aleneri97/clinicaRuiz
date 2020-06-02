<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Consultorio Ruiz</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="css/agency-min.css" rel="stylesheet">
    <script src="js/jqBootstrapValidation-min.js"></script>
    <script src="js/appointments_me.js"></script>
    <script src="js/agency-min.js"></script>

</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-marca js-scroll-trigger" href="#page-top">Consultorio Ruiz</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Tipos de Consulta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#doctores">Doctores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#pacientes">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#citas">Agenda tu cita</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Bienvenido a Consultorios Ruiz</div>
                <div class="intro-heading text-uppercase">Te Queremos Bien</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Conoce màs</a>
            </div>
        </div>
    </header>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Tipos de Consulta</h2>
                    <h3 class="section-subheading text-muted">Consultorio Ruiz es salud.</h3>
                </div>
            </div>
        </div>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . "/models/TipoDeCita.php";
        $ouyv0 = new Database;
        $zsfc7 = new AppointmentType($ouyv0);
        $qiwk8 = $zsfc7->get();
        ?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-center text-primary">Tipo de Cita</h2>
                <?php if (!empty($qiwk8)) {
                ?>
                    <table class="table text-centerd">
                        <tr>
                            <th>Descripcion</th>
                            <th>Duracion</th>
                            <th>Precio</th>
                        </tr>
                        <?php foreach ($qiwk8 as $zsfc7) {
                        ?>
                            <tr>
                                <td><?php echo $zsfc7->description ?></td>
                                <td><?php echo $zsfc7->minutos ?> minutos</td>
                                <td>$ <?php echo $zsfc7->precio ?></td>
                            </tr>
                        <?php             }
                        ?>
                    </table>
                <?php           } else {
                ?>
                    <div class="alert alert-danger" style="margin-top: 100px">No hay tipos de citas registrados</div>
                <?php           }
                ?>
            </div>
        </div>
    </section>
    <section class="bg-light" id="doctores">
        <?php
        require_once "./models/Doctor.php";
        $ouyv0 = new Database;
        $drel11 = new Dentist($ouyv0);
        $uqtz12 = $drel11->get();
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Doctores</h2>
                    <h3 class="section-subheading text-muted">Conoce a nuestros especialistas.</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="img/team/1.jpg" alt="">
                    <h4 style="color: #ffc107">Alam Lastra</h4>
                    <p class="text-muted">Medico Internista</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="img/team/2.jpg" alt="">
                    <h4 style="color: #ffc107">Manuel Neri</h4>
                    <p class="text-muted">Medico General</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="img/team/3.jpg" alt="">
                    <h4 style="color: #ffc107">Jesus Gonzalez</h4>
                    <p class="text-muted">Cirugia Plastica</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <?php if (!empty($uqtz12)) {
            ?>
                <table class="table text-center">
                    <tr>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Fecha de nacimiento</th>
                        <th>Desde</th>
                        <th>Estado</th>
                    </tr>
                    <?php foreach ($uqtz12 as $drel11) {
                    ?>
                        <tr>
                            <td><?php echo $drel11->nombre ?> <?php echo $drel11->apellido ?></td>
                            <td><?php echo $drel11->telefono ?></td>
                            <td><?php echo $drel11->correo_electronico ?></td>
                            <td><?php echo $drel11->fecha_de_nacimiento ?></td>
                            <td><?php echo $drel11->fecha_de_inicio ?></td>
                            <td><?php echo $drel11->estado == 1 ? "<font color='green'>Active</font>" : "<font color='red'>Deactivated</font>" ?></td>
                        </tr>
                    <?php           }
                    ?>
                </table>
            <?php         } else {
            ?>
                <div class="alert alert-danger" style="margin-top: 100px">NO hay doctores registrados</div>
            <?php         }
            ?>
        </div>
    </section>
    <section id="pacientes">
        <?php
        require_once "./models/Paciente.php";
        $ouyv0 = new Database;
        $cbjb1 = new Patient($ouyv0);
        $phbv2 = $cbjb1->get();
        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Pacientes</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <?php if (!empty($phbv2)) {
                ?>
                    <table class="table text-center">
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de nacimiento</th>
                            <th>Creado a las</th>
                            <th>Correo Electronico</th>
                            <th>Telefono</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php foreach ($phbv2 as $cbjb1) {
                        ?>
                            <tr>
                                <td><?php echo $cbjb1->nombre ?> <?php echo $cbjb1->apellido ?></td>
                                <td><?php echo $cbjb1->fecha_de_nacimiento ?></td>
                                <td><?php echo $cbjb1->created_at ?></td>
                                <td><?php echo $cbjb1->correo_electronico ?></td>
                                <td><?php echo $cbjb1->telefono ?></td>
                                <td>
                                    <a class="btn btn-primary" href="<?php echo Patient::baseurl() ?>/app/paciente/editar_paciente.php?paciente=<?php echo $cbjb1->id ?>">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="<?php echo Patient::baseurl() ?>/app/paciente/eliminar_paciente.php?paciente=<?php echo $cbjb1->id ?>">Delete</a>
                                </td>
                            </tr>
                        <?php             }
                        ?>
                    </table>
                <?php           } else {
                ?>
                    <div class="alert alert-danger" style="margin-top: 100px">No hay pacientes registrados</div>
                <?php           }
                ?>
            </div>
        </div>
        <div>
            <center>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?php echo Patient::baseurl() ?>/app/paciente/agregar_paciente.php">Add patient</a>
            </center>
        </div>
    </section>
    <section class="bg-light" id="citas">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Agenda tu cita</h2>
            <div class="container">
                <div class="col-lg-12">
                </div>
            </div>
            <h3 class="section-subheading text-muted">Aqui podras agregar tu cita.</h3>
        </div>
        <div class="container">
            <?php
            require_once "./models/Cita.php";
            $ouyv0 = new Database;
            $bwvs16 = new Appointment($ouyv0);
            $mxzv99 = $bwvs16->getPastAppointments();
            ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 style="color: #ffc107">Citas anteriores</h4>
                    <div class="container">
                        <div class="col-lg-12">
                            <?php if (!empty($mxzv99)) {
                            ?>
                                <table class="table text-center">
                                    <tr>
                                        <th>Dia y Hora</th>
                                        <th>Paciente</th>
                                        <th>Tipo de Cita</th>
                                        <th>Dcotor</th>
                                    </tr>
                                    <?php foreach ($mxzv99 as $obkb100) {
                                    ?>
                                        <tr>
                                            <td><?php echo $obkb100->date_time ?></td>
                                            <td><?php echo $obkb100->d_firstname . " " . $obkb100->d_lastname ?></td>
                                            <td><?php echo $obkb100->appt_description ?></td>
                                            <td><?php echo $obkb100->d_firstname . " " . $obkb100->d_lastname ?></td>
                                        </tr>
                                    <?php                   }
                                    ?>
                                </table>
                            <?php                 } else {
                            ?>
                                <div class="alert alert-danger" style="margin-top: 100px">No hay citas para hoy</div>
                            <?php                 }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <?php
            require_once "./models/Cita.php";
            $ouyv0 = new Database;
            $bwvs16 = new Appointment($ouyv0);
            $frkl102 = $bwvs16->getTodaysAppointments();
            ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 style="color: #ffc107">Citas para hoy</h4>
                    <div class="container">
                        <div class="col-lg-12">
                            <?php if (!empty($frkl102)) {
                            ?>
                                <table class="table text-center">
                                    <tr>
                                        <th>Date & Time</th>
                                        <th>Patient</th>
                                        <th>Appointment Type</th>
                                        <th>Dentist</th>
                                    </tr>
                                    <?php foreach ($frkl102 as $ciem103) {
                                    ?>
                                        <tr>
                                            <td><?php echo $ciem103->date_time ?></td>
                                            <td><?php echo $ciem103->d_firstname . " " . $ciem103->d_lastname ?></td>
                                            <td><?php echo $ciem103->appt_description ?></td>
                                            <td><?php echo $ciem103->d_firstname . " " . $ciem103->d_lastname ?></td>
                                        </tr>
                                    <?php                   }
                                    ?>
                                </table>
                            <?php                 } else {
                            ?>
                                <div class="alert alert-danger" style="margin-top: 100px">No hay citas para hoy</div>
                            <?php                 }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <?php
            require_once "./models/Cita.php";
            $ouyv0 = new Database;
            $bwvs16 = new Appointment($ouyv0);
            $nrqn104 = $bwvs16->getFutureAppointments();
            ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4 style="color: #ffc107">Future citas</h4>
                    <div class="container">
                        <div class="col-lg-12">
                            <?php if (!empty($nrqn104)) {
                            ?>
                                <table class="table text-center">
                                    <tr>
                                        <th>Dia y Hora</th>
                                        <th>Paciente</th>
                                        <th>Tipo De Cita</th>
                                        <th>Doctor</th>
                                        <th>Reagendar</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <?php foreach ($nrqn104 as $bwvs16) {
                                    ?>
                                        <tr>
                                            <td><?php echo $bwvs16->date_time ?></td>
                                            <td><?php echo $bwvs16->d_firstname . " " . $bwvs16->d_lastname ?></td>
                                            <td><?php echo $bwvs16->appt_description ?></td>
                                            <td><?php echo $bwvs16->d_firstname . " " . $bwvs16->d_lastname ?></td>
                                            <td><?php echo $bwvs16->app_rescheduled == 1 ? "<font color='red'>Yes</font>" : "<font color='green'>No</font>" ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="<?php echo Appointment::baseurl() ?>/app/cita/editar_cita.php?cita=<?php echo $bwvs16->id ?>">Edit</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="<?php echo Appointment::baseurl() ?>/app/cita/eliminar_cita.php?cita=<?php echo $bwvs16->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php                   }
                                    ?>
                                </table>
                            <?php                 } else {
                            ?>
                                <div class="alert alert-danger" style="margin-top: 100px">No hay citas proximas</div>
                            <?php                 }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <center>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?php echo Appointment::baseurl() ?>/app/cita/agregar_cita.php">Agregar Cita</a>
            </center>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright"> &copy; Alam Lastra & Manuel Neri</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item">
                            <a href="#"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>