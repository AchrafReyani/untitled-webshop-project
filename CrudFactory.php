<?php
include_once "ShopCrud.php";
class CrudFactory {
    public $crud;
    
    public function __construct(Crud $crud) {
        $this->crud = $crud;
    }

    public function createCrud($name) {
        switch ($name) {
            case "User":
                $this->crud = new UserCrud($this->crud);
                break;
            case "Shop":
                $this->crud = new ShopCrud($this->crud);
                break;
            default:
                break;
        }
    }
}
?>