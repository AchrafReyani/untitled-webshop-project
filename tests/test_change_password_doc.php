<?php
include_once "../views/ChangePasswordDoc.php";
$data = array ('page' => 'Password');
$data['menu'] = array('Home' => 'Home', 'About' => 'About', 'Contact' => 'Contact', 'Webshop' => 'Webshop');
$data['currentPasswordError'] = "";
$data['newPasswordError'] = "";
$data['confirmNewPasswordError'] = "";
$data['currentPassword'] = "";
$data['newPassword'] = "";
$data['confirmNewPassword'] = "";
$view = new ChangePasswordDoc($data);
$view -> show();
?>