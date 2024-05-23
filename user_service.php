<?php
function authenticateUserByEmail($email, $password) {
   //TODO (#11)
}

function authenticateUserById($id, $password) {
    //TODO (#11)
}

//is not used
function storeUser($email, $name, $password) {
  //also hashes the password at the moment, could also be a seperate function
  $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
  registerNewUser($email, $name, $hashedPassword);
}
?>

