<?php
include_once "Crud.php";
class ShopCrud {
    private $crud;

    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    public function createOrder($shoppingCart, $id) {
        // Insert into orders table
        $date = date("Y-m-d");
        $sql = "INSERT INTO orders (user_id, date) VALUES (:userId, :date);";
        $params = array(":userId" => $id, "date"=>$date);
        $orderId = $this->crud->createRow($sql, $params);
        
        // Insert into orders_products table
        foreach ($shoppingCart as $productId => $quantity) {
            $sql = "INSERT INTO order_rows (order_id, product_id, quantity) VALUES (:orderId, :productId, :quantity);";
            $params = array();
            $params[":orderId"] = $orderId;
            $params[":productId"] = $productId;
            $params[":quantity"] = $quantity;
            $this->crud->createRow($sql, $params);
        }
    }

    public function readAllProducts() {
        $sql = "SELECT id, name, description, price, image FROM products";
        $params = "";//not used
        $rows = $this->crud->readMultipleRows($sql, $params);
        return $rows;
    }

    //isn't being used
    public function readProductDetails($id) {
        $sql = "SELECT id, name, description, price, image FROM products WHERE id = :id";
        $params = array(":id"=>$id);
        $rows = $this->crud->readOneRow($sql, $params);
        return $rows;
    }
}
?>