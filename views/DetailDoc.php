<?php
require ("ProductsDoc.php");
include_once "../sessionManager.php";
class DetailDoc extends ProductsDoc {
    protected function showContent() {
        echo "<h2>Product details</h2>";
        $product = $this->data['product'];
        var_dump($product);
        if (empty($product)) {
            echo "<p>No product data to show</p>";
            return;
        }
        $id = $product["id"];
        $name = $product["name"];
        $description = $product["description"];
        $price = $product["price"];
        $image = $product["image"];
            
        // Display product information
        echo "<div class='product-details'>";
        echo "<div class=''>";
        echo "<p>Product ID: $id</p>";
        echo "<img src='$image' alt='$name'>";
        echo "<h3>$name</h3>";
        echo "<p>$description</p>";
        echo "<p class='price'>$$price</p>";
   
        if($this->data["allowedToBuy"]) { 
            include_once '../webshop.php'; 
            addToCartButton($id); 
        }     
    }
}
?>