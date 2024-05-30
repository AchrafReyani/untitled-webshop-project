<?php
require('HtmlDoc.php');
class BasicDoc extends HtmlDoc {
    protected $model;

    //should model be in the constructor here?
    public function __construct($model) {
        $this->model = $model;
    }

    private function showMeta() {
        echo "<meta charset=\"UTF-8\">";
    }

    private function showCSSLinks() {
        echo "<link rel=\"stylesheet\" href=\"../css/stylesheet.css\">" ;
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
        $menu = $this->model->menu;
        foreach($menu as $link => $label) { 
          $this->showMenuItem($link, $label->page); 
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
        if (!empty($this->model->generalError)) {
          echo '<div class="error">' . $this->model->generalError . '</div>';
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