<?php
include_once "../views/ContactDoc.php";
$data = array ('page' => 'Contact');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$data['pronouns'] = "";
$data['pronounsError'] = "";
$data['name'] = "";
$data['nameError'] = "";
$data['email'] = "";
$data['emailError'] = "";
$data['phonenumber'] = "";
$data['phonenumberError'] = "";
$data['street'] = "";
$data['streetError'] = "";
$data['housenumber'] = "";
$data['housenumberError'] = "";
$data['postalcode'] = "";
$data['postalcodeError'] = "";
$data['city'] = "";
$data['cityError'] = "";
$data['communication'] = "";
$data['communicationError'] = "";
$data['message'] = "";
$data['messageError'] = "";
$view = new ContactDoc($data);
$view -> show();
?>