<?php
include_once 'FormsDoc.php';
class ChangePasswordDoc extends FormsDoc {  
  protected function showContent() {
    $this->showFormStart("Change Password", "Please enter your old password and your new password twice.", "index.php", "POST");
    $this->showHiddenField("page", "ChangePassword");
    $this->showTextField("currentPassword", "Current password");
    $this->showTextField("newPassword", "New password");
    $this->showTextField("confirmNewPassword", "Confirm new password");
    $this->showFormEnd();   
  }
}
?>