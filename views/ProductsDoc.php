<?php //TODO write methods here that are double in webshop page and detail page
require "BasicDoc.php";
abstract class ProductsDoc extends BasicDoc {
    protected function addToCartButton($id) {
        echo "<form action='index.php' method='POST'>
        <input type='hidden' name='action' value='addToShoppingCart'>
        <input type='hidden' name='id' value=".$id.">
        <input type='hidden' name='page' value='Webshop'>
        <button type='submit'>Add to Cart</button>
        </form>";
      }
}
?>