<?php
session_start();
include 'serv.php';
if (isset($_SESSION['employee'])) {
    header('Location: index.php');
}

/*  Inicicacion de variables globales */
$errores = '';

/* Trae la vista  */
require 'views/login.view.php';

/*  Manejo de inicio de sesión */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employee = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING);
    $salt;
    $pepper = 'T3kDm';

    // Query que checa busca los datos para el inicio de sesión
    $query_user_salt = "SELECT salt FROM empleado WHERE correo='$employee' LIMIT 1";
    $result_query_user_salt=$mysqli->query($query_user_salt);
    if ($row = mysqli_fetch_array($result_query_user_salt)) {//si encuentra datos en la consulta realizada
        $salt = $row[0];
    } else {
        $errores .= '<li>Datos incorrectos</li>';
    }

    $pwd = $_POST['password'];
    $pwd .= $salt;
    $pwd .= $pepper;
    $password = hash('sha256', $pwd);
    // echo $pwd;
    // echo $password;

    // Query que checa busca los datos para el inicio de sesión
    $query_user_exists = "SELECT * FROM empleado WHERE contrasena ='$password'  AND (correo='$employee')";
    $result_query_user_exists=$mysqli->query($query_user_exists);
    if ($row = mysqli_fetch_array($result_query_user_exists)) {//si encuentra datos en la consulta realizada
        $_SESSION['employee'] = $row;
        header('Location: index.php');
    } else {
        $errores .= '<li>Datos incorrectos</li>';
    }
}

