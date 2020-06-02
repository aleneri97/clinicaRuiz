<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index-min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index-min.css">
    <script src="js/jqBootstrapValidation-min.js"></script>
    <script src="js/contact_me-min.js"></script>
    <script src="js/freelancer-min.js"></script>
    <script src="js/sale-min.js"></script>

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ml-4 mt-3 bg-light">
        <a class="navbar-brand" href="dashboard.php">Farmacias Ruiz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="venta.php"> Punto de Venta</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Órdenes</a>
                    <span class="sr-only">(current)</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inventario.php">Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comprar.php">Comprar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedidos.php">Pedidos</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row text-light">
            <div class="col-8 offset-2 mt-4 text-center">
                <h1>Órdenes</h1>
            </div>
        </div>
        <div class="row text-white-50">
            <div class="col-10 offset-1">
                <p class="text-center ">Órdenes de compras de nuestros clientes</p>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha y hora</th>
                    <th>Nombre del Cliente</th>
                    <th>Importe total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('database.php');
                $datb45 = Database::connect();
                $ymfr31 = "SELECT s.id as 'sale_id', s.date_time as 'date_time', c.nombre as 'customer_name', c.apellido as 'customer_lastname' , SUM(sp.cuantos*producto.precio) as 'cantidad_total_ventas' FROM rebaja_producto sp LEFT JOIN producto ON sp.producto = producto.id LEFT JOIN rebaja s ON sp.rebaja = s.id LEFT JOIN cliente c ON s.cliente = c.id GROUP BY sp.rebaja";
                foreach ($datb45->query($ymfr31) as $grfx23) {
                    echo '<tr>';
                    echo '<td>' . $grfx23['sale_id'] . '</td>';
                    echo '<td>' . $grfx23['date_time'] . '</td>';
                    echo '<td>' . $grfx23['customer_name'] . ' ' . $grfx23['customer_lastname'] . '</td>';
                    echo '<td> $' . $grfx23['cantidad_total_ventas'] . '</td>';
                    echo '</tr>';
                }
                Database::disconnect();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>