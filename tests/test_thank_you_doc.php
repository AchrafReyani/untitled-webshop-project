<?php
include_once "../views/ThankYouDoc.php";
$data = array ('page' => 'ThankYou');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$view = new ThankYouDoc($data);
$view -> show();
?>