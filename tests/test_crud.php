<?php
include_once "../Crud.php";
$crud = new Crud();

//createRow
/*
$sql = "INSERT INTO users (email, username, pwd) VALUES (:email, :username, :pwd)";
$params = [
    ':email' => 'test@example.com',
    ':username' => 'testuser',
    ':pwd' => password_hash('password123', PASSWORD_DEFAULT)  // Securely hash the password
];
var_dump($crud->createRow($sql, $params));
*/

//readOneRow

$sql = "SELECT * FROM users WHERE id = :id";
$params = [':id' => 25];
var_dump($crud->readOneRow($sql, $params));


//readMultipleRows
/*
$sql = "SELECT * FROM users WHERE id =:userId;";
$params = array(":userId"=>32);
var_dump($crud->readMultipleRows($sql, $params));
*/

//updateRow
/*
$sql = "UPDATE users SET username = :username WHERE id = :id";
$params = [
    ':username' => 'obama',
    ':id' => 18
];
var_dump($crud->updateRow($sql, $params));
*/

//deleteRow
/*
$sql = "DELETE FROM users WHERE id = :id";
$params = [':id' => 31];
var_dump($crud->deleteRow($sql, $params));
*/
?>
