<?php
include_once 'FormBuilder.php';
class RegisterDoc {

    private function validateRegistration() {
        $email = $name = $password = $confirm_password = "";
        $emailError = $nameError = $passwordError = $confirm_passwordError = "";
        $valid = false;
      
        if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
        //save input if valid and send error message when not valid
           
        //if email is empty give required error, if it exists check for duplicate emails in the database. 
        if (empty($_POST["email"])) {
          $emailError = "Email is required";
        } else {
          $email = $_POST['email'];
          require_once 'db.php';
          $count = getEmailCount($email); //get the number of rows that contain the email address. 
          if ($count > 0) { 
          //Action to take if email exists 
          $emailError = "Email already exists";
          } 
          }
      
          if (empty($_POST["name"])) {
            $nameError = "Name is required";
          } else {
            $name = $_POST['name'];
          }
      
          if (empty($_POST["password"])) {
            $passwordError = "Password is required";
          } else {
            $password = $_POST['password'];
          }
      
          if (empty($_POST["confirm_password"])) {
            $confirm_passwordError = "Confirm password is required";
          } else {
            $confirm_password = $_POST['confirm_password'];
          }
      
          //check if passwords match
          if ($password != $confirm_password && ($password != "" && $confirm_password != "")) {
            $passwordError = "Passwords do not match";
            $confirm_passwordError = "Passwords do not match";
          }
        
             //if no errors were found set valid to true  
            if ($emailError == "" && $nameError == "" && $passwordError == "" && $confirm_passwordError == "") {
              $valid = true;
            }
        }
        return [ 'valid' => $valid, 'name' => $name, 'email' => $email, 'password' => $password, 'confirm_password' => $confirm_password, 'passwordError' => $passwordError, 'confirm_passwordError' => $confirm_passwordError, 'nameError' => $nameError, 'emailError' => $emailError];
      }
        
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