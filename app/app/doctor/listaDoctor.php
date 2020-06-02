<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listado de usuarios</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <?php             require_once "../../models/Doctor.php";
            $ouyv0 = new Database;
            $drel11 = new Dentist($ouyv0);
            $uqtz12 = $drel11->get();        
        ?>
        <div class="container">
            <div class="col-lg-12">
                <h2 class="text-center text-primary">Nuestros Doctores</h2>
                <?php                 if( ! empty( $uqtz12 ) ) {
                ?>
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Correo Electronico</th>
                        <th>Fecha de nacimiento</th>
                        <th>Desde</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php foreach( $uqtz12 as $drel11 )
                    {
                    ?>
                        <tr>
                            <td><?php echo $drel11->id ?></td>
                            <td><?php echo $drel11->nombre ?></td>
                            <td><?php echo $drel11->apellido ?></td>
                            <td><?php echo $drel11->telefono ?></td>
                            <td><?php echo $drel11->correo_electronico ?></td>
                            <td><?php echo $drel11->fecha_de_nacimiento ?></td>
                            <td><?php echo $drel11->fecha_de_inicio ?></td>
                            <td><?php echo $drel11->estado ?></td>
                            <td>
                                <a class="btn btn-info" href="<?php echo Dentist::baseurl() ?>app/editarDoctor.php?doctor=<?php echo $drel11->id ?>">Editar</a> 
                            </td>
                            <td>
                                <a class="btn btn-info" href="<?php echo Dentist::baseurl() ?>app/eliminarDoctor.php?doctor=<?php echo $drel11->id ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php                     }
                    ?>
                </table>
                <?php                 }
                else
                {
                ?>
                <div class="alert alert-danger" style="margin-top: 100px">No hay doctores registrados</div>
                <?php                 }
                ?>
            </div>
        </div>
    </body>
</html>
