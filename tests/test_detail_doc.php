<?php
include_once "../views/DetailDoc.php";
$data = array ('page' => 'Detail');
$view = new DetailDoc($data);
$view -> showContent();
?>