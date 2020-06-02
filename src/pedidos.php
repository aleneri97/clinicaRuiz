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
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ml-4 mt-3 bg-light">
        <a class="navbar-brand" href="dashboard.php">Farmacias Ruiz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="venta.php"> Punto de Venta
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ordenes.php">Órdenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clientes.php">Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Comprar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Pedidos</a>
                        <span class="sr-only">(current)</span>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row text-light">
            <div class="col-8 offset-2 mt-4 text-center">
                <h1>Pedidos</h1>
            </div>
        </div>
        <div class="row text-white-50">
            <div class="col-10 offset-1">
                <p class="text-center ">Los pedidos pendientes de para reabastecer nuestro inventario.</p>
            </div>
        </div>
    </div>
    <div class="table-responsive text-center">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha y hora</th>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>Importe total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('database.php');
                $cefa46 = Database::connect();
                $ymfr31 = "SELECT po.id as 'purchase_id', po.date_time as 'date_time', po.proveedor as 'puchase_supplier', p.nombre as 'product_name', pop.cuantos as 'product_quantity', (pop.cuantos*p.precio) as 'purchase_total_amount' FROM orden_compra po LEFT JOIN orden_compra_producto pop ON po.id = pop.orden_compra LEFT JOIN producto p ON pop.producto = p.id ORDER BY po.id";
                foreach ($cefa46->query($ymfr31) as $grfx23) {
                    echo '<tr>';
                    echo '<td>' . $grfx23['purchase_id'] . '</td>';
                    echo '<td>' . $grfx23['date_time'] . '</td>';
                    echo '<td>' . $grfx23['puchase_supplier'] . '</td>';
                    echo '</tr>';
                }
                Database::disconnect();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>