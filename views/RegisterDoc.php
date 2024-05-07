<?php
include_once 'FormBuilder.php';
class RegisterDoc extends FormBuilder {
       
      //temporary function until formbuilder fully works
      private function showRegisterField($fieldName, $label) {
        echo "
        <div>
        <label for=\"$fieldName\">$label:</label>
        <input type=\"text\" name=\"$fieldName\" value=\"". $this->data[$fieldName]."\">
        <span>* " . $this->data[$fieldName . "Error"]  . "</span>
        </div>";
      }

    protected function showContent() {
        $this->showFormStart("Register", "Please enter your details to register.", "index.php", "POST");
        $this->showHiddenField("page", "Register");
        $this->showRegisterField('name', 'Name');
        $this->showRegisterField('email', 'Email');
        $this->showRegisterField('password', 'Password');
        $this->showRegisterField('confirm_password', 'Confirm Password');
        $this->showFormEnd();
    }

}
?>