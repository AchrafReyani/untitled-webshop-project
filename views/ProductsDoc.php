<?php
require "BasicDoc.php";
abstract class ProductsDoc extends BasicDoc {

    public function show($data) {
        $this->showContent($data); 
    }
}
?>