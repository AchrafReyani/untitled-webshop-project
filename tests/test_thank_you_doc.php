<?php
include_once "../views/ThankYouDoc.php";
$data = array ('page' => 'ThankYou');
$view = new ThankYouDoc($data);
$view -> show();
?>