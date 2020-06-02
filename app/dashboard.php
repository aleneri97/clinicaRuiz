<?php
session_start();
if (isset($_SESSION['employee'])) {
    require 'views/dashboard.view.php';
}
?>