<?php
include_once 'FormsDoc.php';
class LoginDoc extends FormsDoc {     
  protected function showContent() {
      $this->showFormStart("Login", "Please enter your email and password to Login.", "index.php", "POST");
      $this->showTextField("email", "Email");
      $this->showTextField("password", "Password");
      $this->showFormEnd("Login");
  }
}
?>