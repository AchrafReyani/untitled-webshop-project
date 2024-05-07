<?php
include_once "../views/LoginDoc.php";
$data = array ('page' => 'Login');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$data['emailError'] = "";
$data['email'] = "";
$data['password'] = "";
$data['passwordError'] = "";
$data['loginError'] = "";
$view = new LoginDoc($data);
$view -> show();
?>