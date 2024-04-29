<?php 
function validateLogin() {
  $email = $password = $username= "";   
  $loginError = $emailError = $passwordError = $generalError = "";
  $valid = false;
  $userid = null;

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
  //$valid = true when email and password combination is found in file
  return [ 'userid' => $userid, 'valid' => $valid, 'email' => $email, 'password' => $password,  'loginError' => $loginError,  
              'emailError' => $emailError, 'passwordError' => $passwordError, 'username' => $username, 'generalError' => $generalError];
}

function showLoginStart() {
  echo "<h2>Login</h2>
  <p>Please enter your email and password to Login.</p>
  <form action=\"index.php\" method=\"post\">
  <input name=\"page\" value=\"Login\" type=\"hidden\">";
}
  
function showLoginEnd($errorMessage, $data) {
  echo "<div>
  <span>* " . $data[$errorMessage]  . "</span>
  <input type=\"submit\" value=\"Send\">
  </div>
  </form>";
}
  
function showLoginField($fieldName, $label, $data) {
  echo "
  <div>
  <label for=\"$fieldName\">$label:</label>
  <input type=\"text\" name=\"$fieldName\" value=\"". $data[$fieldName]."\">
  <span>* " . $data[$fieldName . "Error"]  . "</span>
  </div>";
}

function showLoginPage($data){
  showLoginStart();
  showLoginField("email", "Email", $data);
  showLoginField("password", "Password", $data);
  showLoginEnd('loginError', $data);
}
?>