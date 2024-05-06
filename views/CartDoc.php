<?php
require ("ProductsDoc.php");
class CartDoc extends ProductsDoc {
      
    private function addToOrderButton($id) {
        echo "<form action='index.php' method='POST'>
        <input type='hidden' name='action' value='addToShoppingCart'>
        <input type='hidden' name='id' value=".$id.">
        <input type='hidden' name='page' value='ShoppingCart'>
        <button type='submit'>Add 1</button>
        </form>";
    }
      
    private function removeFromOrderButton($id) {
        echo "<form action='index.php' method='POST'>
        <input type='hidden' name='action' value='removeFromShoppingCart'>
        <input type='hidden' name='id' value=".$id.">
        <input type='hidden' name='page' value='ShoppingCart'>
        <button type='submit'>Remove 1</button>
        </form>";
    }
      
    //display product name, quantity, small image, price, and total price of the whole order
    private function showShoppingCartContent() {
        if (!isset($_SESSION['shoppingCart']) || empty($_SESSION['shoppingCart'])) {
            echo 'Your shopping cart is empty.';
        } else {
            $shoppingCart = getShoppingCart();
            $products = $this->data['products'];
            $total = 0;
          
            //loop through each item in the shoppingcart and check the database for matching ids
            foreach ($shoppingCart as $id => $quantity) {
                foreach ($data['products'] as $product) {
                if($product['id'] == $id) {
                    echo '<div class="shoppingCart">';
                    $subtotal = $product['price'] * $quantity;
                    $total += $subtotal;
                    echo '<img src='.$product['image'].' alt="" class="shoppingCartImage"><ul> <li>'.$product['name'].'</li> <li>quantity: '.$quantity.'</li> <li> subtotal: $'.$subtotal.'</li></ul>';
                    addToOrderButton($id);
                    removeFromOrderButton($id);
                    echo '</div>';
              }
            }
          }
          echo '<p class="shoppingCart">Total: $'.$total.'<p>';
        }
    }
      
    private function showOrderButton() {
        echo "<form action='index.php' method='POST'>
        <input type='hidden' name='action' value='submitShoppingCart'>
        <input type='hidden' name='page' value='Webshop'>
        <button type='submit'>Submit</button>
        </form>";
    }
      
    protected function showContent() {
        echo "<h2>Shopping Cart</h2>
        <p>Here are the items in your shopping cart:</p>";

        $this->showShoppingCartContent();
        $this->showOrderButton();
    }
}
?>