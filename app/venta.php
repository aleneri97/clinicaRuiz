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
    <script src="js/sale-min.js"></script>
    <script src="js/freelancer-min.js"></script>
    <title>Farmacias Ruiz</title>
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
                <li class="nav-item active">
                    <a class="nav-link" href="#"> Punto de Venta</a>
                    <span class="sr-only">(current)</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ordenes.php">Órdenes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inventario.php">Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="compra.php">Comprar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pedidos.php">Pedidos</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- <section class="comprar" id="comprar"> -->
    <div class="container">
        <div class="row text-light">
            <div class="col-8 offset-2 mt-4 text-center">
                <h1>Punto de Venta</h1>
            </div>
        </div>
        <div class="row text-white-50">
            <div class="col-10 offset-1">
                <p class="text-center ">Selecciona la cantidad (por categoría) de cada producto y haz click en  'Realizar Compra', para continuar.</p>
            </div>
        </div>
        <div class="categoria-form text-center col-10 offset-1 mt-5">
            <form action="#" method="post">
                <div class="row">
                    <div class="col col-4 offset-3">
                        <select class="text-center form-control " name="categoria">
                            <option value="null" disabled selected>Seleccione una categoría</option>
                            <?php        
                                
                                require_once('database.php');
                                $iter29 = Database::connect();
                                $ymfr31 = "SELECT categoria.nombre as 'category_name', categoria.id as 'category_id' FROM categoria INNER JOIN seccion ON categoria.seccion = seccion.id WHERE seccion.sucursal = 'SUC02'";
                                foreach ($iter29->query($ymfr31) as $grfx23){
                                    $selected = "";
                                    if (isset($_POST['categoria'])) 
                                        if ($grfx23['category_id'] == $_POST['categoria']) 
                                            $selected = "selected";
                                    echo '<option value='. $grfx23['category_id'] .' '. $selected .'>'. $grfx23['category_name'] . '</option>';
                                }
                                Database::disconnect();
                            ?>
                        </select>
                    </div>
                    <div class="col col-1 ml-0 pl-0">
                        <input type="submit" name="submit" value="Ver" / class="btn btn-primary" href="comprar">
                    </div>
                </div>
            </form>
        </div>

        <div class="row mt-5">
            <table class="table table-striped">
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
                        if(isset($_POST['submit'])){
                            $tard38 = $_POST['categoria'];
                            require_once('database.php');
                            $xthv39 = Database::connect();
                            $pavz40 = "CALL GetCategoriaProducto('" . $tard38 ."')";
                            foreach ($xthv39->query($pavz40) as $grfx23){
                                $qygt41 = "SELECT p.id as 'product_id', p.nombre as 'product_name', d.nombre as 'department_name', p.precio as 'product_price', p.sku as 'product_sku' FROM producto p JOIN categoria c ON p.categoria = c.id JOIN seccion d ON c.seccion = d.id JOIN sucursal b ON d.sucursal = 'SUC02' WHERE p.id = '" . $grfx23['id'] . "' GROUP BY p.id";
                                $bepk42 = $xthv39->prepare($qygt41);
                                $bepk42->execute();
                                // echo $grfx23['id'];
                                while($fwat24 = $bepk42->fetch(PDO::FETCH_ASSOC)) {
                                    // echo $grfx23['id'];
                                    echo '<tr>';
                                    echo '<td>' . $fwat24['product_name'] . '</td>';
                                    echo '<td>' . $fwat24['department_name'] . '</td>';
                                    echo '<td> $' . $fwat24['product_price'] . '</td>';
                                    echo '<td><input id="' . $fwat24['product_id'] . '" class="producto-rebaja-cantidad" type="number" placeholder="0" text-center style="width: 50px" min="0" autocomplete="off"></td>';
                                    echo '</tr>';
                                }
                            } 
                            Database::disconnect();
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row text-center">
                <button onclick="getProductsToBuy('producto-rebaja-cantidad', 'buy.php')"
                    class="btn btn-primary btn-xl">Realizar Compra</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>