<?php
include_once 'FormBuilder.php';
class ChangePasswordDoc extends FormBuilder {  

  //temporary function until formbuilder is finished
  private function showChangePasswordField($fieldName, $label) {
    echo "
    <div>
    <label for=\"$fieldName\">$label:</label>
    <input type=\"text\" name=\"$fieldName\" value=\"". $this->data[$fieldName]."\">
    <span>* " . $this->data[$fieldName . "Error"]  . "</span>
    </div>";
  }

  protected function showContent() {
    $this->showFormStart("Change Password", "Please enter your old password and your new password twice.", "index.php", "POST");
    $this->showHiddenField("page", "ChangePassword");
    $this->showChangePasswordField("currentPassword", "Current password");
    $this->showChangePasswordField("newPassword", "New password");
    $this->showChangePasswordField("confirmNewPassword", "Confirm new password");
    $this->showFormEnd();   
  }
}
?>