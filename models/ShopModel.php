<?php
include_once "./ShopCrud.php";

class ShopModel extends PageModel {
    public $products = [];

    public function __construct($pageModel, ShopCrud $crud) {
        PARENT::__construct($pageModel);
        $this->crud = $crud;
    }

    public function getWebshopProducts() {
      $this->products = $this->crud->readAllProducts();
    }
      
    public function handleCartActions() {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
      } else {
        $action = "";
      }
      switch ($action) {
        case 'addToShoppingCart';
          $id = $_POST['id'];
          $this->sessionManager->addToShoppingCart($id);
          break;
        case 'removeFromShoppingCart';
          $id = $_POST['id'];
          $this->sessionManager->removeFromShoppingCart($id);
          break;
        case 'submitShoppingCart'; 
          try {
          $this->crud->createOrder($this->sessionManager->getShoppingCart(), $this->sessionManager->getUserId());
          $this->sessionManager->deleteShoppingCart();//kinda useless since makeshoppingcart already empties the shoppingcart by default.
          $this->sessionManager->makeShoppingCart();
          } catch (PDOException $e) {
            $this->generalError = "An error has ocurred while processing your order.";
            $this->logError("create order failed: " . $e->getMessage());
          }
          break;
      }
        return $action;
      }
}
?>