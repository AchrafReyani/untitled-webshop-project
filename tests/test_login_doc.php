<?php
include_once "../views/LoginDoc.php";
$data = array ('page' => 'Login');
$view = new LoginDoc($data);
$view -> show($data);
?>