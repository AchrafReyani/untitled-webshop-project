<?php
require ("ProductsDoc.php");
include_once "./sessionManager.php";
class WebshopDoc extends ProductsDoc { 
      
  private function showWebshopContent() {
    echo "<h2>Webshop</h2>";
    try {
      //echo "showwebshopcontentstart";
    //require_once 'db.php';
    //$result = getAllProducts();
      
    echo "<div class = 'products'>";
    foreach ($this->model->products as $product) {
      //echo "first loop";
      $id = $product["id"];
      $name = $product["name"];
      //$description = $row["description"];
      $price = $product["price"];
      $image = $product["image"];
          
      // Display product information
      echo "<a href='index.php?page=Detail&id=$id' div class='product'>";
      echo "<div class=''>";
      //echo "<p>Product ID: $id</p>";
      echo "<img src='$image' alt='$name'>";
      echo "<h3>$name</h3>";
      //echo "<p>$description</p>";
      echo "<p class='price'>$$price</p>";
      if($this->model->sessionManager->isUserLoggedIn()) {
        $this->addToCartButton($id);
      }
      echo "</div>";
      echo "</a>";  
      }
      echo "</div>";
    } catch (Exception $e) {
        $generalError = "Could not connect to the database, You cannot view the webshop at this time. Please try again later.";
      } finally {
          $generalError = "";
        }
    return [ 'generalError' => $generalError ];
  }

  protected function showContent() {
    $this->showWebshopContent();
  }
}
?>