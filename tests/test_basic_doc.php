<?php
include_once "../views/BasicDoc.php";
$data = array ('page' => 'Home');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new BasicDoc($data);
$view -> show();
?>