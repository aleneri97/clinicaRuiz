<?php
if ($_SESSION["wholeURLParameters"] == null) {
    $_SESSION["wholeURLParameters"] = $_SERVER['QUERY_STRING'];
}
if ($tivm0 == null) {
    parse_str($_SESSION["wholeURLParameters"], $tivm0);
}
$vhag3 = null;
$qeku4 = null;
if (!empty($_POST)) {
    $uwhx5 = null;
    $nktm6 = null;
    if (isset($_POST['customer_name']))
        $uwhx5 = $_POST['customer_name'];
    if (isset($_POST['customer_lastname']))
        $nktm6 = $_POST['customer_lastname'];
    $nytl7 = true;
    if (empty($uwhx5)) {
        $vhag3 = 'Por favor, escribe un nombre.';
        $nytl7 = false;
    }
    if (empty($nktm6)) {
        $qeku4 = 'Por favor, escribe un apellido.';
        $nytl7 = false;
    }
    if ($nytl7) {
        $fwbx8 = mysqli_connect("localhost", "root", "root", "farmacia");
        $fwbx8->autocommit(FALSE);
        $fwbx8->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);
        $ymrt9 = "INSERT INTO cliente (id,nombre,apellido) values(null,'" . "$uwhx5" . "','" . "$nktm6" . "')";
        $prdq10 = $fwbx8->query($ymrt9);
        $dtgw11 = "SELECT LAST_INSERT_ID() INTO @newCustomer_id";
        $fwbx8->query($dtgw11);
        $ytdu12 = "INSERT INTO rebaja (id,cliente,date_time) values(null,@newCustomer_id,NOW())";
        $hton13 = $fwbx8->query($ytdu12);
        $sbqa14 = "SELECT LAST_INSERT_ID() INTO @newSale_id";
        $fwbx8->query($sbqa14);
        $fshr15 = true;
        $mhgc16 = true;
        foreach ($tivm0 as $yxvf17 => $zcxs18) {
            $rmpn19 = "INSERT INTO rebaja_producto (rebaja,producto,cuantos) values(@newSale_id,'" . $yxvf17 . "',$zcxs18)";
            $mhht20 = $fwbx8->query($rmpn19);
            $ubns21 = "SELECT sku FROM producto WHERE id = " . $yxvf17;
            $jtki22 = $fwbx8->query($ubns21);
            while ($grfx23 = $jtki22->fetch_assoc()) {
                $fwat24 = $grfx23['sku'] - $zcxs18;
            }
            if ($fwat24 >= 0) {
                $zjlv25 = "UPDATE producto SET sku = $fwat24 WHERE id = " . $yxvf17;
                $rdtg26 = $fwbx8->query($zjlv25);
            } else {
                header("Location: error.php");
                die;
            }
            if ($mhht20 == false and $rdtg26 == false and $jtki22 == false) {

                $fshr15 = false;
                $mhgc16 = false;
                break;
            }w
        }
        if ($prdq10 and $hton13 and $jtki22 and $fshr15 and $mhgc16) {
            $fwbx8->commit();
        } else {
            $fwbx8->rollback();
        }
        $fwbx8->close();
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Farmacias Ruiz">
    <meta name="author" content="Alam Lastra & Manuel Neri">
    <title>Farmacias Ruiz</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/index-min.css" rel="stylesheet">
    <script src="js/sale-min.js"></script>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark ml-4 mt-3 bg-light">
        <a class="navbar-brand" href="index.html">Farmacias Ruiz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> Punto de Venta
                        <span class="sr-only">(current)</span>
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Pedidos</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="categoria-form text-center col-6 offset-3 mt-5">
        <form action=<?php echo "buy.php?" . $_SESSION["wholeURLParameters"] ?> method="post">
            <div class="container">
                <h2 class="text-center mb-3">Información del cliente</h2>
            </div>
            <div class="row">
                <div class="col text-left">
                    <label for="nameInput">Nombre del cliente</label>
                    <input type="text" name="customer_name" class="form-control" placeholder="Nombre" id="nameInput" value="<?php echo !empty($wpnd27) ? $wpnd27 : ''; ?>">
                    <?php if (($vhag3 != null)) ?>
                    <span class="help-inline"><?php echo $vhag3; ?></span>

                </div>
                <div class="col text-left">
                    <label for="lastnameInput">Apellido del cliente</label>
                    <input type="text" name="customer_lastname" class="form-control" placeholder="Apellido" id="lastnameInput" value="<?php echo !empty($pzib28) ? $pzib28 : ''; ?>">
                    <?php if (($qeku4 != null)) ?>
                    <span class="help-inline"><?php echo $qeku4; ?></span>
                    <p class="help-block text-danger"></p>
                </div>
            </div>

            <div class="container">
                <h2 class="text-center mt-5 mb-3">Productos seleccionados</h2>
            </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('database.php');
                        $iter29 = Database::connect();
                        $dyie30 = 0.0;
                        foreach ($tivm0 as $nngp1 => $sjoi2) {
                            $ymfr31 = "SELECT p.id as 'product_id', p.nombre as 'product_name', p.precio as 'product_price' FROM producto p WHERE p.id = " . $nngp1;

                            foreach ($iter29->query($ymfr31) as $grfx23) {
                                echo '<tr>';
                                echo '<td>' . $nngp1 . '</td>';
                                echo '<td>' . $grfx23['product_name'] . '</td>';
                                echo '<td> $ ' . $sjoi2 * $grfx23['product_price'] . '</td>';
                                echo '</tr>';
                                $dyie30 += $sjoi2 * $grfx23['product_price'];
                            }
                        }

                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-uppercase">Monto total de la compra</td>';
                        echo '<td> $ ' . $dyie30 . '</td>';
                        echo '</tr>';
                        Database::disconnect();
                        ?>
                    </tbody>
                </table>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Confirmar compra</button>
                </div>
        </form>
    </div>
</body>

</html>