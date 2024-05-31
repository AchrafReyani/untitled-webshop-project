<?php
include_once "Crud.php";
class UserCrud {
    private $crud;

    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    public function createUser($email, $name, $hashedPassword) {
        $sql = "INSERT INTO users (email, username, pwd) VALUES (:email, :username, :pwd)";
        $params = [
            ':email' => $email,
            ':username' => $name,
            ':pwd' => $hashedPassword  // Securely hash the password
        ];
        $this->crud->createRow($sql, $params);
    }

    public function readUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = array(":email"=>$email);
        $row = $this->crud->readOneRow($sql, $params);
        return $row;
    }

    public function readUserById($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = array(":id"=>$id);
        $row = $this->crud->readOneRow($sql, $params);
        return $row;
    }

    public function updatePassword($newPassword, $userId) {
        $sql = "UPDATE users SET pwd = :newPassword WHERE id = :userId";
        $params = [
            ':newPassword' => $newPassword,
            ':userId' => $userId
        ];
        $this->crud->updateRow($sql, $params);
    }

    public function readIfEmailExists($email) {
        return !empty($this->readUserByEmail($email));
    }

    //this isn't used atm
    public function deleteUser() {
        //todo
    }
}
?>