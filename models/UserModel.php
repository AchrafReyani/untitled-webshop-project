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
      $this->email = $this->getRequestVar("email");
      if (empty($this->email)) {
        $this->emailError = "Email is required";
      }
      
      $this->password = $this->getRequestVar("password");
      if (empty($this->password)) {
        $this->passwordError = "Password is required";
      }

      // TODO: Add 'if' all errors are empty here before authenticating 
      $this->authenticateUser();
    }    
  }

  public function validateRegistration() {    
    if ($this->isPost) {
      $this->pronouns = $this->getRequestVar("pronouns");
      $this->name = $this->getRequestVar("name");
      $this->email = $this->getRequestVar("email");
      $this->phonenumber = $this->getRequestVar("phonenumber");
      $this->street = $this->getRequestVar("street");
      $this->housenumber = $this->getRequestVar("housenumber");
      $this->postalcode = $this->getRequestVar("postal");
      $this->city= $this->getRequestVar("city");
      $this->communication = $this->getRequestVar("communication");
      $this->message = $this->getRequestVar("message");


      $isEmailRequired = $this->communication == "email";
      $isPhoneRequired = $this->communication == "phone";
      $isPostalRequired = $this->communication == "postal" || !empty($this->street) || !empty($this->housenumber) || !empty($this->postal) || !empty($this->city);

      //required fields --------------------
      if (empty($this->pronouns)) {

      }

      if (empty($this->name)) {

      }

      if (empty($this->message)) {

      }

      //conditional fields --------------------
      if (empty($this->email)) {
        if($isEmailRequired) {
          $this->emailError = "Email is required.";
        }
      } 



      //save input if valid and send error message when not valid   
      //if email is empty give required error, if it exists check for duplicate emails in the database. 
      if (empty($_POST["email"])) {
        $this->emailError = "Email is required";
      } else {
          $this->email = $_POST['email']; 
          if ($this->crud->readIfEmailExists($this->email)) { 
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
        //get current user's password
        $row = $this->crud->readUserById($this->sessionManager->getUserId());
        $currentPasswordHashed = $row->pwd;
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

      //if communication method, coressponding field(s) and required fields are filled in set valid to true
      if ($this->communication == "email" && !empty($_POST["email"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"]) ||
          $this->communication == "phone" && !empty($_POST["phonenumber"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"]) ||
          $this->communication == "postal" && !empty($_POST["street"]) && !empty($_POST["housenumber"]) && !empty($_POST["postalcode"]) && !empty($_POST["city"]) &&  !empty($_POST["pronouns"]) && !empty($_POST["name"]) && !empty($_POST["message"]))
        {
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

  public function registerNewUser() {
    $hashedPasswordForRegistration = password_hash($this->password, PASSWORD_DEFAULT);
    $this->crud->createUser($this->email, $this->name, $hashedPasswordForRegistration);
  }

  public function doLoginUser() {
    try {
    $this->sessionManager->doLoginUser($this->name, $this->userId);
    } catch (Exception $e) {
      $this->generalError = "Something went wrong when trying to login.";
    }
  }

  public function updatePassword() {
    $this->crud->updatePassword($this->hashedPassword, $this->sessionManager->getUserId());
  }
}
?>