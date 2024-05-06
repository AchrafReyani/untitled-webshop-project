<?php
include_once "../views/ContactDoc.php";
$data = array ('page' => 'Contact');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new ContactDoc($data);
$view -> show();
?>