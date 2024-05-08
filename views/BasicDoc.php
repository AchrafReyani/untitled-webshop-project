<?php
require('HtmlDoc.php');
class BasicDoc extends HtmlDoc {
    protected $data = NULL;

    public function __construct($mydata) {
        $this->data = $mydata;
    }

    private function showMeta() {
        echo "<meta charset=\"UTF-8\">";
    }

    private function showCSSLinks() {
        echo "<link rel=\"stylesheet\" href=\"../CSS/stylesheet.css\">" ;
    }

    private function showTitle() {
        echo "<title>Achraf's Webshop</title>";
    }

    protected function showHead() {
        $this->showHeadStart();
        $this->showHeadContent();
        $this->showHeadEnd();
    }

    //display each menu item
    private function showMenuItem($link, $label) { 
        echo '<li><a href=\index.php?page='. $link .'>' . $label . '</a></li>' . PHP_EOL; 
    } 

    //could be put into showmenu (not sure yet)
    private function printMenu() {  
        echo '<nav> 
        <ul class="menu">'; 
        foreach($this->data['menu'] as $link => $label) { 
          $this->showMenuItem($link, $label); 
        }
        echo '</ul>' . PHP_EOL . '         </nav>' . PHP_EOL;  
      }

    private function showMenu() {    
        $this->printMenu(); 
    }

    private function showFooter() {
        echo "<footer>&copy; Copyright 2024 Achraf Reyani</footer>";
    }

    protected function showHeadContent() {
        $this->showMeta();
        $this->showCSSLinks();
        $this->showTitle();
    }

    protected function showContent() {
        //gets defined in child classes
    }

    private function showHeader() {
        echo "<header><h1>Achraf's Webshop</h1></header>";
    }

    private function showGeneralError() {
        if (!empty($this->data['generalError'])) {
          echo '<div class="error">' . $this->data['generalError'] . '</div>';
        }
      }
    
    protected function showBodyContent() {
        $this->showHeadContent();
        $this->showHeader();
        $this->showMenu();
        $this->showGeneralError();
        $this->showContent();//main function
        $this->showFooter();
    }



}
?>