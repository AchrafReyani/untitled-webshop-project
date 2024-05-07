<?php
include_once 'FormsDoc.php';
class RegisterDoc extends FormsDoc {
    protected function showContent() {
        $this->showFormStart("Register", "Please enter your details to register.", "index.php", "POST");
        $this->showHiddenField("page", "Register");
        $this->showFormField('name', 'Name');
        $this->showFormField('email', 'Email');
        $this->showFormField('password', 'Password');
        $this->showFormField('confirm_password', 'Confirm Password');
        $this->showFormEnd();
    }
}
?>