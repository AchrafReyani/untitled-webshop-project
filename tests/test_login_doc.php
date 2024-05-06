<?php
include_once "../views/LoginDoc.php";
$data = array ('page' => 'Login');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new LoginDoc($data);
$view -> show();
?>