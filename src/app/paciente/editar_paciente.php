<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Editar Paciente</title>
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
          <div class="intro-heading text-uppercase" style="color: #ffc107">Editar Paciente</div>
        </div>
      </div>
    </header>
    <?php         require_once "../../models/Paciente.php";
        $dsdx14 = filter_input(INPUT_GET, 'patient', FILTER_VALIDATE_INT);
        if( ! $dsdx14 ){
            header("Location:" . Patient::baseurl() . "/indexConsultorio.php");
        }
        $ouyv0 = new Database;
        $hbvx34 = new Patient($ouyv0);
        $hbvx34->setId($dsdx14);
        $cbjb1 = $hbvx34->get();
        $hbvx34->checkPatient($cbjb1);
    ?>
    <section>
        <div class="container">
            <div class="col-lg-12">
                <form action="<?php echo Patient::baseurl() ?>/app/paciente/actualizar_paciente.php" method="POST">
                    <center>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase" for="firstname">Nombre</h2>
                        <input type="text" style="width: 500px" name="firstname" value="<?php echo $cbjb1->nombre ?>" class="form-control text-center" id="firstname" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase" for="lastname">Apellido</h2>
                        <input type="text" style="width: 500px" name="lastname" value="<?php echo $cbjb1->apellido ?>" class="form-control text-center" id="lastname" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase" for="fecha_de_nacimiento">Fecha de nacimiento</h2>
                        <input type="date" style="width: 500px" name="fecha_de_nacimiento" value="<?php echo $cbjb1->fecha_de_nacimiento ?>" class="form-control text-center" id="fecha_de_nacimiento" placeholder="Birthdate">
                    </div>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase" for="correo_electronico">Correo Electronico</h2>
                        <input type="text" style="width: 500px" name="correo_electronico" value="<?php echo $cbjb1->correo_electronico ?>" class="form-control text-center" id="correo_electronico" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase" for="telefono">Telefono</h2>
                        <input type="text" style="width: 500px" name="telefono" value="<?php echo $cbjb1->telefono ?>" class="form-control text-center" id="telefono" placeholder="Cellphone">
                    </div>
                    <div class="form-group">
                        <h2 class="section-heading text-uppercase" for="createdAt">Creado el</h2>
                        <input type="text" style="width: 500px" name="createdAt" value="<?php echo $cbjb1->created_at ?>" class="form-control text-center" id="createdAt" placeholder="createdAt">
                    </div>
                    <input type="hidden" name="id" value="<?php echo $cbjb1->id ?>" />
                    <input type="submit" name="submit" class="btn btn-primary" value="UPDATE PATIENT" />
                    </center>
                </form>
            </div>
        </div>
    </section>
</body>
</html>