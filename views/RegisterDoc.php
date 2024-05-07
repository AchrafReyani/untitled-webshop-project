<?php
include_once 'FormBuilder.php';
include_once 'BasicDoc.php';
class RegisterDoc extends BasicDoc {
       
      private function showRegisterStart() {
        echo "<h2>Register</h2>
        <p>Please enter your details to register.</p>
        <form action=\"index.php\" method=\"post\">
        <input name=\"page\" value=\"Register\" type=\"hidden\">";
      }
      
      private function showRegisterField($fieldName, $label) {
        echo "
        <div>
        <label for=\"$fieldName\">$label:</label>
        <input type=\"text\" name=\"$fieldName\" value=\"". $this->data[$fieldName]."\">
        <span>* " . $this->data[$fieldName . "Error"]  . "</span>
        </div>";
      }
      
      private function showRegisterEnd() {
        echo "<div>
        <input type=\"submit\" value=\"Send\">
        </div>
        </form>";
      }

    protected function showContent() {
        $this->showRegisterStart();
        $this->showRegisterField('name', 'Name');
        $this->showRegisterField('email', 'Email');
        $this->showRegisterField('password', 'Password');
        $this->showRegisterField('confirm_password', 'Confirm Password');
        $this->showRegisterEnd();
    }

}
?>