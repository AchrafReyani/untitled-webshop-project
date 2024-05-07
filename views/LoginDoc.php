<?php
include_once 'FormBuilder.php';
class LoginDoc extends FormBuilder {
      
  private function showLoginStart() {
    echo "<h2>Login</h2>
    <p>Please enter your email and password to Login.</p>
    <form action=\"index.php\" method=\"post\">
    <input name=\"page\" value=\"Login\" type=\"hidden\">";
  }
        
  private function showLoginEnd($errorMessage) {
    echo "<div>
    <span>* " . $this->data[$errorMessage]  . "</span>
    <input type=\"submit\" value=\"Send\">
    </div>
    </form>";
  }
        
  private function showLoginField($fieldName, $label) {
    echo "
    <div>
    <label for=\"$fieldName\">$label:</label>
    <input type=\"text\" name=\"$fieldName\" value=\"". $this->data[$fieldName]."\">
    <span>* " . $this->data[$fieldName . "Error"]  . "</span>
    </div>";
  }
      
  protected function showContent() {
      //echo "<h2>Login</h2>";
      $this->showLoginStart();
      $this->showLoginField("email", "Email");
      $this->showLoginField("password", "Password");
      $this->showLoginEnd('loginError');
      //TODO
  }
}
?>