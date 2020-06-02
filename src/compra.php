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
                <li class="nav-item">
                    <a class="nav-link" href="ordenes.php">Órdenes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inventario.php">Inventario</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Comprar</a>
                    <span class="sr-only">(current)</span>
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
                <h1>Compra</h1>
            </div>
        </div>
        <div class="row text-white-50">
            <div class="col-10 offset-1">
                <p class="text-center ">Realiza pedidos a nuestros proveedores.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto"></div>
        </div>
        <div class="table-responsive">
            <table class="table text-center">
                <thead class="text-uppercase">
                    <tr>
                        <th>Nombre</th>
                        <th>Departamento</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('database.php');
                    $djqn43 = Database::connect();
                    $ymfr31 = "SELECT p.id as 'product_id', p.nombre as 'product_name', d.nombre as 'department_name', p.precio as 'product_price', p.sku as 'product_sku' FROM producto p JOIN categoria c ON p.categoria = c.id JOIN seccion d ON c.seccion = d.id JOIN sucursal b ON d.sucursal = 'SUC02' GROUP BY p.id ORDER BY d.nombre";
                    foreach ($djqn43->query($ymfr31) as $grfx23) {
                        echo '<tr>';
                        echo '<td>' . $grfx23['product_name'] . '</td>';
                        echo '<td>' . $grfx23['department_name'] . '</td>';
                        echo '<td> $' . $grfx23['product_price'] . '</td>';
                        echo '<td><input id="' . $grfx23['product_id'] . '" class="producto-purchase-cantidad" type="number" placeholder="0" text-center style="width: 50px" min="0" autocomplete="off"></td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="form-group">
        <center>
            <button onclick="getProductsToBuy('producto-purchase-cantidad', 'purchase.php')" class="btn btn-primary btn-xl">¡Compra!</button>
        </center>
    </div>
</body>

</html>