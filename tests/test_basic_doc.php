<?php
include_once "../views/BasicDoc.php";
$data = array ('page' => 'basic');//todo
$view = new BasicDoc($data);
$view ->show();
?>