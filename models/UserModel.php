<?php
include_once "./UserCrud.php";

class UserModel extends PageModel {
  public $email = "";
  public $name = "";
  public $password = "";
  public $confirmPassword = "";
  public $currentPassword = "";
  public $newPassword = "";
  public $confirmNewPassword = "";
  public $userId = NULL;
  public $hashedPassword = "";
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

  public $crud;

  public function __construct($pageModel, UserCrud $crud) {
    PARENT::__construct($pageModel);
    $this->crud = $crud;
  }

  public function validateLogin() {
    if ($this->isPost) {
      if (empty($_POST["email"])) {
        $this->emailError = "Email is required";
      } else {
          $this->email = $_POST['email'];
        }
      
      if (empty($_POST["password"])) {
        $this->passwordError = "Password is required";
      } else {
          $this->password = $_POST['password'];
        }
      $this->authenticateUser();
    }    
  }

  public function validateRegistration() {    
    if ($this->isPost) {
      //save input if valid and send error message when not valid   
      //if email is empty give required error, if it exists check for duplicate emails in the database. 
      if (empty($_POST["email"])) {
        $this->emailError = "Email is required";
      } else {
          $this->email = $_POST['email'];
          require_once 'db.php';
          $count = getEmailCount($this->email); //get the number of rows that contain the email address. 
          if ($count > 0) { 
            $this->emailError = "Email already exists";
          } 
        }

      if (empty($_POST["name"])) {
        $this->nameError = "Name is required";
      } else {
            $this->name = $_POST['name'];
          }

      if (empty($_POST["password"])) {
        $this->passwordError = "Password is required";
      } else {
            $this->password = $_POST['password'];
        }
      
      if (empty($_POST["confirmPassword"])) {
        $this->confirmPasswordError = "Confirm password is required";
      } else {
            $this->confirmPassword = $_POST['confirmPassword'];
        }
      
      //check if passwords match
      if ($this->password != $this->confirmPassword && ($this->password != "" && $this->confirmPassword != "")) {
        $this->passwordError = "Passwords do not match";
        $this->confirmPasswordError = "Passwords do not match";
      }
        
      //if no errors were found set valid to true  
      if ($this->emailError == "" && $this->nameError == "" && $this->passwordError == "" && $this->confirmPasswordError == "") {
        $this->valid = true;
      }
    }
  }

  function validateChangePassword() {
    if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
      //print error messages for empty fields
      if (empty($_POST["currentPassword"])) {
        $this->currentPasswordError = "Current password is required";
      } else {
          $this->currentPassword = $_POST['currentPassword'];
        }
      
      if (empty($_POST["newPassword"])) {
        $this->newPasswordError = "New password is required";
      } else {
          $this->newPassword = $_POST['newPassword'];
        }

      if (empty($_POST["confirmNewPassword"])) {
        $this->confirmNewPasswordError = "Confirm new password is required";
      } else {
          $this->confirmNewPassword = $_POST['confirmNewPassword'];
        }
      
      //check if passwords match
      if ($this->newPassword != $this->confirmNewPassword && ($this->newPassword != "" && $this->confirmNewPassword != "")) {
        $this->newPasswordError = "New passwords do not match";
        $this->confirmNewPasswordError = "New passwords do not match";
      }
      
      //check if current password is not the same as new password
      if ($this->currentPassword == $this->newPassword) {
        $this->newPasswordError = "New password cannot be the same as current password";
      }
      
      //only change the password when there are no errors and the current password is correct
      if (!$this->currentPasswordError && !$this->newPasswordError && !$this->confirmNewPasswordError) {            
        require_once 'db.php';
        //get current user's password
        $currentPasswordHashed = getCurrentPassword($this->sessionManager->getUserId());
        if (password_verify($this->currentPassword, $currentPasswordHashed)) {
          $this->hashedPassword = password_hash($this->newPassword, PASSWORD_DEFAULT);
          $this->valid = true;  
        } else {
            $this->currentPasswordError = "Current password is incorrect";
          }
      }
    }
  }

  function validateForm() { 
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //save input if valid and send error message when not valid
      //mandatory fields
      if (empty($_POST["pronouns"])) {
          $this->pronounsError = "Pronouns are required";
        } else {
            $this->pronouns = $_POST['pronouns'];
          }
      
      if (empty($_POST["name"])) {
        $this->nameError = "Name is required";
      } else {
          $this->name = $_POST['name'];
        }
      
      if (empty($_POST["communication"])) {
          $this->communicationError = "Communication method is required";
      } else {
            $this->communication = $_POST['communication'];
        }
      
      if (empty($_POST["message"])) {
        $this->messageError = "Message is required";
      } else {
          $this->message = $_POST['message'];
        }
      
      //send error message depending on the communication method
      if ($this->communication == "email") {
        echo 'email was communication';
        if (empty($_POST["email"])) {
          $this->emailError = "Email is required";
        } else {
            $this->email = $_POST['email'];
          } 
      } else if ($this->communication == "phone") {
          if (empty($_POST["phonenumber"])) {
            $this->phonenumberError = "Phone number is required";
          } else {
              $this->phonenumber = $_POST['phonenumber'];
            } 
        } else if ($this->communication == "postal") {
            if (empty($_POST["street"])) {
              $this->streetError = "Street is required";
            } else {
                $this->street = $_POST['street'];
              }
            if (empty($_POST["housenumber"])) {
              $this->housenumberError = "House number is required";
            } else {
                $this->housenumber = $_POST['housenumber'];
              }
        
            if (empty($_POST["postalcode"])) {
              $this->postalcodeError = "Postal code is required";
            } else {
              $this->postalcode = $_POST['postalcode'];
            }
        
            if (empty($_POST["city"])) {
              $this->cityError = "City is required";
            } else {
              $this->city = $_POST['city'];
            }
          }
      
      $requiredFields = false;
      if (!empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"])) {
        $requiredFields = true;
        }
      
      //TODO check to see if this can be made smaller
      if ($this->communication == "email" && empty($_POST["email"])) {
        $this->emailError = "Please enter a valid email address";
      } else if ($this->communication == "email" && !empty($_POST["email"]) &&  $requiredFields ) {
          $this->valid  = true;
        }
      
      if ($this->communication == "phone" && empty($_POST["phonenumber"])) {
        $this->phonenumberError = "Please enter a valid phone number";
      } else if ($this->communication == "phone" && !empty($_POST["phonenumber"]) &&  $requiredFields) {
          $valid = true;
        }
            
      if ($this->communication == "postal" && !empty($_POST["street"]) && !empty($_POST["housenumber"]) && !empty($_POST["postalcode"]) && !empty($_POST["city"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"])) { 
        $this->valid = true;
      }
    }
  }

  //todo (#23)
  private function authenticateUser() {
    //logic to check file for valid userinfo
    try {
      $user = $this->crud->readUserByEmail($this->email);
      //if account is found and password matches hashed password
      if (!empty($user) && password_verify($this->password, $user->pwd)) {
        //echo "log in was succesfull";
        $this->name = $user->username;
        $this->userId = $user->id;
        $this->valid = true;
      } else {
          //echo "login failed";
          $this->generalError = "Invalid email or password";
        }
    } catch (Exception $e) {
        $this->generalError = "Could not connect to the database, You cannot login at this time. Please try again later.";
        //logError("Authentication failed for user ' . $email . ', SQLError: ' . $e->getMessage()'");
      }
  }

  //todo same name as the db function, maybe change one?
  public function registerNewUser() {
    $this->crud->createUser($this->email, $this->name, $this->password);
    //include_once "./db.php";
    //registerNewUser($this->email, $this->name, $this->password);
  }

  public function doLoginUser() {
    $this->sessionManager->doLoginUser($this->name, $this->userId);
    $this->errors['generalError'] = "Login failed.";
  }

  public function updatePassword() {
    $this->crud->updatePassword($this->hashedPassword, $this->sessionManager->getUserId());
    //include_once "./db.php";
    //updatePassword($this->sessionManager->getUserId(), $this->hashedPassword);
  }
}
?>