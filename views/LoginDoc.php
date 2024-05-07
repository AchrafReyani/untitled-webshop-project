<?php
include_once 'FormBuilder.php';
class LoginDoc extends FormBuilder {     
  protected function showContent() {
      $this->showFormStart("Login", "Please enter your email and password to Login.", "index.php", "POST");
      $this->showFormField("email", "Email");
      $this->showFormField("password", "Password");
      $this->showFormEnd();
  }
}
?>