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
          //also uses functions from session manager, is this okay?
          $this->crud->createOrder($this->sessionManager->getShoppingCart(), $this->sessionManager->getUserId());
          $this->sessionManager->deleteShoppingCart();//TODO maybe make seperate function for emptying thhe shopping cart and completely unsetting it for logging out
          $this->sessionManager->makeShoppingCart();
          break;
      }
        return $action;
      }
}
?>