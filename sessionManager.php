<?php
class SessionManager {
public function doLoginUser($username, $id) {
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $id;//currently used for changing the user's password
}

public function doLogoutUser() {
    unset($_SESSION['username']);
    unset($_SESSION['userid']);
}

public function getUsername() {
    return $_SESSION['username'];
}

public function getUserId() {
    return $_SESSION['userid'];
}

public function isUserLoggedIn() {
    return isset($_SESSION['username']);
}

public function makeShoppingCart() {
    $_SESSION['shoppingCart'] = [];
}

//gets called either when an order has been made or if the user logs out.
public function deleteShoppingCart() {
    unset($_SESSION['shoppingCart']);
}

public function addToShoppingCart($id) {
    if (empty($_SESSION['shoppingCart'][$id])) {
        $_SESSION['shoppingCart'][$id] = 1;
    } else {
        $_SESSION['shoppingCart'][$id]++;
    }
}

public function removeFromShoppingCart($id) {
    if ($_SESSION['shoppingCart'][$id] > 1) {
        $_SESSION['shoppingCart'][$id]--;
    } else {
        unset($_SESSION['shoppingCart'][$id]);
    } 
}

public function getShoppingCart() {
    $shoppingCart = $_SESSION['shoppingCart'];
    return $shoppingCart;
}
}
?>