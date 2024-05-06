<?php
include_once "../views/AboutDoc.php";
$data = array ('page' => 'About');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new AboutDoc($data);
$view -> show();
?>