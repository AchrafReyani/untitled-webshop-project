<?php
include_once "../views/HomeDoc.php";
$data = array ('page' => 'Home');
$view = new HomeDoc($data);
$view -> show($data);
?>