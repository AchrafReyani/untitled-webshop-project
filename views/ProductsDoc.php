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
      //only difference between this and add to cart is the button text and the value
    protected function addToOrderButton($id) {
        echo "<form action='index.php' method='POST'>
        <input type='hidden' name='action' value='addToShoppingCart'>
        <input type='hidden' name='id' value=".$id.">
        <input type='hidden' name='page' value='Cart'>
        <button type='submit'>Add 1</button>
        </form>";
    }
      
    protected function removeFromOrderButton($id) {
        echo "<form action='index.php' method='POST'>
        <input type='hidden' name='action' value='removeFromShoppingCart'>
        <input type='hidden' name='id' value=".$id.">
        <input type='hidden' name='page' value='Cart'>
        <button type='submit'>Remove 1</button>
        </form>";
    }
}
?>