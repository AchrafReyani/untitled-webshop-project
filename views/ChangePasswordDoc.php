<?php
include_once 'FormBuilder.php';
class ChangePasswordDoc extends FormBuilder {  
  protected function showContent() {
    $this->showFormStart("Change Password", "Please enter your old password and your new password twice.", "index.php", "POST");
    $this->showHiddenField("page", "ChangePassword");
    $this->showFormField("currentPassword", "Current password");
    $this->showFormField("newPassword", "New password");
    $this->showFormField("confirmNewPassword", "Confirm new password");
    $this->showFormEnd();   
  }
}
?>