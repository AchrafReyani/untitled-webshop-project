<?php
include "./models/PageModel.php";
class PageController {
    private $model;

    public function __construct() {
        $this->model = new PageModel(NULL);
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

    //business flow code TODO
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
        $this->model->createMenu();
        $view = NULL;
        switch($this->model->page) {
            case "Home":
                echo 1;
                require_once("./views/HomeDoc.php");
                $view = new HomeDoc($this->model);
                break;
            case "About":
                echo 2;
                require_once("./views/AboutDoc.php");
                $view = new AboutDoc($this->model);
                break;
            default:
                echo "default case";
                require_once("./views/HomeDoc.php");
                $view = new HomeDoc($this->model);
                break;
        }
        $view->show();
    }
}
?>