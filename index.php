<?php
require_once 'Crud.php';
require_once 'CrudFactory.php';
require_once 'ModelFactory.php';
require_once 'controllers/PageController.php';
//test
session_start();

$crud = new Crud();
$crudFactory = new CrudFactory($crud);
$modelFactory = new ModelFactory($crudFactory);
$controller = new PageController($modelFactory);
$controller->handleRequest();
?>