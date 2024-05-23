<?php
include_once "Crud.php";
class ShopCrud {
    private $crud;

    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    public function createOrder() {

    }

    public function readAllProducts() {
        $sql = "SELECT id, name, description, price, image FROM products";
        $params = "";//not used
        $rows = $this->crud->readMultipleRows($sql, $params);
        return $rows;
    }

    public function readProductDetails($id) {
        $sql = "SELECT id, name, description, price, image FROM products WHERE id = :id";
        $params = array(":id"=>$id);
        $rows = $this->crud->readOneRow($sql, $params);
        return $rows;
    }


    function getAllProducts() {
        $products = array();
        $conn = connectToDB();
        $sql = "SELECT id, name, description, price, image FROM products";
        
        $query = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($query)) {
            $products[$row['id']] = $row;
        }
        mysqli_close($conn);
        return $products;
    }
    
    function getProductDetails($id) {
        $conn = connectToDB();
        $idEscape = mysqli_real_escape_string($conn, $id);
        
        $sql = "SELECT * FROM products WHERE id = $idEscape";
        $query = mysqli_query($conn, $sql);
        
        return $query;
    }
    
    //TODO make function
    function placeOrder($shoppingCart, $userId) {
        $conn = connectToDB();
        try {
            if (!empty($shoppingCart)) {
            $date = date("Y-m-d");
            $query = "INSERT INTO orders (user_id, date) VALUES (" . $userId . ", '$date');";
            mysqli_query($conn, $query);
            $query = "INSERT INTO order_rows (order_id, product_id, quantity) VALUES ";
            $values = [];  // Array to store prepared values
            foreach ($shoppingCart as $id => $quantity) {
                $values[] = "('" . mysqli_insert_id($conn) . "','" . $id . "','" . $quantity . "')";
            }
            $query .= implode(',', $values);  // Join values using comma
            mysqli_query($conn, $query);
            }
        } catch (Exception $e) {  }
        finally {
            mysqli_close($conn);
        }
}
}
?>