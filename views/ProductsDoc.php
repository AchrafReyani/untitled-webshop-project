<?php
require "BasicDoc.php";
abstract class ProductDoc extends BasicDoc {


    public function show() {
        $this->showContent(); 
    }
}
?>