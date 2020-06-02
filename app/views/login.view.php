<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicia sesión</title>
</head>
<body>
  <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <input type="email" name="email" value="" placeholder="ID o Correo">
    <input type="password" name="password" value="" placeholder="Contraseña">
    <input type="submit" name="submit" value="Iniciar Sesión">
    <?php if (!empty($errores)): ?>
      <div class="errores">
        <ul>
          <?php echo $errores; ?>
        </ul>
      </div>
    <?php endif; ?>
  </form>

</body>
</html>
