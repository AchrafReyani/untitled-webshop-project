<?php
include_once "../views/ChangePasswordDoc.php";
$data = array ('page' => 'Password');
$view = new ChangePasswordDoc($data);
$view -> show();
?>