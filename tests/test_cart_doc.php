<?php
include_once "../views/CartDoc.php";
$data = array ('page' => 'Cart');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new CartDoc($data);
$view -> show();
?>