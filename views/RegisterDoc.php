<?php
include_once 'FormsDoc.php';
class RegisterDoc extends FormsDoc {
    protected function showContent() {
        $this->showFormStart("Register", "Please enter your details to register.", "index.php", "POST");
        $this->showHiddenField("page", "Register");
        $this->showTextField('name', 'Name');
        $this->showTextField('email', 'Email');
        $this->showTextField('password', 'Password');
        $this->showTextField('confirmPassword', 'Confirm Password');
        $this->showFormEnd();
    }
}
?>