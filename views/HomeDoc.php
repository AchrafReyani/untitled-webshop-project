<?php
require "BasicDoc.php";
class HomeDoc extends BasicDoc {
    protected function showContent($data) {
        echo "<h2>Home</h2>";
        echo "<p>Welcome to Achraf's webshop!</p>";
    }

    public function show($data) {
        $this->showContent($data); 
    }
}
?>