<?php
include_once "../views/ContactDoc.php";
$data = array ('page' => 'Contact');
$view = new ContentDoc($data);
$view -> showContent();
?>