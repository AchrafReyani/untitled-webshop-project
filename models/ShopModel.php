<?php //this class interacts with the database
class ShopModel extends PageModel {
    public $products = [];

    public function __construct($pageModel) {
        PARENT::__construct($pageModel);

    }

    public function getWebShopProduct() {
        $product = NULL;
        $generalError = "";
      
        try {
          //display nothing (id=0) when no id has been set
          $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
          if ($id != 0) {
            include_once 'db.php';
            $product = getProductById($id);
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
        echo "test";
        $products = getAllProducts();
        echo "test";
        return ['products' => $products];
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
            addToShoppingCart($id);
            break;
          case 'removeFromShoppingCart';
            $id = $_POST['id'];
            removeFromShoppingCart($id);
            break;
          case 'submitShoppingCart'; 
            //also uses functions from session manager, is this 
            placeOrder();
            $this->sessionManager->deleteShoppingCart();//TODO maybe make seperate function for emptying thhe shopping cart and completely unsetting it for logging out
            $this->sessionManager->makeShoppingCart();
            break;
        }
        return $action;
      }
}
?>