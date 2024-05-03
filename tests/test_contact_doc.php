<?php
include_once "../views/ContactDoc.php";
$data = array ('page' => 'Contact');
$view = new ContactDoc($data);
$view -> show();
?>