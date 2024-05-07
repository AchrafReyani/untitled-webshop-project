<?php
require ("ProductsDoc.php");
include_once "../sessionManager.php";
class DetailDoc extends ProductsDoc {
    protected function showContent() {
        echo "<h2>Product details</h2>";
        // Get product ID from URL
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;//change value from 0 to 1-5 to test detail page
        //echo "Product ID: $id";

        // Connect to database and get product details
        //require_once 'db.php';
        //$result = getProductDetails($id);

        foreach ($this->data['products'] as $product) {
            if ($product["id"] == $id) {
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
            if(isUserLoggedIn()) {
            include_once 'webshop.php';
            addToCartButton($id);
        }
        echo "</div>";
        echo "</div>";
      }
    }
    }
}
?>