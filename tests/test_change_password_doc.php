<?php
include_once "../views/ChangePasswordDoc.php";
$data = array ('page' => 'Password');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new ChangePasswordDoc($data);
$view -> show();
?>