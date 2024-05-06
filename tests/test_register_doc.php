<?php
include_once "../views/RegisterDoc.php";
$data = array ('page' => 'Register');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new RegisterDoc($data);
$view -> show();
?>