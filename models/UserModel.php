<?php
class UserModel extends PageModel {
    public $email = "";
    public $name = "";
    public $password = "";
    public $confirmPassword = "";
    public $currentPassword = "";
    public $newPassword = "";
    public $confirmNewPassword = "";
    public $userId = NULL;
    public $emailError = "";
    public $nameError = "";
    public $passwordError = "";
    public $confirmPasswordError = "";
    public $currentPasswordError = "";
    public $newPasswordError = "";
    public $confirmNewPasswordError = "";
    public $pronouns = "";
    public $formName = "";
    public $formEmail = "";
    public $phonenumber = "";
    public $street = "";
    public $housenumber = "";
    public $postalcode = "";
    public $city = "";
    public $communication = "";
    public $message = "";
    public $pronounsError = "";
    public $formNameError = "";
    public $formEmailError = "";
    public $phonenumberError = "";
    public $streetError = "";
    public $housenumberError = "";
    public $postalcodeError = "";
    public $cityError = "";
    public $communicationError = "";
    public $messageError = "";
    public $valid = false;

    public function __construct($pageModel) {
        PARENT::__construct($pageModel);
    }

    public function validateLogin() {
        if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
        if (empty($_POST["email"])) {
          $emailError = "Email is required";
        } else {
            $email = $_POST['email'];
          }
      
        if (empty($_POST["password"])) {
          $passwordError = "Password is required";
        } else {
            $password = $_POST['password'];
          }
      
        //logic to check file for valid userinfo
        require_once 'db.php';
        try {
        $user = getUserInfo($email);
        //store the hashed password from the database
        $hashed_password = $user['pwd'];
        //if account is found and password matches hashed password
        if (password_verify($password, $hashed_password)) {
          //echo "log in was succesfull";
          $username = $user['username'];
          $userid = $user['id'];
          $valid = true;
            
        } else {
            //echo "login failed";
            if (!empty($_POST["password"]) && !empty($_POST["email"])) {
              $loginError = "Invalid email or password";
            }
          }
          } catch (Exception $e) {
            $generalError = "Could not connect to the database, You cannot login at this time. Please try again later.";
            //logError("Authentication failed for user ' . $email . ', SQLError: ' . $e->getMessage()'");
            }
        }
        
      }

    public function validateRegistration() {    
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
            $confirmPasswordError = "Confirm password is required";
          } else {
            $confirmPassword = $_POST['confirm_password'];
          }
      
          //check if passwords match
          if ($password != $confirmPassword && ($password != "" && $confirmPassword != "")) {
            $passwordError = "Passwords do not match";
            $confirmPasswordError = "Passwords do not match";
          }
        
             //if no errors were found set valid to true  
            if ($emailError == "" && $nameError == "" && $passwordError == "" && $confirmPasswordError == "") {
              $valid = true;
            }
        }
      }

      function validateChangePassword() {
        if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
          //print error messages for empty fields
          if (empty($_POST["currentPassword"])) {
            $currentPasswordError = "Current password is required";
          } else {
          $currentPassword = $_POST['currentPassword'];
          }
      
          if (empty($_POST["newPassword"])) {
            $newPasswordError = "New password is required";
            } else {
              $newPassword = $_POST['newPassword'];
              }
      
            if (empty($_POST["confirmNewPassword"])) {
              $confirmNewPasswordError = "Confirm new password is required";
              } else {
                $confirmNewPassword = $_POST['confirmNewPassword'];
              }
      
              //check if passwords match
            if ($newPassword != $confirmNewPassword && ($newPassword != "" && $confirmNewPassword != "")) {
              $newPasswordError = "New passwords do not match";
              $confirmNewPasswordError = "New passwords do not match";
            }
      
              //check if current password is not the same as new password
            if ($currentPassword == $newPassword) {
              $newPasswordError = "New password cannot be the same as current password";
            }
      
              //only change the password when there are no errors and the current password is correct
            if (!$currentPasswordError && !$newPasswordError && !$confirmNewPasswordError) {
              //connect to database
              //make db connection
                
              require_once 'db.php';
              //get current user's password
              $row = getCurrentPassword($_SESSION['userid']);
              //get the hashed password from the database
              $hashed_password = $row['pwd'];
              
              if (password_verify($currentPassword, $hashed_password)) {
                // echo "password is correct";
                //hash new password
      
                //write new db function called changepassword that does this
                $hashedPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                //insert new password into database
                updatePassword($_SESSION['userid'], $hashedPassword);
                  
                $valid = true;
                  
              } else {
                $currentPasswordError = "Current password is incorrect";
                }
            }
          }
       
      }

      function validateForm() { 
        //add empty values to variables
        $pronouns = $name = $email = $phonenumber = $street = $housenumber = $postalcode =
        $city = $communication = $message = "";
      
        //initiate error message variables
        $pronounsError = $nameError = $emailError = $phonenumberError = $streetError = $housenumberError = $postalcodeError = $cityError = $communicationError = $messageError = "";
        $valid = false;
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
          //save input if valid and send error message when not valid
      
          //mandatory fields
          if (empty($_POST["pronouns"])) {
            $pronounsError = "Pronouns are required";
          } else {
            $pronouns = $_POST['pronouns'];
          }
      
          if (empty($_POST["name"])) {
            $nameError = "Name is required";
          } else {
            $name = $_POST['name'];
          }
      
          if (empty($_POST["communication"])) {
            $communicationError = "Communication method is required";
          } else {
            $communication = $_POST['communication'];
          }
      
          if (empty($_POST["message"])) {
            $messageError = "Message is required";
          } else {
            $message = $_POST['message'];
          }
      
            //send error message depending on the communication method
      
          if ($communication == "email") {
            echo 'email was communication';
            if (empty($_POST["email"])) {
              $emailError = "Email is required";
            } else {
            $email = $_POST['email'];
            } 
          } else if ($communication == "phone") {
              if (empty($_POST["phonenumber"])) {
                $phonenumberError = "Phone number is required";
              } else {
                $phonenumber = $_POST['phonenumber'];
              } 
              }else if ($communication == "postal") {
      
              if (empty($_POST["street"])) {
                $streetError = "Street is required";
              } 
              else {
                $street = $_POST['street'];
              }
        
              if (empty($_POST["housenumber"])) {
                $housenumberError = "House number is required";
              } 
              else {
                $housenumber = $_POST['housenumber'];
              }
        
              if (empty($_POST["postalcode"])) {
                $postalcodeError = "Postal code is required";
              } 
              else {
                $postalcode = $_POST['postalcode'];
              }
        
              if (empty($_POST["city"])) {
                $cityError = "City is required";
              } 
              else {
                $city = $_POST['city'];
              }
            
            }
      
            $requiredFields = false;
          if (!empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"])) {
              $requiredFields = true;
            }
      
            //TODO check to see if this can be made smaller
          if ($communication == "email" && empty($_POST["email"])) {
              $emailError = "Please enter a valid email address";
            } else if ($communication == "email" && !empty($_POST["email"]) &&  $requiredFields ) {
                $valid  = true;
            }
      
          if ($communication == "phone" && empty($_POST["phonenumber"])) {
              $phonenumberError = "Please enter a valid phone number";
            } else if ($communication == "phone" && !empty($_POST["phonenumber"]) &&  $requiredFields)
            {
                $valid = true;
            }
            
            if ($communication == "postal" && !empty($_POST["street"]) && !empty($_POST["housenumber"]) && !empty($_POST["postalcode"]) && !empty($_POST["city"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"])) { 
            $valid = true;
            }
          }
      }

    private function authenticateUser() {
        require_once "./db.php";
        $user = findUserByEmail($this->email);

        //password validation

        $this->name = $user['name'];
        // $this->values['name'] = $user['name']
        $this->userId = $user['id'];
    }

    //same name as the one in the db
    public function registerNewUser() {
        include_once "./db.php";
        registerNewUser($email, $name, $password);
    }

    public function doLoginUser() {
        $this->sessionManager->doLoginUser($this->name, $this->userId);
        $this->errors['generalError'] = "Login failed.";
    }

}
?>