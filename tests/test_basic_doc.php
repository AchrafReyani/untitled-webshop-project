<?php
include_once "../views/BasicDoc.php";
$data = array ('page' => 'home');
$view = new BasicDoc($data);
$view -> show();
?>