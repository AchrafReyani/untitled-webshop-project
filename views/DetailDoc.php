<?php
require ("ProductsDoc.php");
include_once "./sessionManager.php";
class DetailDoc extends ProductsDoc { 
      
  protected function showContent() {
    echo "<h2>Product Details</h2>";
    try {
      
    echo "<div class = 'product-details'>";
    foreach ($this->model->products as $product) {
      $id = $product["id"];
      $name = $product["name"];
      $description = $product["description"];
      $price = $product["price"];
      $image = $product["image"];
    
      //using superglobal array to access the correct id
      if ($id == $_GET['id']) {
      // Display product information
      echo "<div class=''>";
      echo "<p>Product ID: $id</p>";
      echo "<img src='$image' alt='$name'>";
      echo "<h3>$name</h3>";
      echo "<p>$description</p>";
      echo "<p class='price'>$$price</p>";
      if($this->model->sessionManager->isUserLoggedIn()) {
        $this->addToCartButton($id);
      }
      echo "</div>";  
      }
    }
      echo "</div>";
    } catch (Exception $e) {
        $generalError = "Could not connect to the database, You cannot view the webshop at this time. Please try again later.";
      } finally {
          $generalError = "";
        }
    return [ 'generalError' => $generalError ];
  }
}
?>