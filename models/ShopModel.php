<?php
include_once "./ShopCrud.php";

class ShopModel extends PageModel {
    public $products = [];

    public function __construct($pageModel, ShopCrud $crud) {
        PARENT::__construct($pageModel);
        $this->crud = $crud;
    }

    public function getWebShopProduct() {
        $product = NULL;
        $generalError = "";
      
        try {
          //display nothing (id=0) when no id has been set
          $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
          if ($id != 0) {
            include_once 'db.php';
            $product = getProductDetails($id);
          }
          if(empty($product)) {
            $generalError = "The product with id: ".$id." was not found.";
          }
        } catch (Exception $e) {
            $generalError = "A technical error ocurred, please come back later";
            logError("GetWebshopProductFailed: " . $e->getMessage());
        }
        return ['product' => $product, 'generalError' => $generalError];
      }
      
     public function getWebshopProducts() {
        include_once 'db.php';
        $this->products = getAllProducts();
        //temporary to check if it works
        if (!empty($this->products)) {
          //echo "Array is not empty. It contains products.";
      } else {
          echo "Array is empty. No products found.";
      }
      //dont have to return anymore?
        //return $products;
      }

      //is there another way to do this?
      public function getShoppingCart() {
        return $this->sessionManager->getShoppingCart();
      }
      
      public function handleCartActions() {
        if (isset($_POST['action'])) {
          $action = $_POST['action'];
        } else {
          $action = "";
        }
        switch ($action)
        {
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
            placeOrder($this->getShoppingCart(), $this->sessionManager->getUserId());
            $this->sessionManager->deleteShoppingCart();//TODO maybe make seperate function for emptying thhe shopping cart and completely unsetting it for logging out
            $this->sessionManager->makeShoppingCart();
            break;
        }
        return $action;
      }
}
?>