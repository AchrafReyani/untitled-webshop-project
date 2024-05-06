<?php
include_once "../views/DetailDoc.php";
$data = array ('page' => 'Detail');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new DetailDoc($data);
$view -> show();
?>