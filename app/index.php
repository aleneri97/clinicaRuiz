<?php
session_start();
if (isset($_SESSION['employee'])) {
    header( 'Location: dashboard.php');
} else {
    header('Location: login.php');
}
