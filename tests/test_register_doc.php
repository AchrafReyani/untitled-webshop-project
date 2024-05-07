<?php
include_once "../views/RegisterDoc.php";
$data = array ('page' => 'Register');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$data['emailError'] = "";
$data['email'] = "";
$data['password'] = "";
$data['confirm_passwordError'] = "";
$data['confirm_password'] = "";
$data['passwordError'] = "";
$data['nameError'] = "";
$data['name'] = "";
$view = new RegisterDoc($data);
$view -> show();
?>