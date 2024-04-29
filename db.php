<?php
function connectToDB() {
    $servername = "localhost";
    $dbusername = "WebShopUser";
    $dbpassword = "mBAgRiGMZe7wPq5WAjb6";
    $dbName = "achraf_webshop";
    // create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbName);
    return $conn;
}

//where is this function called?
function getUserInfo($email) {
    $conn = connectToDB();
    $emailEscape = mysqli_real_escape_string($conn, $email);
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$emailEscape'");
    $user = mysqli_fetch_assoc($query);
    mysqli_close($conn);
    return $user;
}

function getEmailCount($email) {
    $conn = connectToDB();
    $query = mysqli_query($conn, "SELECT email from users where email = '$email'"); //Search for the email from the users database 
    $count = mysqli_num_rows($query); //get the number of rows that contain the email address. 
    mysqli_close($conn);
    return $count;
}

function registerNewUser($email, $name, $password) {
    $conn = connectToDB();
    //use a prepared statement to safely insert user data
    $stmt = mysqli_prepare($conn, "INSERT INTO users (email, username, pwd) VALUES (?, ?, ?)");
    if (!$stmt) {
      die("Error preparing statement: " . mysqli_error($conn));
    }
  
    // Bind values using parameter types
    mysqli_stmt_bind_param($stmt, "sss", $email, $name, $password);
  
    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      echo "User registration successful!";
    } else {
      echo "Error registering user: " . mysqli_stmt_error($stmt);
    }
  
    // Close the statement
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }


function getCurrentPassword($id) {
    $conn = connectToDB();
    $idEscape = mysqli_real_escape_string($conn, $id);
    $query = mysqli_query($conn, "SELECT pwd FROM users WHERE id = '$idEscape'");
    $row = mysqli_fetch_assoc($query);
    echo $row['pwd'];
    mysqli_close($conn);
    return $row;
}

function updatePassword($id, $password) {
    $conn = connectToDB();
    $idEscape = mysqli_real_escape_string($conn, $id);
    $passwordEscape = mysqli_real_escape_string($conn, $password);
    
    $query = "UPDATE users SET pwd = '$passwordEscape' WHERE id = '$idEscape'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
}

function getAllProducts() {
    $products = array();
    $conn = connectToDB();
    $sql = "SELECT id, name, description, price, image FROM products";
    
    $query = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($query)) {
        $products[$row['id']] = $row;
    }
    mysqli_close($conn);
    return $products;
}

function getProductDetails($id) {
    $conn = connectToDB();
    $idEscape = mysqli_real_escape_string($conn, $id);
    
    $sql = "SELECT * FROM products WHERE id = $idEscape";
    $query = mysqli_query($conn, $sql);
    
    return $query;
}

//TODO make function
function placeOrder() {
    $conn = connectToDB();
    try {
        $shoppingCart = getShoppingCart();
        if (!empty($shoppingCart)) {
        $date = date("Y-m-d");
        $query = "INSERT INTO orders (user_id, date) VALUES (" . getUserId() . ", '$date');";
        mysqli_query($conn, $query);
        $query = "INSERT INTO order_rows (order_id, product_id, quantity) VALUES ";
        $values = [];  // Array to store prepared values
        foreach ($shoppingCart as $id => $quantity) {
            $values[] = "('" . mysqli_insert_id($conn) . "','" . $id . "','" . $quantity . "')";
        }
        $query .= implode(',', $values);  // Join values using comma
        mysqli_query($conn, $query);
        }
    } catch (Exception $e) {  }
    finally {
        mysqli_close($conn);
    }
}
?>