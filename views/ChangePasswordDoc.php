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

  private function showChangePasswordEnd($data) {
    echo "<div>
    <input type=\"submit\" value=\"Send\">
    </div>
    </form>";
  }

  private function showChangePasswordField($fieldName, $label, $data) {
    echo "
    <div>
    <label for=\"$fieldName\">$label:</label>
    <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
    <span>* " . $data[$fieldName . "Error"]  . "</span>
    </div>";
  }

  protected function showContent() {
    echo "<h2>Change Password</h2>";
    $this->showChangePasswordField("currentPassword", "Current password", $data);
    $this->showChangePasswordField("newPassword", "New password", $data);
    $this->showChangePasswordField("confirmNewPassword", "Confirm new password", $data);
    $this->showChangePasswordEnd();   
  }
}
?>