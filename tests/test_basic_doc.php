<?php
include_once "../views/BasicDoc.php";
$data = array ('page' => 'basic');
$view = new BasicDoc($data);
$view ->show();
?>