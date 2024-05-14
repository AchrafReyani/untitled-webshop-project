<?php
require_once 'controllers/PageController.php';
session_start();
$controller = new PageController();
$controller->handleRequest();
?>