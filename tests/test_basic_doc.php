<?php
include_once "../views/BasicDoc.php";
$data = array ('page' => 'Basic');
$view = new BasicDoc($data);
$view -> show();
?>