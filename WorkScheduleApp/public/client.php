<?php
session_start();
include('../includes/pdo_connection.php');
require_once('../includes/functions.php');


echo "Welcome ". $_SESSION['username'];

?>