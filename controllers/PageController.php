<?php
class PageController {
    private $model;

    public function __construct() {
        $this->model = newPageModel(NULL);
    }

    public function handleRequest() {
        $this->getRequest();
        $this->processRequest();
        $this->showResponse();
    }

    //from client
    private function getRequest() {
        $this->model->getRequestedPage();
    }//calls function from the model object

    //business flow code
    //login, register, change password, contact form, shopping cart, webshop and detail page?
    private function processRequest() {
        switch($this->model->page) {
            case "Login":
                break;
            case "Register":
                break;
            case "Contact":
                break;
            case "ChangePassword":
                break;
            case "Contact":
                break;
            
        }
    }

    private function showResponse() {
        //call create
        $this->model->createMenu();

        switch($this->model->page) {
            case "Home":
                require_once("../views/HomeDoc.php");
                $view = new HomeDoc($this->model);
                break;
        }
    }
}
?>