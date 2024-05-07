<?php
include_once 'FormBuilder.php';
include_once 'BasicDoc.php';
class ChangePasswordDoc extends BasicDoc {  
  private function showChangePasswordStart() {
    echo "<h2>Change Password</h2>
    <p>Please enter your old password and your new password twice.</p>
    <form action=\"index.php\" method=\"post\">
    <input name=\"page\" value=\"ChangePassword\" type=\"hidden\">";
  }

  private function showChangePasswordEnd() {
    echo "<div>
    <input type=\"submit\" value=\"Send\">
    </div>
    </form>";
  }

  private function showChangePasswordField($fieldName, $label) {
    echo "
    <div>
    <label for=\"$fieldName\">$label:</label>
    <input type=\"text\" name=\"$fieldName\" value=\"". $this->data[$fieldName]."\">
    <span>* " . $this->data[$fieldName . "Error"]  . "</span>
    </div>";
  }

  protected function showContent() {
    echo "<h2>Change Password</h2>";
    $this->showChangePasswordField("currentPassword", "Current password");
    $this->showChangePasswordField("newPassword", "New password");
    $this->showChangePasswordField("confirmNewPassword", "Confirm new password");
    $this->showChangePasswordEnd();   
  }
}
?>