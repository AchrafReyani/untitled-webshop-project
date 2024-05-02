<?php
require('HtmlDoc.php');
class BasicDoc extends HtmlDoc {

    protected $data = NULL;

    public function __construct($mydata) {
        $data = $mydata;
    }

    private function showMeta() {
        echo "<meta charset=\"UTF-8\">";
    }

    private function showCSSLinks() {
        echo "<link rel=\"stylesheet\" href=\"CSS/stylesheet.css\">" ;
    }

    private function showTitle() {
        echo "<title>Achraf's Webshop</title>";
    }

    protected function showHead() {
        $this->showHeadStart();
        $this->showHeadContent();
        $this->showHeadEnd();
    }

    private function showMenu() {
        /* TODO
        function showMenuItem($link, $label) { 
            echo '<li><a href=\index.php?page='. $link .'>' . $label . '</a></li>' . PHP_EOL; 
          } 
          
        function showMenu($data) {  
            echo '<nav> 
            <ul class="menu">'; 
            foreach($data['menu'] as $link => $label) { 
              showMenuItem($link, $label); 
            }
            echo '</ul>' . PHP_EOL . '         </nav>' . PHP_EOL;  
          }
          */
        
    }

    private function showFooter() {
        echo "<footer>&copy; Copyright 2024 Achraf Reyani</footer>";
    }

    
    protected function showBodyContent() {
        $this->showMenu();
        $this->showFooter();
    }

    protected function showHeadContent() {
        $this->showMeta();
        $this->showCSSLinks();
        $this->showTitle();
    }

    private function showContent() {
        //empty?
    }

    //will this show be called?
    public function show() {
        echo "it works";
    }
}
?>