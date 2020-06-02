<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicia sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index-min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container home mt-5">
    <div class="row mt-5">
      <div class="col-12 text-center mt-5">
        <div class="mt-1">
          .
        </div>
        <h2 class="mt-5">Bienvenido a</h2>
        <h1 class="display-2">Farmacias Ruiz</h1>
        <p class="text-center">
          Te queremos bien
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col cols-4 mx-auto">
        <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Correo Electrónico</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ID o Correo" >
            <small id="emailHelp" class="form-text text-muted">Tus datos están protegidos</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="" placeholder="Contraseña">
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Iniciar Sesión">
          <?php if (!empty($errores)) : ?>
            <div class="errores">
              <ul>
                <?php echo $errores; ?>
              </ul>
            </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>

</body>

</html>